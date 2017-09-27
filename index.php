<?php require_once 'trip_logic.php';?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alan Martinson</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/main.css' />
    </head>
    <body>
        
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
            
            <?php if (isset($errors) && !empty($errors)) :?>
                <div class='alert alert-danger'>
                    <ul>
                        <?php foreach ($errors as $error) :?>
                            <li><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <form action='#'>
                <label for='numberOfMiles'>Number of miles you will drive (required): </label>
                <input type='text' name='numberOfMiles' id='numberOfMiles' value='<?php echo($numberOfMiles)?>'>
                
                <br/>
                <label for='estimatedSpeed'>Estimated Speed (required): </label>
                <select name='estimatedSpeed' id='estimatedSpeed'>
                    <?php
                        
                        for ($i=$MINIMUM_SPEED; $i<=$MAXIMUM_SPEED; $i= $i+5){
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
                if(($estimatedSpeed != '') && ($numberOfMiles != '') && empty($errors)){
            ?>
            
                <div id='results'>
                    <h2>Results</h2>
                    
                    Based on your expected average speed of <?php echo($estimatedSpeed);?>mph, it will take you
                    <?php echo($totalHours);?> hours
                    and <?php echo((int)$totalMinutes);?> minute<?php if ((int)$totalMinutes != 1){echo("s");} ?>
                    to travel <?php echo($numberOfMiles);?> mile<?php if ($numberOfMiles != 1){echo("s");} ?>.
                    
                    <?php
                        $speedMessage = "<br/><br/>";
                        
                        if ($estimatedSpeed <= '15') {
                            $speedMessage .= "What are you riding, a turtle? <img src='images/turtle.png' height='100' alt='turtle' />";
                        }
                        elseif ($estimatedSpeed >= '100') {
                            $speedMessage .= "You might want to slow down or you there's a good chance you will be finishing your trip in one of these:
                            <img src='images/hearse.jpg' height='100' alt='hearse' />";
                        }
                        
                        echo($speedMessage);
                    ?>
                </div>
                
            <?php
                }   //closing of "should we display the results?"
            ?>
            
        </div>
    </body>
</html>