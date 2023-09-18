<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        Seed Value: <input type="number" value="<?php  if(isset($_POST['submit'])){ echo $_POST['seed']; } ?>" name="seed" id=""> <br>
        Terms: <input type="number" value="<?php  if(isset($_POST['submit'])){ echo $_POST['terms']; } ?>" name="terms" id=""> <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $seed = $_POST['seed'];
            $terms = $_POST['terms'];

            $output = "";
            $previousTemp = "0";
            $numbers = [];
            

            //For Each Terms
            for($i=0; $i<$terms; $i++){
                //Add First Value
                if($i==0){
                    $numbers[$i] = (int)$seed;
                    $previousTemp = $seed;
                }elseif($i==1 && $previousTemp < 11 ){
                    $numbers[$i] = (int)($seed+$seed);
                }
                else{
                    //For Adding Each Digit of Numbers
                    $addTemp = 0; //Sum Value
                    $previousTemp = $numbers[$i-1]; //Previous Number
					
                    for($j=0; $j<sizeof(str_split($previousTemp)); $j++){
                        $addTemp += (int)str_split($previousTemp)[$j];
                    }
					
					$numbers[$i] = (int)($previousTemp+$addTemp);         
                }   
            }

            //For Print
            for($i=0; $i<sizeof($numbers); $i++){
                echo $numbers[$i].', ';
            }
        
            echo '<br>';


        }
    ?>    
</body>
</html>
