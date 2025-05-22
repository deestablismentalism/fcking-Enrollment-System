@echo off
REM Batch file to reorganize server-side files

echo Moving core files...
copy dbconnection.php core\
copy encryption_and_decryption.php core\
copy tableDataTemplate.php core\

echo Moving common files...
copy logout.php common\
copy login_verify.php common\
copy post_login_verify.php common\
copy change_password.php common\
copy post_change_password.php common\
copy UserTypeView.php common\
copy DashboardModel.php common\
copy DashboardView.php common\
copy send_password.php common\

echo Moving user-related files...
copy backend_registration.php users\
copy post_registration_form.php users\
copy enrollment_form.php users\
copy post_enrollment_form_data.php users\
copy userEnrolleesView.php users\
copy userEnrollmentStatusView.php users\
copy return-dashboard-json.php users\

echo Moving admin-related files...
copy adminModel.php admin\
copy admin_login.php admin\
copy post_admin_login.php admin\
copy adminEnrolledView.php admin\
copy adminEnrolleeStatus.php admin\
copy adminEnrolleeStatusView.php admin\
copy adminEnrolleeFollowup.php admin\
copy adminSectionsView.php admin\
copy sectionsModel.php admin\
copy post_sections.php admin\
copy adminSubjectsView.php admin\
copy subjectsModel.php admin\
copy post_subjects.php admin\
copy adminTeacherView.php admin\
copy adminTeacherModel.php admin\
copy adminTeacherInfoView.php admin\
copy adminTeacherInfoModel.php admin\
copy edit_teacher_info.php admin\
copy post_edit_teacher_info.php admin\
copy staff_registration.php admin\
copy post_staff_registration.php admin\
copy edit_staff_information.php admin\
copy post_edit_staff_information.php admin\
copy search_enrollees.php admin\
copy searchEnrolleeView.php admin\
copy updateEnrolleeStatus.php admin\

echo Moving teacher-related files...
copy adminTeacherInfoView.php teachers\
copy edit_teacher_info.php teachers\

echo Moving student-related files...
copy studentsModel.php students\
copy fetchStudentDetails.php students\
copy deleteStudent.php students\
copy adminStudentsView.php students\
copy EnrolleesModel.php students\
copy enrollmentStatusView.php students\
copy getSectionsByGradeLevel.php students\
copy getGradeLevels.php students\

echo Files reorganization complete!
echo Note: Original files are still in the server_side directory.
echo You may want to delete them after verifying that everything works correctly. 