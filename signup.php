<?php

    $serverName = "localhost";
    $username = "root";
    $password = "Ahalya05";

    try {
        $connection = "mysql:host=$serverName;dbname=assignment3";
        
        $pdo = new PDO($connection, $username, $password);
        //set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $newFName = $_POST["Fname"];
        $newLName = $_POST["Lname"];
        $newEmail = $_POST["email"];
        $newUsername = $_POST["username"];
        $newPassword = $_POST["pass"];

        //insert values
        $sql = "INSERT INTO user (FirstName, LastName, Username, Password, 
            EmailAddress, Active, MemberSince) 
                VALUES ('$newFName', '$newLName', '$newUsername', '$newPassword', '$newEmail',
                    'y', CURDATE())";

        $pdo->exec($sql);
        echo "<label> Welcome to the site, Your Account has been created! </label>";
    }
    catch(PDOException $e){
       die($e->getMessage());
    }

    $connection = null;
?> 