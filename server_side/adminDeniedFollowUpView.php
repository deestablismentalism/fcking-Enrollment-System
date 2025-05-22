<?php
require_once __DIR__ . '/adminDeniedFollowUpModel.php';

class AdminDeniedFollowUpView {
    protected $conn;
    protected $Model;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->Model = new AdminDeniedFollowUpModel();
    }

    public function displayDeniedAndFollowUpStudents() {
        echo '<table>
                <tr>
                <th>LRN</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Birth Date</th>
                <th>Enrollment Status</th>
                <th>Objection Description</th>';
        $this->Model->displayDeniedAndFollowUpStudents();
        echo '</table>';
    }
}

?>