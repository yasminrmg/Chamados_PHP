<?php
    include_once "class.ConsultorBase.php";

    class Consultor extends ConsultorBase
    {        
        public function __construct()
        {	
            parent::__construct();
        }
        
        public function consultar($query)
        {
            $resultado= $this->consultaBase($query);
            return $resultado;
        }

        public function inserir($query)
        {
            $resultado= $this->insercaoBase($query);
            return $resultado;
        }

        public function atualizar($query)
        {
            $resultado= $this->insercaoBase($query);
            return $resultado;
        }
    }
?>