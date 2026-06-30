<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTeknologiToProyek extends Migration
{
    public function up()
    {
        $this->forge->addColumn('proyek', [
            'teknologi' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'deskripsi',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('proyek', 'teknologi');
    }
}
