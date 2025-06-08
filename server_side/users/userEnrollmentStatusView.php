<?php
declare(strict_types =1);

require_once __DIR__ . '/../core/dbconnection.php';
require_once __DIR__ . '/../models/EnrolleesModel.php';

class displayEnrollmentStatus {
    protected $conn;
    protected $enrollee;
    public const ENROLLED = 1;
    public const DENIED = 2;
    public const PENDING = 3;
    public const FOR_FOLLOW_UP = 4;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->enrollee = new getEnrollees();
    }

    public function stringEquivalent(int $status): string {
        return match ($status) {
            3 => 'pending',
            1 => 'enrolled',
            2 => 'denied',
            4 => 'follow-up',
            default => 'unknown',
        };
    }
public function displayStatus() {
    if (isset($_SESSION['User']['User-Id']) && isset($_GET['id'])) {
        $userId = $_SESSION['User']['User-Id'];
        $enrolleeId = $_GET['id'];

        $statusCode = $this->enrollee->getUserStatus($userId, $enrolleeId);

        if ($statusCode === null) {
            echo "<p>Status not found.</p>";
            return;
        }
        else if ($statusCode === 1) {
            $status = $this->stringEquivalent($statusCode);
            echo "<p class=status>" .strtoupper($status) . "</p>";
            echo "<p> SUCCESSFULLY ENROLLED! </p>";
        }
        else if ($statusCode === 2) {
            $status = $this->stringEquivalent($statusCode);
            echo "<p class=status>" .strtoupper($status) . "</p>";
            $transactions = $this->enrollee->sendTransactionStatus($enrolleeId);
            $grouped = [];

            foreach ($transactions as $row) {
                $code = $row['Transaction_Code'];
                if (!isset($grouped[$code])) {
                    $grouped[$code] = [
                        'Description' => $row['Description'],
                        'Reasons' => [],
                    ];
                }
                $grouped[$code]['Reasons'][] = $row['Reason'];
            }
            // Now output once grouping is complete
            foreach ($grouped as $code => $data) {
                echo '<div>';
                echo '<p class="transaction-code"><strong>Transaction Code:</strong> ' . htmlspecialchars($code) . '</p>';
                echo '<p class="transaction-description"><strong>Description:</strong> ' . htmlspecialchars($data['Description']) . '</p>';
                echo '<ul style="justify-self:center;"><strong>Reasons:</strong>';
                foreach ($data['Reasons'] as $reason) {
                    echo '<li>' . htmlspecialchars($reason) . '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }
            echo "<p> Your enrollment form is DENIED. Please contact the school for more information. </p>";
        }
        else if ($statusCode === 3) {
            $status = $this->stringEquivalent($statusCode);
            echo "<p class=status>" .strtoupper($status) . "</p>";
            echo "<p> Your enrollment form is currently being processed. Please wait for 3-4 working days <p>";

        }
        else  {
            $transactions = $this->enrollee->sendTransactionStatus($enrolleeId);
            $status = $this->stringEquivalent($statusCode);
            echo "<p class=status>" .strtoupper($status) . "</p>";
            $grouped = [];

            foreach ($transactions as $row) {
                $code = $row['Transaction_Code'];
                if (!isset($grouped[$code])) {
                    $grouped[$code] = [
                        'Description' => $row['Description'],
                        'Reasons' => [],
                    ];
                }
                $grouped[$code]['Reasons'][] = $row['Reason'];
            }
            // Now output once grouping is complete
            foreach ($grouped as $code => $data) {
                echo '<div class="reasons-container">';
                echo '<p  class="transaction-code"><strong>Transaction Code:</strong> ' . htmlspecialchars($code) . '</p>';
                echo '<p><strong>Description:</strong> ' . htmlspecialchars($data['Description']) . '</p>';
                echo '<ul style="justify-self:center;"><strong>Reasons:</strong>';
                foreach ($data['Reasons'] as $reason) {
                    echo '<li>' . htmlspecialchars($reason) . '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }
            if (isset($_GET['id'])) {
                $enrolleeId = $_GET['id'];
                echo "<button class='edit-enrollment-form' data-id=" . $enrolleeId . "> Edit Enrollment Form</button>";
            }
        }
    }    
}
}

