<?php

use yii\db\Schema;
use yii\db\Migration;

class m151112_152117_create_team_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
         
                $this->createTable('team', [
                    'id' => 'string NOT NULL',
                        'PRIMARY KEY (id)',
                    'name' => $this->string(100)->notNull(),
                    'members' => $this->string(256),
                    'program_id' => $this->string(50)->notNull(),
                    'created_at' => $this->dateTime()->notNull(),
                    'updated_at' => $this->dateTime()->notNull(),
                ], $tableOptions);

        $this->createIndex('index_program_id', 'team', 'program_id');
        $this->addForeignKey('fk_program_id', 'team', 'program_id', 'program', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
                $this->dropTable('team');

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
