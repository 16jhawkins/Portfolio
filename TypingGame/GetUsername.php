<?php

session_start();


if(!empty($_POST["Username"])){
    $_SESSION["Username"] = $_POST["Username"];
}
//print_r($_SESSION);

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

$sql = "SELECT Salt FROM KeyboardLogin WHERE '{$_SESSION['Username']}' = Username";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$Salt = $row['Salt'];

$conn->close();

?>

<html>
<form action ="CheckPassword.php" onsubmit = "GetHash()" method="POST">
    Password: <input type="text" name ="Password" id = "Password"><br>
    <input type = "hidden" name = "Username" id = "Username">
    <input type = "hidden" name = "SaltedPassword" id = "SaltedPassword">
    <input type="submit">
</form>
<script type = "text/javascript" src = "SHA256.js"></script>
<script>
    function GetHash(){
    var pass = (document.getElementById("Password").value + <?php echo $Salt?>);
    document.getElementById("SaltedPassword").value = SHA256(pass);
    document.getElementById("Password").value = "";
    document.getElementById("Username").value = "<?php echo $_SESSION['Username'] ?>";
    return true;
    }  
</script>

</html>
