<?php

header("Content-Type: text/css charset: UTF-8");
if(!isset($_COOKIE["tema"])){
    setcookie("tema","#888", 99999999, "/");
    $_COOKIE["tema"]="red";
}
?>
body {
    background: <?php echo $_COOKIE["Tema"] ?>;
}