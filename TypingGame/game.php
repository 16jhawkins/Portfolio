<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload = "LoadWord()" onkeypress="uniCharCode(event)">
        <script type = "text/javascript" src = "game.js"></script>
        <div class="row">
                <div class="column" id = "word0"></div>
                <div class="column" id = "word1"></div>
                <div class="column" id = "word2"></div>
                <div class="column" id = "word3"></div>
                <div class="column" id = "word4"></div>
                <div class="column"><div class = score id = score onload = "showScore()"></div></div>
        </div>
        <div class = "buff"></div>
        <form id = "form" name ="hiddenForm" action = "topTen.php" method ="post">
            <input type = "hidden" name = "score">
        </form>
    </body>
</html>