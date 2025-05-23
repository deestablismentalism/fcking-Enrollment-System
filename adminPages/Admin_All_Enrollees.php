<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Admin All Enrollees</title>
    <link rel="stylesheet" href="../css/Admin_Enrollment_Pending.css">
    <link rel="stylesheet" href="../css/admin_base_designs.css">
    <style>
        .status-cell {
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 4px;
            display: inline-block;
        }
        .status-enrolled {
            background-color: #d4edda;
            color: #155724;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-denied {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status-to-follow {
            background-color: #e2e3e5;
            color: #383d41;
        }
        .count-display {
            margin: 10px 0;
            font-size: 1rem;
        }
        .count-number {
            font-weight: bold;
            font-size: 1.2rem;
        }
    </style>
    <?php 
        include_once './admin_base_designs.php';
        require_once __DIR__ . '/../server_side/admin/adminAllEnrolleesView.php';
    ?>
<body>
    <div class="main-content">
        <div class="content">
            <div class="enrollment-start">
                <div class="enrollment-access">
                    <div class="header">
                        <div class="header-left">
                            <div class="count-display">
                                Total Enrollees: <span class="count-number">
                                <?php
                                    $countView = new adminAllEnrolleesView();
                                    $countView->displayCount();
                                ?>
                                </span>
                            </div>
                        </div>
                        <div class="header-right">
                            <input type="text" id="search" class="search-box" placeholder="Search by name, LRN, grade level, or status...">
                        </div>
                    </div>
                    <div class="menu-content">
                        <table class="enrollments">
                            <thead>
                                <tr>
                                    <th>Student LRN</th>
                                    <th>Student Name</th>
                                    <th>Grade Level</th>
                                    <th>Enrollment Status</th>
                                    <th>Guardian Name</th>
                                    <th>Contact Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="query-table">
                                <?php      
                                $enrollmentStatusView = new adminAllEnrolleesView();
                                $enrollmentStatusView->displayAllEnrollees();
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="enrolleeModal" class="modal">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Apply status colors
            const rows = document.querySelectorAll('.enrollee-row');
            rows.forEach(row => {
                const statusCell = row.querySelector('td:nth-child(4)');
                if (statusCell) {
                    const status = statusCell.textContent.trim().toLowerCase();
                    statusCell.innerHTML = `<span class="status-cell status-${status}">${status.toUpperCase()}</span>`;
                }
            });
            
            // Get all view buttons
            const viewButtons = document.querySelectorAll('.view-button');
            const modal = document.getElementById('enrolleeModal');
            const modalContent = document.querySelector('.modal-content');
            
            // Add click event to each button
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const enrolleeId = this.getAttribute('data-id');
                    // Fetch enrollee details via AJAX
                    fetch(`../server_side/admin/adminEnrolleeStatusView.php?id=${enrolleeId}`)
                        .then(response => response.text())
                        .then(data => {
                            modalContent.innerHTML = data;
                            modal.style.display = 'block';
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
            
            // Close modal when X is clicked
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('close')) {
                    modal.style.display = 'none';
                }
            });
            
            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
            
            // Enhanced Search functionality
            const searchInput = document.getElementById('search');
            searchInput.addEventListener('keyup', function() {
                const query = this.value.toLowerCase();
                const rows = document.querySelectorAll('.enrollee-row');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (query === '' || text.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>