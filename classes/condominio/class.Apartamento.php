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
        
        public function inserirApartamento($bloco,$ap,$vaga,$condominio)
		{
			$consultor = new Consultor();
            return $consultor->consultar($this->sqlConsultaInsereApartamento($bloco,$ap,$vaga,$condominio));
            //die($this->sqlConsultaInsereApartamento($bloco,$ap,$vaga,$condominio));
        }
        
        private function sqlConsultaInsereApartamento($bloco,$ap,$vaga,$condominio)
		{
            return 
            "
                INSERT INTO apartamento
                (bloco,n_apartamento,n_vaga,id_condominio)
                VALUES
                ('$bloco',$ap,$vaga,$condominio)
            ";			
		}
    }
?>