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
						ID_TIPO_USUARIO,  
						ID_USUARIO, 
						NOME_USUARIO, 
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

		public function listarUsuarios()
		{
			$consultor = new Consultor();
			return $consultor->consultar($this->sqlConsultaListarUsuarios());
        }
        private function sqlConsultaListarUsuarios()
		{
			return
			"
				SELECT 
				U.ID_USUARIO,
				U.ID_TIPO_USUARIO,
				U.CPF,
				U.DATA_NASCIMENTO,
				U.SEXO,
				U.NOME_USUARIO,
				U.EMAIL,
				U.LOGIN,
				U.SENHA,
				U.ID_APARTAMENTO,
				AP.N_APARTAMENTO,
				U.APROVADO,
				U.DATA_APROVACAO
			FROM
				USUARIO U
					LEFT JOIN
				APARTAMENTO AP ON AP.ID_APARTAMENTO = U.ID_APARTAMENTO
			";			
		}
    }
?>