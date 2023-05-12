<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Pegawai extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
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
            // 'foto' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => '100',
            // ],
            'id_opd' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
            ],
            'tanggal_input' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                
            ],
            'tanggal_update' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'tanggal_hapus' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->db->enableForeignKeyChecks();
        $this->forge->addKey('id_pegawai', true);
        $this->forge->addForeignKey('id_opd','opd','id_opd');
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropForeignKey('pegawai','pegawai_id_opd_foreign');
        $this->forge->dropTable('pegawai');
    }
}
