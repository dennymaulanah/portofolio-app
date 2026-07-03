<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengaturan extends Migration
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
            'nama_situs' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Portofolio Saya',
            ],
            'email_kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'telepon_kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'github_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'linkedin_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'instagram_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaturan');

        // Insert default data
        $db = \Config\Database::connect();
        $db->table('pengaturan')->insert([
            'id'             => 1,
            'nama_situs'     => 'Azeria Portfolio',
            'email_kontak'   => 'azeria@example.com',
            'telepon_kontak' => '628123456789',
            'github_url'     => 'https://github.com/azeria',
            'linkedin_url'   => 'https://linkedin.com/in/azeria',
            'instagram_url'  => 'https://instagram.com/azeria',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('pengaturan');
    }
}
