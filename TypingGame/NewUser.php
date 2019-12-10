<html>
<head>
</head>

<body>
    <form id = "NewUserForm"  action = "InsertNewUser.php" onsubmit = "getTime()" method = "POST">
        Enter your Username: <input  type = "text" name = "Username"><br/>
        Enter your Password: <input  type = "text" id = "Password" name = "Password"><br/>
        <input type="hidden" id = "Salt" name = "Salt" value =""/>
        <input type="hidden" id = "SaltedPassword" name = "SaltedPassword" value = ""/>
        <input type = "submit"/><br/>
    </form>
<script type = "text/javascript" src = "SHA256.js"></script>
<script>
    function getTime(){  
    var today = new Date();
    var time = today.getMilliseconds() + "" + today.getMinutes() + "" + today.getSeconds();
    document.getElementById("Salt").value = time;
    var pass = (document.getElementById("Password").value + time);
    document.getElementById("SaltedPassword").value = SHA256(pass);
    document.getElementById("Password").value = "";
    return true;
    }
</script>

</body>
</html>