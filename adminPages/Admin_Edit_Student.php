<!DOCTYPE html>
<?php 
    include_once __DIR__ . '/../adminPages/admin_base_designs.php';
    require_once __DIR__ . '/../server_side/studentsModel.php';
    
    // Check if student ID is provided
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<script>alert('Student ID is required'); window.location.href = 'Admin_All_Students.php';</script>";
        exit;
    }
    
    $studentId = intval($_GET['id']);
    $studentModel = new studentsModel();
    $student = $studentModel->getStudentById($studentId);
    
    if (!$student) {
        echo "<script>alert('Student not found'); window.location.href = 'Admin_All_Students.php';</script>";
        exit;
    }

    // Handle form submission
    $errorMessage = '';
    $successMessage = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $studentModel = new studentsModel();
        $result = $studentModel->updateStudent($_POST);
        
        if ($result['success']) {
            $successMessage = 'Student updated successfully!';
            $student = $studentModel->getStudentById($studentId); // Refresh data
        } else {
            $errorMessage = 'Error updating student: ' . $result['message'];
        }
    }
    
    // Get sections for dropdown
    $sections = $studentModel->getSectionsByGradeLevel($student['Grade_Level_Id']);
?>
<link rel="stylesheet" href="../css/admin_edit_student.css">
</head>
<body>
    <div class="main-content">
        <div class="content">
            <div class="page-title">
                <div class="title-left">
                    <h2>Edit Student Information</h2>
                </div>
                <div class="title-right">
                    <a href="Admin_All_Students.php" class="back-button">Back to Students List</a>
                </div>
            </div>

            <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-error">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <div class="form-container">
                <form method="POST" action="Admin_Edit_Student.php?id=<?php echo $studentId; ?>">
                    <input type="hidden" name="student_id" value="<?php echo $student['Student_Id']; ?>">
                    <input type="hidden" name="enrollee_id" value="<?php echo $student['Enrollee_Id']; ?>">
                    
                    <div class="form-section">
                        <h3>Personal Information</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($student['Student_First_Name']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" id="middle_name" name="middle_name" value="<?php echo htmlspecialchars($student['Student_Middle_Name'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($student['Student_Last_Name']); ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="lrn">Learner Reference Number (LRN)</label>
                                <input type="text" id="lrn" name="lrn" value="<?php echo htmlspecialchars($student['Learner_Reference_Number']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['Student_Email']); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3>Academic Information</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="grade_level">Grade Level</label>
                                <select id="grade_level" name="grade_level" required>
                                    <?php 
                                        $gradeLevels = $studentModel->getAllGradeLevels();
                                        foreach ($gradeLevels as $level) {
                                            $selected = ($level['Grade_Level_Id'] == $student['Grade_Level_Id']) ? 'selected' : '';
                                            echo "<option value='{$level['Grade_Level_Id']}' $selected>{$level['Grade_Level']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="section">Section</label>
                                <select id="section" name="section">
                                    <option value="">-- No Section --</option>
                                    <?php 
                                        foreach ($sections as $section) {
                                            $selected = ($section['Section_Id'] == $student['Section_Id']) ? 'selected' : '';
                                            echo "<option value='{$section['Section_Id']}' $selected>{$section['Section_Name']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" required>
                                    <option value="1" <?php echo ($student['Student_Status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                    <option value="2" <?php echo ($student['Student_Status'] == 2) ? 'selected' : ''; ?>>Inactive</option>
                                    <option value="3" <?php echo ($student['Student_Status'] == 3) ? 'selected' : ''; ?>>On Leave</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="save-button">Save Changes</button>
                        <a href="Admin_All_Students.php" class="cancel-button">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to update sections dropdown when grade level changes
        document.getElementById('grade_level').addEventListener('change', function() {
            const gradeLevelId = this.value;
            
            // Make an AJAX request to get sections for the selected grade level
            fetch(`../server_side/getSectionsByGradeLevel.php?grade_level_id=${gradeLevelId}`)
                .then(response => response.json())
                .then(data => {
                    const sectionDropdown = document.getElementById('section');
                    
                    // Clear existing options
                    sectionDropdown.innerHTML = '<option value="">-- No Section --</option>';
                    
                    // Add new options
                    if (data.success && data.sections.length > 0) {
                        data.sections.forEach(section => {
                            const option = document.createElement('option');
                            option.value = section.Section_Id;
                            option.textContent = section.Section_Name;
                            sectionDropdown.appendChild(option);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching sections:', error);
                });
        });
    </script>
</body>
</html> 