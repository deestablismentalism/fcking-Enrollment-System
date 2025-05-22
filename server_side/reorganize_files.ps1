# PowerShell script to reorganize server-side files

Write-Host "Moving core files..." -ForegroundColor Cyan
Copy-Item dbconnection.php core\
Copy-Item encryption_and_decryption.php core\
Copy-Item tableDataTemplate.php core\

Write-Host "Moving common files..." -ForegroundColor Cyan
Copy-Item logout.php common\
Copy-Item login_verify.php common\
Copy-Item post_login_verify.php common\
Copy-Item change_password.php common\
Copy-Item post_change_password.php common\
Copy-Item UserTypeView.php common\
Copy-Item DashboardModel.php common\
Copy-Item DashboardView.php common\
Copy-Item send_password.php common\

Write-Host "Moving user-related files..." -ForegroundColor Cyan
Copy-Item backend_registration.php users\
Copy-Item post_registration_form.php users\
Copy-Item enrollment_form.php users\
Copy-Item post_enrollment_form_data.php users\
Copy-Item userEnrolleesView.php users\
Copy-Item userEnrollmentStatusView.php users\
Copy-Item return-dashboard-json.php users\

Write-Host "Moving admin-related files..." -ForegroundColor Cyan
Copy-Item adminModel.php admin\
Copy-Item admin_login.php admin\
Copy-Item post_admin_login.php admin\
Copy-Item adminEnrolledView.php admin\
Copy-Item adminEnrolleeStatus.php admin\
Copy-Item adminEnrolleeStatusView.php admin\
Copy-Item adminEnrolleeFollowup.php admin\
Copy-Item adminSectionsView.php admin\
Copy-Item sectionsModel.php admin\
Copy-Item post_sections.php admin\
Copy-Item adminSubjectsView.php admin\
Copy-Item subjectsModel.php admin\
Copy-Item post_subjects.php admin\
Copy-Item adminTeacherView.php admin\
Copy-Item adminTeacherModel.php admin\
Copy-Item adminTeacherInfoView.php admin\
Copy-Item adminTeacherInfoModel.php admin\
Copy-Item edit_teacher_info.php admin\
Copy-Item post_edit_teacher_info.php admin\
Copy-Item staff_registration.php admin\
Copy-Item post_staff_registration.php admin\
Copy-Item edit_staff_information.php admin\
Copy-Item post_edit_staff_information.php admin\
Copy-Item search_enrollees.php admin\
Copy-Item searchEnrolleeView.php admin\
Copy-Item updateEnrolleeStatus.php admin\

Write-Host "Moving teacher-related files..." -ForegroundColor Cyan
Copy-Item adminTeacherInfoView.php teachers\
Copy-Item edit_teacher_info.php teachers\

Write-Host "Moving student-related files..." -ForegroundColor Cyan
Copy-Item studentsModel.php students\
Copy-Item fetchStudentDetails.php students\
Copy-Item deleteStudent.php students\
Copy-Item adminStudentsView.php students\
Copy-Item EnrolleesModel.php students\
Copy-Item enrollmentStatusView.php students\
Copy-Item getSectionsByGradeLevel.php students\
Copy-Item getGradeLevels.php students\

Write-Host "Files reorganization complete!" -ForegroundColor Green
Write-Host "Note: Original files are still in the server_side directory."
Write-Host "You may want to delete them after verifying that everything works correctly." 