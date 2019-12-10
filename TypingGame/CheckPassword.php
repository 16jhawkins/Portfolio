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
echo $_SESSION['Username'];
echo $_POST['SaltedPassword'];

$sql = "SELECT (EXISTS (SELECT 1 FROM KeyboardLogin WHERE Username = '{$_SESSION['Username']}' AND (Password = '{$_POST['SaltedPassword']}' ) )) AS Result;";

$result = $conn->query($sql);

while($row = mysqli_fetch_assoc($result))
{
    $NumRows = $row['Result'];
}

//echo $NumRows;

if($NumRows >= 1)
{
    header("Location: game.php");
}
else
{
    header("Location: GetUsername.php");
}

$conn->close();
?>

<html>
<body>
<p>HELLO</p>
</body>
</html>