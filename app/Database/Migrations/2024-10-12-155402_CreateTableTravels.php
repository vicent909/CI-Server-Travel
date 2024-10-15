<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTravels extends Migration
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
            'destination' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'     => false
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'     => false
            ],
            'price' => [
                'type'       => 'INT',
                'constraint' => 100,
                'null'     => false
            ],
            'capacity' => [
                'type'       => 'INT',
                'constraint' => 10,
                'null'     => false
            ],
            'category_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
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
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE'); // add foreign key
        $this->forge->createTable('travels'); // Create the users table
    }

    public function down()
    {
        $this->forge->dropTable('travels');
    }
}
