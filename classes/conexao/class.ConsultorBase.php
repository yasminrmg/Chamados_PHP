<?php
    include_once "class.Conexao.php";

	class ConsultorBase extends Conexao
	{		
		public function __construct()
		{
			//Executa o método construtor da classe herdada.
			parent::__construct();
		}
		
		//Faz consultas no banco e retorna um array com os valores.
		public function consultaBase($query)
		{
			try
			{
				$this->conectar();
				$result= $this->retornaDadosConsulta($this->conexao->query($query));
			}
			catch(Exception $e)
			{
				$result[0]["SUCESSO"]= false;
				$result[0]["MSG"]= '[Cod.: ' . $e->getCode() . '] Ocorreu um erro ao consultar o banco de dados!';
			}
            
            return $result;
		}

		public function insercaoBase($query)
		{
			try
			{
				$this->conectar();
				$result[0]["SUCESSO"]= $result= $this->conexao->query($query);
			}
			catch(Exception $e)
			{
				$result[0]["SUCESSO"]= false;
				$result[0]["MSG"]= '[Cod.: ' . $e->getCode() . '] Ocorreu um erro ao consultar o banco de dados!';
			}
            
            return $result;
		}
		
		//Retorna dados da consulta.
		private function retornaDadosConsulta($resultado)
		{
			$retorno= $resultado->fetchAll(PDO::FETCH_ASSOC);
						
			return $retorno;
		}
	}
?>