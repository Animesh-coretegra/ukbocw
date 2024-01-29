<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CausesMigration extends Migration
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
            'cause_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'cause_title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'cause_short_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'cause_long_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'raised_amount' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'goal_amount' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'thumbnail_image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'details_images' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'cause_thumbnail_image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'is_urgent' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'],
                'default'    => '0',
            ],
            'is_latest' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'],
                'default'    => '0',
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
        $this->forge->createTable('causes', true);
    }

    public function down()
    {
        //
    }
}
