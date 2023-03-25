<?php
setcookie("set1",$_GET['s1']);
setcookie("set2",$_GET['s2']);
setcookie("set3",$_GET['s3']);
setcookie("set4",$_GET['s4']);

echo "<br>Style ".$_GET['s1'];
echo "<br>Size ".$_GET['s2'];
echo "<br>Color ".$_GET['s3'];
echo "<br>bg color ".$_GET['s4'];
?>

<html>
    <body>
        <form action="a2.php">
            <input type="submit" value="OK">
</form>
</body>
</html>