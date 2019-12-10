<?php
session_start();

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

$sql = "INSERT INTO TopTenScore (Username, Scroe) VALUES ('{$_POST['Username']}', '{$_POST['Score']}')";
if (mysqli_query($conn, $sql)) {
    header("Location: game.php");
} 

$result = $conn->query($sql);


$sql = "SELECT Username, Score FROM TopTenScore ORDER BY Score desc LIMIT 10;";
$result = $conn->query($sql);
$rows = array();
while($r = $result->fetch_assoc())
{
    $rows[] = $r;
}
echo json_encode($rows);

?>