<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class MenuMappingMigration extends Migration
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
            'menu_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'role_id' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
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
        $this->forge->createTable('menu_mapping', true);
    }

    public function down()
    {
        //
    }
}
