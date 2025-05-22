<?php

declare(strict_types =1);
header('Content-Type: application/json');
require_once __DIR__ . '/../server_side/DashboardModel.php';

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
    ]
];

echo json_encode($result);
exit();
    


