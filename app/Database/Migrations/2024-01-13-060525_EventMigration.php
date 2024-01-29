<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class EventMigration extends Migration
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
                'event_id' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'unique'     => true,
                ],
                'event_title' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
                ],
                'event_short_description' => [
                    'type'       => 'TEXT',
                    'null' => true,
                ],
                'event_long_description' => [
                    'type'       => 'TEXT',
                    'null' => true,
                ],
                'event_date_time' => [
                    'type'       => 'TIMESTAMP',
                    'null' => true,
                ],
                'event_venue' => [
                    'type'       => 'TEXT',
                    'null' => true,
                ],
                'event_venue_city' => [
                    'type'       => 'TEXT',
                    'null' => true,
                ],
                'event_contact' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
                ],
                'thumbnail_image' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'main_image' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'is_upcoming' => [
                    'type'       => 'ENUM',
                    'constraint' => ['1', '0'],
                    'default'    => '1',
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
        $this->forge->createTable('events', true);
    }

    public function down()
    {
        //
    }
}
