<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableImages extends Migration
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
            'travel_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'       => true,
                'null'     => false
            ],
            'image_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
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
        $this->forge->addForeignKey('travel_id', 'travels', 'id', 'CASCADE', 'CASCADE'); // add foreign key
        $this->forge->createTable('images'); // Create the users table
    }

    public function down()
    {
        //
        $this->forge->dropTable('images');
    }
}
