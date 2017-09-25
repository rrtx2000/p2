<?php require_once 'trip_logic.php';?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alan Martinson</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/main.css' />
    </head>
    <body>
        
        <?php
            #echo("<pre>Get contents:<br/>" . print_r($_GET, 1) . "</pre>");
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
                if(($estimatedSpeed != '') && ($numberOfMiles != '')){
            ?>
            
                <div id='results'>
                    <h2>Results</h2>
                    
                    Based on your expected average speed of <?php echo($estimatedSpeed);?>mph, it will take you
                    <?php echo($totalHours);?> hours and <?php echo((int)$totalMinutes);?> minutes to travel <?php echo($numberOfMiles);?> miles.
                </div>
                
            <?php
                //closing of "should we display the results?"
                }
            ?>
            
        </div>
    </body>
</html>