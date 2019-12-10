<?php


$servername = "sql300.epizy.com";
$username = "epiz_24398238";
$password = "bg5dPloZ7ANp";
$dbname = "epiz_24398238_fall2019";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO KeyboardLogin (Username, Salt, Password) VALUES ('{$_POST['Username']}', '{$_POST['Salt']}', '{$_POST['SaltedPassword']}')";


if (mysqli_query($conn, $sql)) {
    header("Location: game.php");
} 	
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();


?>