<?php
echo "Obrada zahteva...";

require "dbBroker.php";
require "model/prijava.php";
require "handler/delete.php";//u delete.php za $conn  nema potrebe da se includuje dbBroker jer ovde u obradi
//smo dodali handler/delete
require "handler/create.php";
require "handler/update.php";

header("Location: home.php");

?>