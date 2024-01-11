<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'Nome' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'Email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'DataAdmissao' => [
                'type'       => 'DATE',
            ],
            'CriadoEm' => [
                'type'       => 'DATETIME',
            ],
            'AtualizadoEm' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('ID', true);
        $this->forge->createTable('t_usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('t_usuarios');
    }
}
