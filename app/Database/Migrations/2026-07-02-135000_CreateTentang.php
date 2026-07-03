<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTentang extends Migration
{
    public function up()
    {
        // 1. Table profil
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tagline' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'biografi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'cv_file' => [
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
        $this->forge->createTable('profil');

        // 2. Table skills
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'ikon' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'code',
            ],
            'level' => [
                'type'       => 'INT',
                'constraint' => 3,
                'default'    => 0,
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
        $this->forge->createTable('skills');

        // 3. Table karir
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'posisi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tags' => [
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
        $this->forge->createTable('karir');

        // Insert Seeder / Default Data
        $db = \Config\Database::connect();

        // Profil default data
        $db->table('profil')->insert([
            'id'         => 1,
            'nama'       => 'Azeria',
            'tagline'    => 'Membangun Solusi Digital dengan Presisi & Kehandalan',
            'biografi'   => 'Saya adalah seorang pengembang perangkat lunak yang berfokus pada pembuatan aplikasi web yang tidak hanya memiliki kinerja tinggi, tetapi juga memberikan pengalaman pengguna yang sangat halus. Dedikasi saya pada standar teknik modern memastikan setiap baris kode yang saya tulis bersifat skalabel, aman, dan mudah dikelola.',
            'foto'       => 'default_profile.png',
            'cv_file'    => 'Curriculum_Vitae_Azeria.pdf',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Skills default data
        $skills = [
            ['nama' => 'HTML5', 'ikon' => 'html', 'level' => 95],
            ['nama' => 'CSS3 / Tailwind', 'ikon' => 'css', 'level' => 90],
            ['nama' => 'Vanilla JS', 'ikon' => 'javascript', 'level' => 85],
            ['nama' => 'CodeIgniter 4', 'ikon' => 'code', 'level' => 80],
            ['nama' => 'REST API', 'ikon' => 'api', 'level' => 88],
            ['nama' => 'SQL / MySQL', 'ikon' => 'database', 'level' => 82],
            ['nama' => 'Git / CLI', 'ikon' => 'terminal', 'level' => 92],
            ['nama' => 'UX Design', 'ikon' => 'architecture', 'level' => 75],
        ];
        foreach ($skills as $skill) {
            $db->table('skills')->insert([
                'nama'       => $skill['nama'],
                'ikon'       => $skill['ikon'],
                'level'      => $skill['level'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        // Karir default data
        $careers = [
            [
                'periode'    => '2022 - Sekarang',
                'posisi'     => 'Senior Full-Stack Developer',
                'perusahaan' => 'Tech Solutions Inc.',
                'deskripsi'  => 'Bertanggung jawab atas pengembangan arsitektur web berbasis microservices, memimpin tim frontend untuk implementasi desain yang responsif, dan mengoptimalkan query database yang meningkatkan kecepatan aplikasi sebesar 40%.',
                'tags'       => 'CodeIgniter 4, RESTful API, React JS'
            ],
            [
                'periode'    => '2020 - 2022',
                'posisi'     => 'Web Developer',
                'perusahaan' => 'Creative Digital Agency',
                'deskripsi'  => 'Fokus pada pembuatan landing page yang mengkonversi tinggi dan dashboard internal perusahaan. Berhasil mengintegrasikan berbagai API pihak ketiga untuk otomatisasi pemasaran.',
                'tags'       => 'Vanilla JS, Sass, PHP'
            ],
            [
                'periode'    => '2018 - 2020',
                'posisi'     => 'Junior Frontend Developer',
                'perusahaan' => 'Startup Hub',
                'deskripsi'  => 'Memulai perjalanan profesional dengan slicing desain Figma ke HTML/CSS pixel-perfect. Belajar pentingnya aksesibilitas dan performa web sejak dini.',
                'tags'       => 'HTML/CSS, Bootstrap, jQuery'
            ]
        ];
        foreach ($careers as $career) {
            $db->table('karir')->insert([
                'periode'    => $career['periode'],
                'posisi'     => $career['posisi'],
                'perusahaan' => $career['perusahaan'],
                'deskripsi'  => $career['deskripsi'],
                'tags'       => $career['tags'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function down()
    {
        $this->forge->dropTable('profil');
        $this->forge->dropTable('skills');
        $this->forge->dropTable('karir');
    }
}
