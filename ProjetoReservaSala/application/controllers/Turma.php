<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller {
    /*
    Validação dos tipos de retornos nas validações (Código de erro)
    1 - operação realizada no banco de dados com sucesso (Inserção, Alteração, Consulta ou Exclusão)
    2 - Conteúdo passado nulo ou vazio
    3 - Conteúdo zerado
    4 - Conteúdo não inteiro
    5 - Conteúdo não é um texto 
    6 - Data em formato inválido
    12 - Na atualização, pelo menos um atributo deve ser passado
    99 - Parâmetros passados do front não correspondem ao método
    */

    //Atributos privados da classe
    private $codigo;
    private $descricao;
    private $capacidade;
    private $dataInicio;
    private $estatus;

    //Getters dos atributos
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    
    public function getCapacidade()
    {
        return $this->capacidade;
    }

    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    public function getEstatus()
    {
        return $this->estatus;
    }

    //Setters dos atributos 
    public function setCodigo($codigoFront)
    {
        $this->codigo = $codigoFront;
    }

    public function setDescricao($descricaoFront)
    {
        $this->descricao = $descricaoFront;
    }

    public function setCapacidade($capacidadeFront)
    {
        $this->capacidade = $capacidadeFront;
    }

    public function setDataInicio($dataInicioFront)
    {
        $this->dataInicio = $dataInicioFront;
    }

    public function setEstatus($estatusFront)
    {
        $this->estatus = $estatusFront;
    }

    public function inserir(){
        //Atributos para controlar o status de nosso método
        $erros = [];
        $sucesso = false;

        try{

            $json = file_get_contents('php://input');
            $resultado = json_decode($json);
            $lista = [
                "descricao" => '0',
                "capacidade" => '0',
                "dataInicio" => '0'
            ];

            if (verificarParam($resultado, $lista) != 1){
                //Validar vindos de forma correta do frontend (Helper)
                $erros[] = [
                    'codigo' => 99,
                    'msg' => 'Campos Inexistentes ou incorretos no FrontEnd.'
                ];
            }else{
                //Validar campos quanto ao tipo de dado de tamanho (Helper)
                $retornoDescricao = validarDados($resultado->descricao,'string',true);
                $retornoCapacidade = validarDados($resultado->capacidade, 'int', true);
                $retornoDataInicio = validarDados($resultado->dataInicio, 'date', true);

                if($retornoDescricao['codigoHelper'] != 0){
                    $erros[] = ['codigo' => $retornoDescricao['codigoHelper'],
                                'campo' => 'Descrição',
                                'msg' => $retornoDescricao['msg']
                    ];
                }

                if($retornoCapacidade['codigoHelper'] != 0){
                    $erros[] = ['codigo' => $retornoCapacidade['codigoHelper'],
                                'campo' => 'Capacidade',
                                'msg' => $retornoCapacidade['msg']
                    ];
                }

                if($retornoDataInicio['codigoHelper'] != 0){
                    $erros[] = ['codigo' => $retornoDataInicio['codigoHelper'],
                                'campo' => 'Data Inicio',
                                'msg' => $retornoDataInicio['msg']
                    ];
                }

                //Se não encontrar erros
                if (empty($erros)){
                    $this->setDescricao($resultado->descricao);
                    $this->setCapacidade($resultado->capacidade);
                    $this->setDataInicio($resultado->dataInicio);

                    $this->load->model('M_turma');
                    $resBanco = $this->M_turma->inserir(
                        $this->getDescricao(),
                        $this->getCapacidade(),
                        $this->getDataInicio()
                    );

                    if ($resBanco['codigo'] == 1){
                        $sucesso = true;
                    } else {
                        //captura erro do banco
                        $erros[] = [
                        'codigo' => $resBanco['codigo'],
                        'msg' => $resBanco['msg']
                        ];
                    }
                }
            }
        }catch(Exception $e){
            $erros[] = ['codigo' => 0, 'msg' => 'Erro inesperado: ' . $e->getMessage()];
        }

        //Monta retorno unico
        if ($sucesso == true){
            $retorno = ['sucesso' => $sucesso, 'codigo' => $resBanco['codigo'],
                        'msg' => $resBanco['msg']];
        } else {
            $retorno = ['sucesso' => $sucesso, 'erros' => $erros];
        }

        //transforma o array em JSON
        echo json_encode($retorno);
    }
}

?>