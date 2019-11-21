<?
    class Sessao
    {
		private $nomeSistema = 'SCO';

        function __construct()
        {
            if(!isset($_SESSION))
            { 
                session_start(); 
            };
        }

        public function gravaValorSessao($nomeSessao, $valor)
		{
			$_SESSION[$this->nomeSistema][$nomeSessao]=$valor;
		}
		
		public function pegaValorSessao($nomeSessao,$Default='')
		{
			if(isset($_SESSION[$this->nomeSistema][$nomeSessao]) && !empty($_SESSION[$this->nomeSistema][$nomeSessao]))
			{
				return $_SESSION[$this->nomeSistema][$nomeSessao];
			}
			else
			{
				return $Default;
			}
		}
    }
?>