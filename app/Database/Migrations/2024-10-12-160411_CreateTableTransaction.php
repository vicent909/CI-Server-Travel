<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTransaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'       => true,
                'null'     => false
            ],
            'travel_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'       => true,
                'null'     => false
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => 'pending',
                'null'     => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,  // Set to NULL initially, and will be auto-managed
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,  // Set to NULL initially, and will be auto-managed
            ],
        ]);
        $this->forge->addKey('id', true); // Primary Key
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); 
        $this->forge->addForeignKey('travel_id', 'travels', 'id', 'CASCADE', 'CASCADE'); 
        $this->forge->createTable('transactions'); // Create the users table
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
