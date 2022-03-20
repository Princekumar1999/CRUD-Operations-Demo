<?php include "db.php";?>
<?php

function createRows(){
    global $connection;
    $uName = $_POST['username'];
    $pass = $_POST['password'];

    // echo $uName . " " . $pass;
    // to protect our data
    $uName = mysqli_real_escape_string($connection, $uName);
    $pass = mysqli_real_escape_string($connection, $pass);

    // to encrypt the password
    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $pass = crypt($pass, $hashF_and_salt);
    
    // write a sql query to store data in database table
    $query = "INSERT INTO users(username, password)";
    $query .= "VALUES('$uName', '$pass')";
    
    // check that query has inserted or not.
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('data did not insert into user table');
    }else{
        echo "Record Created";
    }
}
function readAllData(){
    global $connection;
    $query = "SELECT * FROM users";
    // check that query has inserted or not.
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Data can't insert into database table");
    }

    while($row = mysqli_fetch_assoc($result)){
        print_r($row);
}
}
function showAllData(){
    global $connection;
    $query = "SELECT * FROM users";
        
    // check that query has inserted or not.
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Data can't insert into database table");
    }
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];

        echo "<option value='$id'>$id</option>"; 
    }
}

function UpdateTable(){
    global $connection;
    $uName = $_POST['username'];
    $pass = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE users SET ";
    $query .= "username = '$uName', ";
    $query .= "password = '$pass' ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Update Operation did not work." . mysqli_error($connection));
    }else{
        echo "Record Updated";
    }
}


function DeleteRows(){
    global $connection;
    $uName = $_POST['username'];
    $pass = $_POST['password'];
    $id = $_POST['id'];

    $query = "DELETE FROM users ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Delete Operation did not work." . mysqli_error($connection));
    }else{
        echo "Record Deleted";
    }
}