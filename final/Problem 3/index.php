<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "country";

    $conn = new mysqli($servername, $username, $password, $dbname);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Three Eldest Citizens</h4>
	<table width="500px" border="1px">
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Birth</th>
        </tr>
    <?php
        $sql = "SELECT * FROM `citizen` ORDER BY birth LIMIT 3";
        $result = $conn -> query($sql);
        if($result->num_rows > 0){
			while($rows = $result-> fetch_assoc()){
				?>
                <tr>
                    <td><?php echo $rows['name'].'</br>';?></td>
                    <td><?php echo $rows['department'].'</br>';?></td>
                    <td><?php echo $rows['birth'].'</br>';?></td>
                </tr>
                <?php
			}
		}
    ?>    
    </table>
    <br><br><br>



	<h5>Search by Name</h5>
    <form action="" method="GET">
        <input type="text" name="q" value="<?php  if(isset($_GET['q'])){ echo $_GET['q']; } ?>" id="">
        <input type="submit" value="Search">
    </form>
    <?php
        if(isset($_GET['q'])){
    ?>

    <table width="500px" border="1px">
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Birth</th>
        </tr>
    <?php
        $q = $conn -> escape_string($_GET['q']);
        $sql = "SELECT * FROM `citizen` WHERE `name` LIKE '%".$q."%' LIMIT 3";
        $result = $conn -> query($sql);
        if($result->num_rows > 0){
			while($rows = $result-> fetch_assoc()){
				?>
                <tr>
                    <td><?php echo $rows['name'].'</br>';?></td>
                    <td><?php echo $rows['department'].'</br>';?></td>
                    <td><?php echo $rows['birth'].'</br>';?></td>
                </tr>
                <?php
			}
		}
    ?>    
    </table>
    <br><br><br>

    <?php
        }
    ?>
</body>
</html>