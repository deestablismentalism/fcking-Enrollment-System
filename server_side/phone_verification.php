<?php
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

class PhoneVerification {
    private $twilio;
    private $twilio_number;
    
    public function __construct() {
        // Initialize Twilio client
        $sid = getenv('TWILIO_ACCOUNT_SID');
        $token = getenv('TWILIO_AUTH_TOKEN');
        $this->twilio_number = getenv('TWILIO_PHONE_NUMBER');
        
        if (!$sid || !$token || !$this->twilio_number) {
            throw new Exception('Twilio credentials not properly configured');
        }
        
        $this->twilio = new Client($sid, $token);
    }
    
    public function validatePhoneNumber($phone) {
        $cleaned = preg_replace('/[^0-9]/', '', $phone);
        
        if (strlen($cleaned) === 10 && $cleaned[0] === '9') {
            return '+63' . substr($cleaned, 1);
        } 
        
        elseif (strlen($cleaned) === 11 && substr($cleaned, 0, 2) === '09') {
            return '+63' . substr($cleaned, 2);
        } 
        
        elseif (strlen($cleaned) === 12 && substr($cleaned, 0, 3) === '639') {
            return '+' . $cleaned;
        } 
        
        elseif (strlen($cleaned) === 13 && substr($cleaned, 0, 4) === '+639') {
            return $cleaned;
        }
        return false;
    }
    
    public function sendPassword($phone, $password, $username) {
        try {
            // Send SMS with password
            $message = $this->twilio->messages->create(
                $phone,
                [
                    'from' => $this->twilio_number,
                    'body' => "Hello! $username. Your account password is: $password\nPlease keep this secure and do not share it with anyone."
                ]
            );
            
            return [
                'success' => true,
                'message_sid' => $message->sid
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
?> 