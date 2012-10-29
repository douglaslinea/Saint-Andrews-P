<?php

class FaleconoscoController extends ControllerBase {
    /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
     * Params String Action -> A��o a ser Executada Pelo Controller
     * Aten��o Demais M�todos do Controller Devem ser Privados
     */

    public function FaleconoscoController($controller, $action, $urlparams) {
        //Inicializa os par�metros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

    private function index_action($params = null) {
        //Solicita os dados da Vaga
        $resultados = $this->Delegator('ConcreteFaleconosco', 'SelectContatos');

         $this->getEstados();
        
        //joga o $dados na view
        $this->View()->assign('dados_contatos', $resultados);

        //verifica se foi post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->enviar();
        }

        //Verifica se h� dados extras a serem adicionados na view(via parametro)
        if (!is_null($params)) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se h� dados extras a serem adicionados na view(via SESS�O)
        else if (isset($_SESSION['view_data'])) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sess�o
            unset($_SESSION['view_data']);
        }

        //mostra a view
        $this->View()->display('detalhes.php');
    }

    private function enviar() {
        //verifica se foi post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //envia os dados
            $resultado_validacao = $this->Delegator("ConcreteFaleconosco", "InsertFaleconosco", $this->getPost());
        }
    }

    private function carregaEndereco() {
        //Instancia o Helper Principal
        $Helper = HelperFactory::getInstance();

        //Verifica se a requisição é ajax
        if ($Helper->isAjax()) {
            //Delega a tarefa ao Model
            $this->Delegator('ConcreteFaleconosco', 'carregaEndereco', $this->getPost());
        }
    }

    private function getEstados() {
        //Solicita os dados dos idiomas
        $recordset = $this->Delegator('ConcreteFaleconosco', 'getEstados');

        //Associa os dados na view
        $this->View()->assign('estados', $recordset);
    }

    /**
     * Busca as cidades conforme o estado selecionado
     */
    private function buscaCidades($cod_uf = null) {
        //Verifica o tipo de solicitação
        if (!is_null($cod_uf)) {
            //Parametros da Requisição
            $parametros = array('data' => array('cod_uf' => $cod_uf));
        } else {
            //Parametros da Requisição
            $parametros = array('json_data' => true, 'data' => (HelperFactory::getInstance()->isAjax() ? $this->getPost() : false));
        }

        //Verifica se os parametros foram informados corretamente
        if ($parametros !== false) {
            //Delega a tarefa ao Model
            $recordset = $this->Delegator('ConcreteFaleconosco', 'buscaCidades', $parametros);

            //Verifica o tipo de retorno
            if (!isset($parametros['json_data'])) {

                //Associa os dados a view
                $this->View()->assign('cidades', $recordset);
            }
        }
    }

    private function gerarCaptcha() {
        //envia os dados para o ConcreteFaleconosco
        return $this->Delegator("ConcreteFaleconosco", "Captcha");
    }

}

?>