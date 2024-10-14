<?php

if(isset($_POST['submit'])&& $_POST['submit']=='Obrisi'){ //&& isset($_POST['id_predmeta'])
    $status= Prijava::delete($_POST['id_predmeta'], $conn);

}

?>