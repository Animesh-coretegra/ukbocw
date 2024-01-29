<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class SliderMigration extends Migration
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
                'slider_id' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'unique'     => true,
                ],
                'slider_title' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'slider_subtitle' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'slider_image' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'status' => [
                    'type'       => 'ENUM',
                    'constraint' => ['1', '0'],
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
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('slider', true);
    }

    public function down()
    {
        //
    }
}
