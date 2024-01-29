<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class RoleMigration extends Migration
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
            'role_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'role_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['0', '1'],
                'default'    => '1',
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
        $this->forge->createTable('role', true);
    }

    public function down()
    {
        //
    }
}
