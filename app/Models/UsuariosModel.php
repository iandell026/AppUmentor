<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class UsuariosModel extends Model {

		public function listarUsuarios($id = null) 
		{
			$sql = "SELECT
						ID,
						Nome,
						Email,
						DataAdmissao,
						DATE_FORMAT(DataAdmissao, '%d/%m/%Y') AS DataAdmissaoFormat,
						DATE_FORMAT(CriadoEm, '%d/%m/%Y %H:%i') AS CriadoEm,
						DATE_FORMAT(AtualizadoEm, '%d/%m/%Y %H:%i') AS AtualizadoEm
					FROM t_usuarios ";

			if($id != null){
				$sql .= " WHERE ID = ? ";
			}

			$query = $this->db->query($sql, [$id]);

			return $query->getResult();
		}

		public function inserir($dados)
		{
			$query = $this->db->table('t_usuarios');
			$query->insert($dados);

			return $this->db->insertID();
		}

		public function atualizar($dados, $id)
		{
			$query = $this->db->table('t_usuarios');
			$query->set($dados);
			$query->where('ID', $id);

			return $query->update();
		}

		public function excluir($id)
		{
			$query = $this->db->table('t_usuarios');
			$query->where('ID', $id);

			return $query->delete();
		}

	}