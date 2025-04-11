<?php
class SemaphoreSMS {
    private $api_key;
    private $sender_name;
    
    public function __construct() {
        $this->api_key = getenv('SEMAPHORE_API_KEY');
        $this->sender_name = getenv('SEMAPHORE_SENDER_NAME');
        
        if (!$this->api_key || !$this->sender_name) {
            throw new Exception('Semaphore credentials not properly configured');
        }
    }
    
    public function validatePhoneNumber($phone) {
        $cleaned = preg_replace('/[^0-9]/', '', $phone);
        
        if (strlen($cleaned) === 10 && $cleaned[0] === '9') {
            return '0' . $cleaned;
        } 
        
        elseif (strlen($cleaned) === 11 && substr($cleaned, 0, 2) === '09') {
            return $cleaned;
        } 
        
        elseif (strlen($cleaned) === 12 && substr($cleaned, 0, 3) === '639') {
            return '0' . substr($cleaned, 2);
        } 
        
        elseif (strlen($cleaned) === 13 && substr($cleaned, 0, 4) === '+639') {
            return '0' . substr($cleaned, 3);
        }
        return false;
    }
    
    public function sendPassword($phone, $password, $username) {
        try {
            $ch = curl_init();
            $parameters = array(
                'apikey' => $this->api_key,
                'number' => $phone,
                'message' => "Hello! $username. Your account password is: $password\nPlease keep this secure and do not share it with anyone.",
                'sendername' => $this->sender_name
            );
            
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $output = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($http_code === 200) {
                return [
                    'success' => true,
                    'message' => 'SMS sent successfully'
                ];
            } else {
                return [
                    'success' => false,
                    'error' => 'Failed to send SMS. HTTP Code: ' . $http_code
                ];
            }
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
?> 