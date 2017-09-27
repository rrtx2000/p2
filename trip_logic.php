<?php
require_once('Form.php');
$form = new DWA\Form($_GET);

$MINIMUM_SPEED = 5;
$MAXIMUM_SPEED = 120;
        
if ($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'numberOfMiles' => 'required|numeric',
            'estimatedSpeed' => 'required|numeric|min:' . $MINIMUM_SPEED . '|max:' . $MAXIMUM_SPEED
        ]
    );
}

if (isset($_GET['numberOfMiles'])){
    $numberOfMiles = $_GET['numberOfMiles'];
}
else {
    $numberOfMiles = '';
}

if (isset($_GET['estimatedSpeed'])){
    $estimatedSpeed = $_GET['estimatedSpeed'];
}
else {
    //if it's not provided, start with a generic value
    $estimatedSpeed = '60';
}

if (isset($_GET['roundOff'])){
    $roundOffResults = true;
    $roundOffChecked = " checked='checked'";
}
else {
    $roundOffResults = false;
    $roundOffChecked = "";
}

$totalHours = 0;
$totalMinutes = 0;
if ($form->isSubmitted()) {
    if (empty($errors)){
        //We have a valid request, calculate the results.

        $totalHours = intdiv($numberOfMiles, $estimatedSpeed);
        $totalMinutes = (($numberOfMiles / $estimatedSpeed) - $totalHours) * 60;        //(decimal result - totalHours) * 60 converts to minutes
        
        if ($roundOffResults){
            //We want to round off to the nearest 15 minutes
            if ($totalMinutes>45){
                //Round up to the next hour
                $totalMinutes = 0;
                $totalHours++;
            }
            else if($totalMinutes>30){
                $totalMinutes=45;
            }
            else if($totalMinutes>15){
                $totalMinutes=30;
            }
            else if($totalMinutes>0){
                $totalMinutes=15;
            }
        }
        
    }
}

?>