<?php require_once 'trip_logic.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alan Martinson</title>
        <link rel='stylesheet' type='text/css' href='css/main.css' />
    </head>
    <body>
        
        <?php
            #echo("<pre>Get contents:<br/>" . print_r($_GET, 1) . "</pre>");
            $MAXIMUM_SPEED = 120;
        ?>
        
        <div id='mainBody'>
            <h1 class='mycenter'>Alan Martinson - P2 For CSCI E15</h1>
            
            <h2 id='program_title'>Trip Time Calculator</h2>
        
            <div>
                This application calculates the estimated time a trip will take you.
                You enter the number of miles you will drive, your anticipated estimated speed, and
                if you want to round the results up to the nearest 15 minutes.
                <br/>
                <br/>
            </div>
            
            <form action='#'>
                <label for='numberOfMiles'>Number of miles you will drive: </label>
                <input type='text' name='numberOfMiles' id='numberOfMiles' value='<?php echo($numberOfMiles)?>'>
                
                <br/>
                <label for='estimatedSpeed'>Estimated Speed: </label>
                <select name='estimatedSpeed' id='estimatedSpeed'>
                    <?php
                        
                        for ($i=5; $i<=$MAXIMUM_SPEED; $i= $i+5){
                            if($i == $estimatedSpeed){
                                $estimatedSpeedSelected = " selected";
                            }
                            else {
                                $estimatedSpeedSelected = "";
                            }
                            
                            echo("\t\t\t\t\t<option" . $estimatedSpeedSelected . ">" . $i . "</option>\n");
                        }
                    ?>
                </select>
                
                <br/>Round up to the nearest 15 minutes: <input type='checkbox' name='roundOff[]' <?php echo($roundOffChecked)?>>
                <br/>
                <button type='submit'>Submit</button>
            </form>
            <?php
                //should we display the results?
                if(($estimatedSpeed != '') && ($numberOfMiles != '')){
            ?>
                <div id='results'>
                    <h2>Results</h2>
                    the results will go here<br/>
                    
                    <?php
                        if ($roundOffResults){
                            $willOrWillNot = "";
                        }
                        else {
                            $willOrWillNot = " NOT";
                        }
                    ?>
                    We will <?php echo($willOrWillNot);?> be rounding off the results.<br/>
                    Based on your expected average speed of <?php echo($estimatedSpeed);?>, it will take you
                    x hours and y minutes to travel <?php echo($numberOfMiles);?> miles.
                </div>
            <?php
                //should we display the results?
                }
            ?>
            
        </div>
    </body>
</html>