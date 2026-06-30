<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotoProyek extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'proyek_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nama_file' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('proyek_id');
        $this->forge->addForeignKey('proyek_id', 'proyek', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('foto_proyek');
    }

    public function down()
    {
        $this->forge->dropTable('foto_proyek');
    }
}
