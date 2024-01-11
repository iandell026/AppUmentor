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
            "nome" => $_POST['Nome'],
            "email" => $_POST['Email'],
            "dataAdmissao" => $_POST['DataAdmissao'],
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
        $dados = $model->listarUsuariosPorID($id);
        
        return $this->response->setJSON($dados);
    }
}
