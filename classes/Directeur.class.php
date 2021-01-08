<?php 


class Directeur extends Employe {


public function calculerPrime(){

    $v=$this->getAnciennete();
    $u=explode(" ",$v);
    $year=intval($u[0]);
    
    $prime=(($this->_salaire*7)/100)+((($this->_salaire*3)/100)*$year);
    $month =intval(date('m'));
    $day=intval(date('d'));

    if($month==11 and $day==30){echo"</br>L’ordre de transfert a été envoyé à
votre banque au montant de ".$prime." euros.</br>";};
    
    return $prime;
}



}


?>