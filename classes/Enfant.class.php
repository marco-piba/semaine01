<?php 

class Enfant {

protected $nbreEnfant0_10=0;
protected $nbreEnfant11_15=0;
protected $nbreEnfant16_18=0;

public function getNbreEnfant0_10(){
    return $this->nbreEnfant0_10;
}
public function getNbreEnfant11_15(){
    return $this->nbreEnfant11_15;
}
public function getNbreEnfant16_18(){
    return $this->nbreEnfant16_18;
}

public function setNbreEnfant0_10 (int $nbre){
    return $this->nbreEnfant0_10=$nbre;
}
public function setNbreEnfant11_15(int $nbre){
    return $this->nbreEnfant11_15=$nbre;
}
public function setNbreEnfant16_18(int $nbre){
    return $this->nbreEnfant16_18=$nbre;
}
}



?>