<?php

declare(strict_types =1);
header('Content-Type: application/json');
require_once __DIR__ . '/../models/DashboardModel.php';

$data = new DashboardModel();

//enrollments data
$enrolled = $data->EnrolledStudents();
$pending = $data->PendingStudents();
$followUp = $data->FollowUpStudents();
$denied = $data->DeniedStudents();
//enrollments grade distribution count
$kinder1 = $data->getKinderOneEnrollees();
$kinder2 = $data->getKinderTwoEnrollees();
$grade1 = $data->getGradeOneEnrollees();
$grade2 = $data->getGradeTwoEnrollees();
$grade3 = $data->getGradeThreeEnrollees();
$grade4 = $data->getGradeFourEnrollees();
$grade5 = $data->getGradeFiveEnrollees();
$grade6 = $data->getGradeSixEnrollees();
//biological sex
$male = $data->getMaleEnrollees();
$female = $data->getFemaleEnrollees();
//total enrollee count
$totalEnrollees = $data->TotalEnrollees();
//students status
$active = $data->countActiveStudents();
$inactive = $data->countInactiveStudents();
$dropped = $data->countDroppedStudents();
//total students count
$totalStudents = $data->countTotalStudents();

//student grade level distribution
$studentKinder1 = $data->getKinderOneStudents();
$studentKinder2 = $data->getKinderTwoStudents();
$studentGrade1 = $data->getGradeOneStudents();
$studentGrade2 = $data->getGradeTwoStudents();
$studentGrade3 = $data->getGradeThreeStudents();
$studentGrade4 = $data->getGradeFourStudents();
$studentGrade5 = $data->getGradeFiveStudents();
$studentGrade6 = $data->getGradeSixStudents();

//student biological sex
$studentMale = $data->getMaleStudents();
$studentFemale = $data->getFemaleStudents();

if(!$totalEnrollees) {
    echo json_encode(['success' => false, 'message'=> 'cannot fetch total enrollees']);
    exit();
}

if(!$enrolled) {
    echo json_encode(['success' => false, 'message'=> 'canno fetch enrolled']);
    exit();
}
if(!$pending) {
    echo json_encode(['success'=> false, 'messgae'=> 'cannot fetch pending']);
    exit();
}
if(!$followUp) {
    echo json_encode(['success'=> false, 'message'=> 'cannot fetch follow up']);
}

$result = [
    'chart1'=> [
        ['label' => 'Enrolled', 'value' => $enrolled],
        ['label' => 'Pending', 'value' => $pending],
        ['label' => 'To Follow up', 'value' => $followUp],
        ['label' => 'Denied', 'value' => $denied]
    ],
    'chart2' => [
        ['label' => 'Kinder I', 'value' => $kinder1],
        ['label'=> 'Kinder II', 'value'=> $kinder2],
        ['label'=> 'Grade 1', 'value'=> $grade1],
        ['label'=> 'Grade 2', 'value'=> $grade2],
        ['label'=> 'Grade 3', 'value'=> $grade3],
        ['label'=> 'Grade 4', 'value'=> $grade4],
        ['label'=> 'Grade 5', 'value'=> $grade5],
        ['label'=> 'Grade 6', 'value'=> $grade6]
    ],
    'chart3' => [
        ['label'=> 'Male', 'value'=> $male],
        ['label'=> 'Female', 'value'=> $female]
    ],
    'total_enrollees' => $totalEnrollees,
    'total_students' => $totalStudents,
    'chart4' => [
        ['label' => 'Active', 'value' => $active],
        ['label' => 'Inactive', 'value' => $inactive],
        ['label' => 'Dropped', 'value' => $dropped]
    ],
    'chart5' => [
        ['label' => 'Kinder I', 'value' => $studentKinder1],
        ['label'=> 'Kinder II', 'value'=> $studentKinder2],
        ['label'=> 'Grade 1', 'value'=> $studentGrade1],
        ['label'=> 'Grade 2', 'value'=> $studentGrade2],
        ['label'=> 'Grade 3', 'value'=> $studentGrade3],
        ['label'=> 'Grade 4', 'value'=> $studentGrade4],
        ['label'=> 'Grade 5', 'value'=> $studentGrade5],
        ['label'=> 'Grade 6', 'value'=> $studentGrade6]
    ],
    'chart6' => [
        ['label'=> 'Male', 'value'=> $studentMale],
        ['label'=> 'Female', 'value'=> $studentFemale]
    ]
];
echo json_encode($result);
exit();
    


