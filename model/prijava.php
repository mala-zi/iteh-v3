<?php

class Prijava{

    public $id;
    public $predmet;
    public $katedra;
    public $sala;
    public $datum;

    //php ne moze da ima vise od jednog konstruktora
    public function __construct ($id=null, $predmet=null, $katedra=null, $sala=null, $datum=null){
        $this->id=$id;
        $this->katedra=$katedra;
        $this->sala=$sala;
        $this->datum=$datum;
        $this->predmet=$predmet;
    }

    public static function read(mysqli $konekcija){
        $upit= "SELECT * 
                FROM prijave";

        return $konekcija->query($upit); //query je funkcija i izvrsava upit koji joj je proslednje tj $upit

    }

    public static function delete($id, mysqli $konekcija){
        $upit=" DELETE 
                FROM prijave
                WHERE id=$id "; 
        return $konekcija->query($upit);
    }

    public static function create(Prijava $prijava, mysqli $konekcija){
        $upit="INSERT INTO prijave(predmet, katedra, sala, datum)
                VALUES ('$prijava->predmet', '$prijava->katedra', '$prijava->sala', '$prijava->datum')";
        return $konekcija->query($upit);

    }
    public static function getById($id, mysqli $konekcija){
        $upit="SELECT *
                FROM prijave
                WHERE id=$id";
                
        $rezultat=$konekcija->query($upit);
        if ($red = $rezultat->fetch_assoc()) {//$red je red dobijen upitom u obliku asoc niza
            return new Prijava($id, $red['predmet'], $red['katedra'], $red['sala'], $red['datum']);//pravimo i vracamo
                                                                                         //novu prijavu sa dodeljenim vrednostima iz niza
            
        }

       return  null;
    }
 
    public static function update(Prijava $prijava, mysqli $konekcija){
        $upit="UPDATE prijave
                SET predmet = '$prijava->predmet', 
                 katedra = '$prijava->katedra', 
                 sala = '$prijava->sala', 
                 datum = '$prijava->datum'
             WHERE id=$prijava->id"; 
        return $konekcija->query($upit);
    }

}


?>
