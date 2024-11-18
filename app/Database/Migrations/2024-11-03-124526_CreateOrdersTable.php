<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'customer_id' => [
                'type' => 'INT',
            ],
        
            'product_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'quantity' => [
                'type' => 'INT',
            ],
            'total_amount' => [
                'type' => 'DECIMAL(10,2)'
            ], 
            'status_payment' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'paid', 'failed'],
                'default' => 'pending',
            ],           
            'order_date' => [
                'type' => 'DATETIME',
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}

