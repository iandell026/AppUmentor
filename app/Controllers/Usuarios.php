<?php namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    public function index()
    {
        $model = new UsuariosModel();
        $dados = $model->listarUsuarios();

        $data = [
            "dados" => $dados
        ];

        return view('listagem', $data);
    }

    public function listarDados()
    {
        $model = new UsuariosModel();
        $dados = $model->listarUsuarios();

        return $this->response->setJSON($dados);
    }

    public function inserir()
    {
        $dataAtual = date('Y-m-d H:i:s');
        
        $dados = [
            "nome" => $this->request->getPost('Nome'),
            "email" => $this->request->getPost('Email'),
            "dataAdmissao" => $this->request->getPost('DataAdmissao'),
            "criadoEm" => $dataAtual,
        ];

        $model = new UsuariosModel();
        $id = $model->inserir($dados); //Insere e retorna o ID

        if ($id > 0) {
            $retorno = [
                'id' => $id,
                'sucesso' => true,
                'mensagem' => 'Usuário inserido no sistema.'
            ];
        } else {
            $retorno = [
                'sucesso' => false,
                'mensagem' => 'Falha ao inserir usuário.'
            ];
        }

        return $this->response->setJSON($retorno);
    }

    public function listarPorId($id)
    {
        $model = new UsuariosModel();
        $dadosPorId = $model->listarUsuarios($id);
        
        return $this->response->setJSON($dadosPorId);
    }

    public function editar($id)
    {
        $model = new UsuariosModel();
        $dadosParaEdicao  = $model->listarUsuarios($id);

        $data = [
            "dados" => $dadosParaEdicao 
        ];

        return view('edicao', $data);
    }

    public function atualizar($id)
    {
        $dataAtual = date('Y-m-d H:i:s');

        $dados = [
            "nome" => $this->request->getPost('Nome'),
            "email" => $this->request->getPost('Email'),
            "dataAdmissao" => $this->request->getPost('DataAdmissao'),
            "atualizadoEm" => $dataAtual,
        ];

        $model = new UsuariosModel();
        $resultadoAtualizacao = $model->atualizar($dados, $id);

        if ($resultadoAtualizacao) {
            $retorno = [
                'sucesso' => true,
                'mensagem' => 'Registro atualizado no sistema.'
            ];
        } else {
            $retorno = [
                'sucesso' => false,
                'mensagem' => 'Falha ao alterar usuário.'
            ];
        }

        return $this->response->setJSON($retorno);
    }

    public function excluir($id)
    {
        $model = new UsuariosModel();
        $resultadoExclusao = $model->excluir($id);

        if ($resultadoExclusao) {
            $retorno = [
                'sucesso' => true,
                'mensagem' => 'Usuário excluído com sucesso.'
            ];
        } else {
            $retorno = [
                'sucesso' => false,
                'mensagem' => 'Falha ao excluir usuário.'
            ];
        }

        return $this->response->setJSON($retorno);
    }
}
