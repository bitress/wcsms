<?php


$from       = '01:00 PM';
$to         = '02:30 PM';

$total      = strtotime($to) - strtotime($from);
$hours      = floor($total / 60 / 60);
$minutes    = round(($total - ($hours * 60 * 60)) / 60);

$hr = $hours.'.'.$minutes;

echo $hr;
?>
