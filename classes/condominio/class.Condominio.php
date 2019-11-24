<?php
	include_once '../classes/conexao/class.Consultor.php';

	class CondominioDao
    {
        public function listarCondominios()
		{
			$consultor = new Consultor();
			return $consultor->consultar($this->sqlConsultaCondominios());
        }
        
        private function sqlConsultaCondominios()
		{
            return 
            "
                SELECT
                    id_condominio,
                    nome_condominio,
                    endereco,
                    cidade,
                    uf,
                    data_cadastro
                FROM
                    condominio 
            ";			
		}
    }
?>