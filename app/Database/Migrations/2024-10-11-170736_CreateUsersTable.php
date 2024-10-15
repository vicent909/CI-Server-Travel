<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
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
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'     => false
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'     => false
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => 'user',
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
        $this->forge->createTable('users'); // Create the users table
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
