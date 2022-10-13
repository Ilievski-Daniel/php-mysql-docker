<?php

    echo 'Welcome to KubeLab and this is PHP/MySQL with docker';

    $servername = "db";
    $username = "root";
    $password = "example";
    $dbName = "kubelab";

    // Connect to MySQL
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // If database does not exist, create one
    if (!mysqli_select_db($conn,$dbName)){
        $sql = "CREATE DATABASE ".$dbName;
        $conn->query($sql);
        
        // Add table and collumns to database as well
        $phpconnect = mysqli_connect("db","root","example",$dbName);
        $phpdatabase = "CREATE TABLE users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(20) NOT NULL)";
        mysqli_query( $phpconnect,$phpdatabase);
    } 

        // Insert some information into the database
        $phpconnect = mysqli_connect("db","root","example",$dbName);
        $sql = "INSERT INTO users (first_name) VALUES('Daniel')";
        mysqli_query( $phpconnect,$sql);

?>