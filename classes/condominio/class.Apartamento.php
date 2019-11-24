<?php
	include_once '../classes/conexao/class.Consultor.php';

	class ApartamentoDao
    {
        public function listarApartamentos($condominio)
		{
			$consultor = new Consultor();
			return $consultor->consultar($this->sqlConsultaApartamentos($condominio));
        }
        
        private function sqlConsultaApartamentos($condominio)
		{
            return 
            "
                SELECT
                    id_apartamento,
                    id_condominio,
                    bloco,
                    n_apartamento,
                    n_vaga
                FROM
                    apartamento
                WHERE
                    id_condominio = $condominio
            ";			
		}
    }
?>