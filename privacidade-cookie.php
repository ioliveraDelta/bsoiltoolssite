<?php
$value = $_POST['modo'];
setcookie("Privacidade", $value, time()+864000);  /* expira em 10 dias */
?>