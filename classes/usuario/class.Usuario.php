<?php
	include_once 'class.Consultor.php';

    class UsuarioDao
    {
        public function validaLogin($usuario, $senha)
		{
			$consultor = new Consultor('S');
			return $consultor->consultar($this->sqlConsultaLogin($usuario, $senha));
        }
        
        private function sqlConsultaLogin($usuario, $senha)
		{
			return "EXEC P_VALIDA_LOGIN @USUARIO= '$usuario', @SENHA= '$senha';";
			
		}
    }
?>