<?php
$serverName = "localhost";
$username = "root";
$password = "Ahalya05";
//$dbname = "assignment3";

try {
    $connection = "mysql:host=$serverName;dbname=assignment3";
    
    $pdo = new PDO($connection, $username, $password);
   
    //set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "Connection Successful";

    if(isset($_POST['user'])){

        $enteredUsername = $pdo->quote($_POST["user"]);
        $enteredPassword = $pdo->quote($_POST["pass"]);

        $sql = "SELECT * FROM user WHERE Username = $enteredUsername AND 
            Password = $enteredPassword";
        
        $result = $pdo->query($sql);
        $count = $result->rowCount();

        if($count == 1){

            $sql = "SELECT  * FROM user WHERE Username = $enteredUsername  ";
            $result = $pdo->query($sql);

            if($result->rowCount() > 0){

                $rowInfo = $result->fetch(PDO::FETCH_ASSOC);

                echo "<p> Successful Login </p>";
                echo "<h1 style='text-align:center'> WELCOME BACK " . $rowInfo['FirstName'] . " " . $rowInfo['LastName'] . "</h1>";  
                echo "<h2 style='text-align:center'> You joined on: " . $rowInfo['MemberSince'] . "</h2>";
                
            }
        } else {
            echo "<h1 style='text-align:center'> Invalid Login </h1>";
            echo "<p style='text-align:center'> Please check entered
                 username and password </p>";   
        }
    }
} 
catch(PDOException $e){
    die($e->getMessage());
}

$connection = null;
?>