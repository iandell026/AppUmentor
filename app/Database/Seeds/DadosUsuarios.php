<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DadosUsuarios extends Seeder
{
    public function run()
    {
        $dataAtual = date('Y-m-d H:i:s');

        $data = [
            [
                'Nome' => 'Cauê Nelson Rodrigues',
                'Email' => 'caue-rodrigues96@outlook.com',
                'DataAdmissao' => '2023-11-09',
                'CriadoEm' => $dataAtual
            ],
            [
                'Nome' => 'Natália Sophia Ferreira',
                'Email' => 'nataliaferreira@brunofaria.com',
                'DataAdmissao' => '2023-12-06',
                'CriadoEm' => $dataAtual
            ],
            [
                'Nome' => 'Luzia Stella Lopes',
                'Email' => 'luzia.lopes@sp.senac.com.br',
                'DataAdmissao' => '2023-09-15',
                'CriadoEm' => $dataAtual
            ],
            [
                'Nome' => 'Ricardo Thomas Aragão',
                'Email' => 'ricardo_aragao@graffiti.net',
                'DataAdmissao' => '2024-01-06',
                'CriadoEm' => $dataAtual
            ],
            [
                'Nome' => 'Antônia Helena Ribeiro',
                'Email' => 'antoniaribeiro@uol.com.br',
                'DataAdmissao' => '2024-01-04',
                'CriadoEm' => $dataAtual
            ],
        ];

        $this->db->table('t_usuarios')->insertBatch($data);
    }
}
