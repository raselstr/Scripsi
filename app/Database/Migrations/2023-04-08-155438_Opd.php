<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

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
            'kode_opd' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => '100',
                    'unique'        => true,
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
                'default' => NULL,
                

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
