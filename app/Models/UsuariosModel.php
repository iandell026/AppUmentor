<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class UsuariosModel extends Model {

		public function listarUsuarios() 
		{
			$usuarios = $this->db->query("SELECT * FROM t_usuarios");
			return $usuarios->getResult();
		}

		public function listarUsuariosPorID($id)
		{
			$usuarios = $this->db->query("SELECT * FROM t_usuarios WHERE ID = $id ");
			return $usuarios->getResult();
		}

		public function inserir($dados)
		{
			$usuarios = $this->db->table('t_usuarios');
			$usuarios->insert($dados);

			return $this->db->insertID();
		}

	}