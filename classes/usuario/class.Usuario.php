<?php
	include_once '../classes/conexao/class.Consultor.php';

	class UsuarioDao
    {
        public function validaLogin($usuario, $senha)
		{
			$consultor = new Consultor('S');
			return $consultor->consultar($this->sqlConsultaLogin($usuario, $senha));
        }
        
        private function sqlConsultaLogin($usuario, $senha)
		{
			return "SELECT 
						1 'SUCESSO', 
						1 'PERMITIDO', 
						ID_TIPO_USUARIO AS 'ADMINISTRATIVO',  
						ID_USUARIO, 
						NOME, 
						SENHA 
					FROM USUARIO 
					WHERE LOGIN = '$usuario' AND SENHA = '$senha';";			
		}
    }
?>