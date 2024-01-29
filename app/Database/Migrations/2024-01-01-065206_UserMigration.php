<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
                'unique' => true
            ],
            'user_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'user_password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'user_role' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'user_profile_image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'],
                'default'    => '0',
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'null' => true,
            ],
            'modified_at' => [
                'type'    => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user', true);
    }

    public function down()
    {
        //
    }
}
