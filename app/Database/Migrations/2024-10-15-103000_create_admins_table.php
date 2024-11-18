<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropProductsTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('products');
    }

    public function down()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'categories' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }
}
