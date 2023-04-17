<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Opd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_opd' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true,
            ],
            'nama_opd' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ],
            'tanggal_input' => [
                'type' => 'datetime',
                
            ],
            'tanggal_update' => [
                'type' => 'datetime',

            ],
            'tanggal_hapus' => [
                'type' => 'datetime',

            ],
        ]);
        $this->forge->addKey('id_opd', true);
        $this->forge->createTable('opd');
    }

    public function down()
    {
        $this->forge->dropTable('opd');
    }
}
