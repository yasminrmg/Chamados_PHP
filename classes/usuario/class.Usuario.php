<?php
	include_once '../classes/conexao/class.Consultor.php';

	class UsuarioDao
    {
        public function validaLogin($usuario, $senha)
		{
			$consultor = new Consultor();
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

		public function inserirUsuario($nome, $nascimento, $cpf, $sexo, $email, $usuario, $senha, $condominio, $apartamento)
		{
			$consultor = new Consultor();
			return $consultor->consultar($this->sqlConsultaInserirUsuario($nome, $nascimento, $cpf, $sexo, $email, $usuario, $senha, $condominio, $apartamento));
        }
        
        private function sqlConsultaInserirUsuario($nome, $nascimento, $cpf, $sexo, $email, $usuario, $senha, $condominio, $apartamento)
		{
			return
			"
				INSERT INTO USUARIO
				(
					ID_TIPO_USUARIO,
					CPF,
					DATA_NASCIMENTO,
					SEXO,
					NOME_USUARIO,
					EMAIL,
					LOGIN,
					SENHA,
					ID_APARTAMENTO,
					ID_OPERADOR,
					APROVADO,
					DATA_APROVACAO
				)
				VALUES
				(
					3,
					'$cpf',
					'$nascimento',
					'$sexo',
					'$nome',
					'$email',
					'$usuario',
					'$senha',
					$apartamento,
					1,
					0,
					NOW()
				)
			";			
		}
    }
?>