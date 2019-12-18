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
					WHERE LOGIN = '$usuario' AND SENHA = '$senha' AND APROVADO = 1 ;";			
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

		public function listarUsuarios($id_usuario, $id_tipo_usuario)
		{
			$consultor = new Consultor();
			return $consultor->consultar($this->sqlConsultaListarUsuarios($id_usuario, $id_tipo_usuario));
        }
        private function sqlConsultaListarUsuarios($id_usuario, $id_tipo_usuario)
		{
			return
			"
				SELECT 
				U.ID_USUARIO,
				U.ID_TIPO_USUARIO,
				U.CPF,
				DATE_FORMAT(U.DATA_NASCIMENTO, '%d/%m/%Y') AS DATA_NASCIMENTO,
				-- U.DATA_NASCIMENTO,
				U.SEXO,
				U.NOME_USUARIO,
				U.EMAIL,
				U.LOGIN,
				U.SENHA,
				U.ID_APARTAMENTO,
				AP.N_APARTAMENTO,
				AP.BLOCO,
				AP.N_VAGA,
				AP.ID_CONDOMINIO,
				CD.NOME_CONDOMINIO,
				U.APROVADO,
				CASE
					WHEN U.APROVADO = 1 
						THEN 'APROVADO'
						ELSE 'REPROVADO'
				END AS S_APROVADO,
				U.DATA_APROVACAO
			FROM
				USUARIO U
					LEFT JOIN
				APARTAMENTO AP ON AP.ID_APARTAMENTO = U.ID_APARTAMENTO
					LEFT JOIN
				CONDOMINIO CD ON CD.ID_CONDOMINIO = AP.ID_CONDOMINIO
			WHERE
				(U.ID_USUARIO = $id_usuario AND U.ID_TIPO_USUARIO = $id_tipo_usuario)
				OR 1=$id_tipo_usuario;
			";			
		}

		public function alteraUsuario($id_usuario, $nome, $nascimento, $cpf, $email, $usuario, $senha, $condominio, $apartamento, $aprovado)
		{
			$consultor = new Consultor();
			return $consultor->consultar($this->sqlConsultaAlterarUsuario($id_usuario, $nome, $nascimento, $cpf, $email, $usuario, $senha, $condominio, $apartamento, $aprovado));
			//die /*$consultor->consultar*/($this->sqlConsultaAlterarUsuario($id_usuario, $nome, $nascimento, $cpf, $sexo, $email, $usuario, $senha, $condominio, $apartamento, $aprovado));
        }
        private function sqlConsultaAlterarUsuario($id_usuario, $nome, $nascimento, $cpf, $email, $usuario, $senha, $condominio, $apartamento, $aprovado)
		{
			$select=
			"
			UPDATE USUARIO
			SET
				CPF = '$cpf',
				DATA_NASCIMENTO = '$nascimento',
				NOME_USUARIO = '$nome',
				EMAIL = '$email',
				LOGIN = '$usuario',
				SENHA = '$senha'";
			if($apartamento != null && $condominio != null){
				$select.="
				,ID_APARTAMENTO = $apartamento";
			}
			if($aprovado != null){
				$select.=",
				DATA_APROVACAO = now()
				, APROVADO = $aprovado";
			}
			$select.=
			" WHERE ID_USUARIO = $id_usuario;
			";
			
			return $select;
		}

    }
?>