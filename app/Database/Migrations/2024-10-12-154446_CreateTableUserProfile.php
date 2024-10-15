<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUserProfile extends Migration
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
                'unsigned' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'     => false
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'     => false
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE', 'fk_users'); // foreign key 
        $this->forge->createTable('user_profile'); // Create the users table
    }

    public function down()
    {
        $this->forge->dropTable('user_profile');
    }
}
