<?php

include '../app.php';

$attr = $_GET['attr'];
$sport_id = $_GET['sport'];
$sql =
    "SELECT athlete.{$attr} FROM athlete
INNER JOIN athlete_event on athlete.athlete_id = athlete_event.athlete_id
INNER JOIN olympic_event on athlete_event.event_id = olympic_event.event_id
WHERE olympic_event.sport_id = '{$sport_id}'";
$table = $database->executeQuery($sql);
$total = 0;
foreach ($table as $value) {
    $total += $value[$attr];
}
$count = count($table);
if ($count==0) {
    $count = 0.01;
}
$average = round($total/$count, 2);
$sport_name = $database->executeQuery("SELECT sport.sport_name FROM sport WHERE sport_id='{$sport_id}'")[0]['sport_name'];

$sportArray = getField($attr);
echo "The average {$sportArray['stat']} of athletes that competed in {$sport_name} is {$average}  {$sportArray['unit']}.";

function getField($attr) {
    switch ($attr) {
        case 'height_cm':
            return array('stat'=>'height','unit'=>'cm');
            break;
        case 'weight_kg':
            return array('stat'=>'weight','unit'=>'kg');
            break;
        case 'age':
            return array('stat'=>'age','unit'=>'years');
            break;
        default:
            return array('stat'=>'undefined','unit'=>'undefined');
            break;
    }
}