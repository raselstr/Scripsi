<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use DateTime;

class Pegawai extends Migration
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
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_opd' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
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
        $this->forge->addKey('id_pegawai', true);
        $this->forge->addForeignKey('id_opd','opd','id_opd', 'CASCADE', 'CASCADE', 'my_fk_idOpd');
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropForeignKey('pegawai','my_fk_idOpd');
        $this->forge->dropTable('pegawai');
    }
}
