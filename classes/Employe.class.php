<?php
spl_autoload_register(function($class) 
{
    include "classes/".$class.".class.php";
});

class Employe {
protected $_nom;
protected $_prenom;
protected $_dateEmbauche;
protected $_fonction;
protected $_salaire;
protected $_service;
protected $_Agence;
protected $_enfants;
public static $nbrEmploye=0;




 public function getprenom(){
     return $this->_prenom;
 } 
 public function getnom(){
     return $this->_nom;
 } 
 public function getdateEmbauche(){
    return $this->_dateEmbauche;
 } 
 public function getFonction(){
     return $this->_fonction;
 } 
 public function getSalaire(){
     return $this->_salaire;
 } 
 public function getService(){
     return $this->_service;
 } 
 public function getAgence(){
     return $this->_Agence;
 } 
 public function getEnfants(){
     return $this->_enfants;
 } 

public function setPrenom(string $nouvprenom){
     return $this->_prenom=$nouvprenom;
 } 
public function setNom(string $nouvnom){
     return $this->_nom=$nouvnom;
 } 
 public function setdateEmbauche(string $nouvdateEmbauche){
    // $date= DateTime::createFromFormat("Y-m-d", $nouvdateEmbauche);
     //$newDate=$date->format('d/m/Y');
     return $this->_dateEmbauche=$nouvdateEmbauche;
 } 
 public function setFonction(string $nouvposte){
     return $this->_fonction=$nouvposte;
 } 
 public function setSalaire( $nouvsalaireAnn){
     return $this->_salaire=$nouvsalaireAnn;
 } 
 public function setService(string $nouvservice){
     return $this->_service=$nouvservice;
 } 
 public function setAgence(object $agence){
     return $this->_Agence=$agence;
 }
 public function setEnfants(object $enf){
     return $this->_enfants=$enf;
 } 
 public static function nbreEmploye(){
     self::$nbrEmploye++;
 }



 

public function getAnciennete(){
    $embauche=DateTime::createFromFormat("d/m/Y",$this->_dateEmbauche);
    $embauche->format('d/m/Y');
    $actuelDate=new dateTime();
    $actuelDate->format('d/m/Y');
    $interval =$actuelDate->diff($embauche);
   return $interval->format('%y');
   //an(s) %m mois et %d jours que vous etes employés chez nous </br>

}

public function CalculerPrime(){
    $v=$this->getAnciennete();
    $u=explode(" ",$v);
    $year=intval($u[0]);
    $prime=(($this->_salaire*5)/100)+((($this->_salaire*2)/100)*$year);
    $month =intval(date('m'));
    $day=intval(date('d'));

    if($month==11 and $day==30){echo"L’ordre de transfert a été envoyé à
votre banque au montant de ".$prime." euros.</br>";};
    
    return $prime;
    
}

public function isChequeVacance(){
    $v=$this->getAnciennete();
    $u=explode(" ",$v);
    $year=intval($u[0]);
    echo $year;
    return ($year>=1)?true:false;
     
 }

 public function NoelCheque(){
   $cheq20=$this->getEnfants()->getNbreEnfant0_10();
   $cheq30=$this->getEnfants()->getNbreEnfant11_15();
   $cheq50=$this->getEnfants()->getNbreEnfant16_18();
  
    if($cheq20+$cheq30+$cheq50 == 0){return false;}
    else {
        echo "L'employé recevra ".$cheq20." chèques de 20 euros, ".$cheq30." chèques de 30 euros et ".$cheq50." chèques de 50 euros</br>";  
    }
 }
 


 // Définition du constructeur de la classe et incrementation du nbre d'employes a chaque construction d'un objet

   function __construct(){
   
        self::nbreEmploye();
        $this->_enfants=$this->setEnfants(new Enfant);
       
   }


}

?>

