<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class MenuIconMigration extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'icon_id' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'unique'     => true,
                ],
                'icons' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'icon_name' => [
                    'type' => 'TEXT',
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
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu_icons', true);
    }

    public function down()
    {
        //
    }
}
