<?php

class Bicho {

    public $isViva;

    
    public function __construct($estado) {
        $this->isViva = $estado;
    }

    public function getIsViva() {
        return $this->isViva;
    }

    public function setIsViva($estado) {
        $this->isViva = $estado;
    }

}

?>
