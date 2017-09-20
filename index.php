<!DOCTYPE html>
<html>
    <head>
        <title>Alan Martinson</title>
        <link rel='stylesheet' type='text/css' href='css/main.css' />
    </head>
    <body>
        
        <?php
            #echo("<hr>LINE " . __LINE__ . ") Get contents:"); echo("<pre>" . print_r($_GET, 1) . "</pre><br>" . __LINE__ . ") Post contents:"); echo("<pre>" . print_r($_POST, 1) . "</pre><hr/>");
            
            $MAXIMUM_SPEED = 120;
            
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
                $roundOffChecked = " checked='checked'";
            }
            else {
                $roundOffChecked = "";
            }
        
        ?>
        
        <div id='mainBody'>
            <h1 class='mycenter'>Alan Martinson - P2 For CSCI E15</h1>
            
            <h2>Trip Time Calculator</h2>
        
            <div>
                This application calculates the estimated time a trip will take you.
                You enter the number of miles you will drive, your anticipated estimated speed, and
                if you want to round off the results to the nearest 15 minutes.
                <br/>
                <br/>
            </div>
            
            <form action=''>
                <label for='numberOfMiles'>Number of miles you will drive: </label>
                <input type='text' name='numberOfMiles' id='numberOfMiles' value=<?php echo($numberOfMiles)?>>
                
                <br/>
                <label for='estimatedSpeed'>Estimated Speed: </label>
                <select name='estimatedSpeed' id='estimatedSpeed'>
                    <?php
                        
                        for ($i=5; $i<=$MAXIMUM_SPEED; $i= $i+5){
                            if($i == $estimatedSpeed){
                                $selected = " selected";
                            }
                            else {
                                $selected = "";
                            }
                            
                            echo("\t\t\t\t\t<option" . $selected . ">" . $i . "</option>\n");
                        }
                    ?>
                </select>
                
                <br/>Round off results to the nearest 15 minutes: <input type='checkbox' name='roundOff[]' <?php echo($roundOffChecked)?>>
                <br/>
                <button type='submit'>Submit</button>
            </form>
            
        </div>
    </body>
</html>