<?php
    class Conexao
	{
		// Variaveis necessárias para conectar-se ao banco.
		private $servidor;
		private $banco;
		private $usuario;
		private $senha;
		public $conexao;
		
		//Metodo construtor, executado assim que a classe é instanciada.
		public function __construct()
		{
			$this->servidor= 'localhost';
			$this->banco=  'chamado_rapido';
			$this->usuario= 'root';
			$this->senha=  '';
		}
		
		/* Metodo para conectar-se ao banco de dados, as variaveis definidas
		 * no metodo construtor serão utilizadas aqui.
		 */
		public function conectar()
		{
            $this->conexao= new PDO("mysql:host=$this->servidor;port=3306;dbname=$this->banco;charset=utf8", "$this->usuario", "$this->senha");
			$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
?>