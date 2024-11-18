<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAboutTable extends Migration
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
            'content' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('about');
    }

    public function down()
    {
        $this->forge->dropTable('about');
    }
}
