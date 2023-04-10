<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use DateTime;

class Opd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true,
            ],
            'nip' => [
                    'type' => 'VARCHAR',
                    'constraint' => '18',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'eselon' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_input' => [
                'type' => 'datetime',
                
            ],
            'tanggal_update' => [
                'type' => 'datetime',

            ],
        ]);
        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
