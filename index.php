<?php

require_once './classes/employe.class.php';

$employe1 =new employe();
$employe1->setnom("poiret");
$employe1->setprenom("Jean");
$employe1->setdateEmbauche("01/04/2020");
$employe1->setFonction("adjoint");
$employe1->setSalaire(60000);
$employe1->setService("administration");

$employe2 =new employe();
$employe2->setnom("dussart");
$employe2->setprenom("Audrey");
$employe2->setdateEmbauche("07/05/2015");
$employe2->setFonction("caissière");
$employe2->setSalaire(20000);
$employe2->setService("magasin");

$employe3 =new employe();
$employe3->setnom("Martin");
$employe3->setprenom("Giles");
$employe3->setdateEmbauche("12/01/2018");
$employe3->setFonction("sous-directeur");
$employe3->setSalaire(120000);
$employe3->setService("direction");

$employe4 =new employe();
$employe4->setnom("Normand");
$employe4->setprenom("Eric");
$employe4->setdateEmbauche("10/11/2000");
$employe4->setFonction("chauffeur");
$employe4->setSalaire(40000);
$employe4->setService("transport");

$employe5 =new employe();
$employe5->setnom("Maire");
$employe5->setprenom("Pauline");
$employe5->setdateEmbauche("08/04/2015");
$employe5->setFonction("acheteuse");
$employe5->setSalaire(70000);
$employe5->setService("marketing");

$employe6 =new employe();
$employe6->setnom("Maire");
$employe6->setprenom("Aurore");
$employe6->setdateEmbauche("05/08/2012");
$employe6->setFonction("acheteuse");
$employe6->setSalaire(70000);
$employe6->setService("marketing");



$employees = [$employe1,$employe2,$employe3,$employe4,$employe5,$employe6];


//afficher le nombre d’employés de l’entreprise
//$Empl=array_key_last($employees);
var_dump(Employe::$nbrEmploye);
echo "il y a ".(Employe::$nbrEmploye)." employés dans l'entreprise";



//afficher toutes les informations des employés par ordre alphabétique sur le nom et le prénom


function comparerNom($employee1,$employee2) { 
    $employeenom1=$employee1->getnom();
    $employeeprenom1=$employee1->getprenom();
    $employeenom2=$employee2->getnom();
    $employeeprenom2=$employee2->getprenom();

    if($employeenom1 == $employeenom2){
         return($employeeprenom1 < $employeeprenom2)?-1:1; 
      }
      else{
    return($employeenom1 < $employeenom2)?-1:1; }
} 
usort($employees,"comparerNom");

 
var_dump($employees);

//afficher toutes les informations des employés par ordre alphabétique de service, nom et prénom

function comparerService($employee1,$employee2) { 
    $employeeservice1=$employee1->getservice();
    $employeeservice2=$employee2->getservice();
    $employeenom1=$employee1->getnom();
    $employeeprenom1=$employee1->getprenom();
    $employeenom2=$employee2->getnom();
    $employeeprenom2=$employee2->getprenom();

    if($employeeservice1 == $employeeservice2){

        if($employeenom1 == $employeenom2){
         return($employeeprenom1 < $employeeprenom2)?-1:1; 
      }
        else{
            return($employeenom1 < $employeenom2)?-1:1; }
    } 
    else{
        return($employeeservice1 < $employeeservice2)?-1:1;
    
    }

}
usort($employees,"comparerService");

//afficher le montant total du coût que représentent tous les salariés (masse salariale) déduit du salaire et des primes.

$totSal=0;
foreach($employees as $employe){
     $totSal+=$employe->getSalaire()+$employe-> CalculerPrime();

}

echo "la masse salariale totale incluant les primes est de ".$totSal." euros</br>";


/***Creation agence******/

$agence1=new Agence();
$agence1->setnom("afpa");
$agence1->setadresse("30 rue Poulainville");
$agence1->setCodePostal("80000");
$agence1->setville("Amiens");

$agence2=new Agence();
$agence2->setnom("Vilam");
$agence2->setadresse("16 rue Jules ferry");
$agence2->setCodePostal("59000");
$agence2->setville("Lille");

$agence3=new Agence();
$agence3->setnom("Athos");
$agence3->setadresse("32 avenue Victor Hugo");
$agence3->setCodePostal("86000");
$agence3->setville("Poitiers");


$agence4=new Agence();
$agence4->setnom("Baille");
$agence4->setadresse("162 Champs Elysées");
$agence4->setCodePostal("78000");
$agence4->setville("Paris");

$enfant1=new Enfant();
$enfant1->setNbreEnfant0_10(2);
$enfant1->setNbreEnfant11_15(0);
$enfant1->setNbreEnfant16_18(1);


$employe1->setagence($agence1);
$employe1->setEnfants($enfant1);
var_dump($employe1);

$employe1->NoelCheque().'</br>';
$employe2->NoelCheque().'</br>';
$employe1->isChequeVacance().'</br>';
$employe1->CalculerPrime().'</br>';
$employe1->getAnciennete().'</br>';

$directeur1=new directeur();
$directeur1->setSalaire(40000);
$directeur1->setdateEmbauche("25/10/2018");
$directeur1->getAnciennete();
$directeur1->CalculerPrime();
var_dump($directeur1);

?>
