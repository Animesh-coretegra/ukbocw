<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ContactMigration extends Migration
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
            'contact_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'address' => [
                'type' => 'Text',
                'null' => true,
            ],
            'facebook' => [
                'type' => 'Text',
                'null' => true,
            ],
            'instagram' => [
                'type' => 'Text',
                'null' => true,
            ],
            'linkedin' => [
                'type' => 'Text',
                'null' => true,
            ],
            'twitter' => [
                'type' => 'Text',
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
        $this->forge->createTable('contact', true);
    }

    public function down()
    {
        //
    }
}
