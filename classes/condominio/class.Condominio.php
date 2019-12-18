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
        
        public function inserirCondominio($nome_condominio,$endereco,$cidade,$uf,$codUsuario)
		{
			$consultor = new Consultor();
            return $consultor->consultar($this->sqlConsultaCadastraCondominio($nome_condominio,$endereco,$cidade,$uf,$codUsuario));
            //die($this->sqlConsultaCadastraCondominio($nome_condominio,$endereco,$cidade,$uf,$codUsuario));
        }
        
        private function sqlConsultaCadastraCondominio($nome_condominio,$endereco,$cidade,$uf,$codUsuario)
		{
            return 
            "
                INSERT INTO CONDOMINIO
                (NOME_CONDOMINIO, ENDERECO, CIDADE, UF, ID_OPERADOR)
                VALUES
                ('$nome_condominio','$endereco','$cidade','$uf',$codUsuario)
            ";			
		}
    }
?>