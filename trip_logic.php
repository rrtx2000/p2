<?php
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
?>