<?php

if(isset($_POST['submit']) && $_POST['submit']=='izmeni'){
    
    $prijava=Prijava::getById($_POST['id_predmeta'],$conn);

    $prijava->predmet = $_POST['predmet'];
    $prijava->katedra = $_POST['katedra'];
    $prijava->sala = $_POST['sala'];
    $prijava->datum = $_POST['datum'];

    $status=Prijava::update($prijava,$conn);
    
    /*MOZE I OVAKO bez getById
    $prijava= new Prijava( $_POST['id_predmeta'],$_POST['predmet'],$_POST['katedra'],$_POST['sala'], $_POST['datum']);
    $status=Prijava::update($prijava, $conn);*/
}

?>