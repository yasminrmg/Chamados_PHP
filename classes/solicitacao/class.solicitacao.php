<?php 
    include_once '../classes/conexao/class.Consultor.php';

    class Solicitacao{
        public function listaSolicitacao($codUsuario,$tipoUsuario){
            $consultor = new Consultor();
            return $consultor->consultar($this->sqlConsultaSolicitacao($codUsuario,$tipoUsuario));
        }

        public function criaSolicitacao($titulo,$descricao,$id_usuario,$id_tipo,$data_evento,$duracao_evento,$status){
            $consultor = new Consultor();
			return $consultor->consultar($this->sqlCriaSolicitacao($titulo,$descricao,$id_usuario,$id_tipo,$data_evento,$duracao_evento,$status));
        }

        public function alteraSolicitacao($id_solicitacao,$status,$atendente,$descricao =null,$data_evento=null,$duracao=null,$data_atendimento=null){
            $consultor = new Consultor();
            return $consultor->consultar($this->sqlAlteraSolicitacao($id_solicitacao,$status,$atendente,$descricao,$data_evento,$duracao,$data_atendimento));
        }

        private function sqlConsultaSolicitacao($codUsuario,$tipoUsuario){
            return"SELECT 
                        S.ID_SOLICITACAO,
                        S.ID_TIPO_SOLICITACAO,
                        TS.TITULO_TIPO_SOLICITACAO,
                        S.TITULO_SOLICITACAO,   
                        S.DESCRICAO_SOLICITACAO,
                        S.ID_SOLICITANTE,
                        CL.NOME_USUARIO AS NOME_MORADOR,
                        AP.BLOCO,
                        AP.N_APARTAMENTO,
                        AP.N_VAGA,
                        S.ID_ATENDENTE,
                        FC.NOME_USUARIO AS NOME_FUNCIONARIO,
                        S.DATA_SOLICITACAO,
                        DATE_FORMAT(S.DATA_EVENTO, '%d/%m/%Y') AS DATA_EVENTO,
                        DATE_FORMAT(S.DURACAO_EVENTO, '%H:%i') AS DURACAO_EVENTO,
                        -- S.DATA_EVENTO,
                        -- S.DURACAO_EVENTO,
                        S.STATUS,
                        SS.TITULO AS STATUS_NOME,
                        SS.CLASSE_HTML,
                        S.DATA_ATENDIMENTO
                    FROM
                        SOLICITACAO S
                        INNER JOIN
                    USUARIO CL ON S.ID_SOLICITANTE = CL.ID_USUARIO
                        LEFT JOIN
                    USUARIO FC ON S.ID_ATENDENTE = FC.ID_USUARIO
                        LEFT JOIN
                    APARTAMENTO AP ON AP.ID_APARTAMENTO = CL.ID_APARTAMENTO
                        LEFT JOIN
                    SOLICITACAO_STATUS SS ON S.STATUS = SS.ID_STATUS_SOLICITACAO
                        LEFT JOIN 
                    TIPO_SOLICITACAO TS ON TS.ID_TIPO_SOLICITACAO = S.ID_TIPO_SOLICITACAO
                    WHERE
                        (S.ID_SOLICITANTE = $codUsuario AND CL.ID_TIPO_USUARIO = $tipoUsuario)
                        OR (S.ID_ATENDENTE = $codUsuario AND FC.ID_TIPO_USUARIO = 2)
                        OR 1 = $tipoUsuario
                    ORDER BY S.ID_SOLICITACAO DESC;";
        }

        private function sqlCriaSolicitacao($titulo,$descricao,$id_usuario,$id_tipo,$data_evento,$duracao_evento,$status){
            return "INSERT INTO SOLICITACAO
                        (ID_TIPO_SOLICITACAO,TITULO_SOLICITACAO,DESCRICAO_SOLICITACAO,ID_SOLICITANTE,DATA_EVENTO,DURACAO_EVENTO,STATUS)
                    VALUES
                        ($id_tipo,'$titulo','$descricao',$id_usuario,'$data_evento','$duracao_evento',$status)";
        }

        private function sqlAlteraSolicitacao($id_solicitacao,$status,$atendente,$descrica,$data_evento,$duracao,$data_atendimento){
            return "
                    UPDATE SOLICITACAO
                    SET
                        STATUS = $status,
                        DATA_ATENDIMENTO = NOW(),
                        ID_ATENDENTE = $atendente
                    WHERE
                        ID_SOLICITACAO = $id_solicitacao";
        }
    }
?>