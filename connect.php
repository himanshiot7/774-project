<?php
// include<'crud.php';

// $servername = 'localhost';
// $username = 'root';
// $password = '';
 $dbname = 'note_keeper';

// $conn = new mysqli($servername, $username, $password, $dbname);

$conn = new mysqli('localhost','root','', $dbname);
if(!$conn){
    die(mysqli_error($conn));
}
    
// $sql = "CREATE DATABASE $dbname";
// if(mysqli_query($conn)){
//     echo "Database created";
//     }
//     else{
//     echo "database not created";
//     }
//     $sql = "CREATE TABLE Users (
//         email varchar(50) PRIMARY KEY,
//         name VARCHAR(30) NOT NULL,
//         mobile VARCHAR(10) NOT NULL,
//         password varchar(10) NOT NULL;
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//         echo "Table Users created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }




?>
