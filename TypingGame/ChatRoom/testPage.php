<?php
    echo "hello world";
?>
<html>
 <body onload = "loadServer()">
 <script>
   function loadServer()
   {
         // Then some JavaScript in the browser: //host         //port
    var conn = new WebSocket('ws://' + 	'icarus.cs.weber.edu/' + ':8080/echo');
    conn.onmessage = function(e) { console.log(e.data); };
    conn.onopen = function(e) { conn.send('Hello Me!'); };

   };
 </script>

</html>