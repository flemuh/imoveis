<?php
session_start();
session_destroy();
$_SESSION['logado'] = 0;
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../telas/home.php'>";
?>