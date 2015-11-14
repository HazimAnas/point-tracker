<?php

use yii\db\Schema;
use yii\db\Migration;

class m151112_152129_create_activity_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
         
                $this->createTable('activity', [
                    'id' => 'string NOT NULL',
                        'PRIMARY KEY (id)',
                    'name' => $this->string(100)->notNull(),
                    'description' => $this->string(256),
                    'program_id' => $this->string(50)->notNull(),
                    'created_at' => $this->dateTime()->notNull(),
                    'updated_at' => $this->dateTime()->notNull(),
                ], $tableOptions);

        $this->createIndex('index_program_id', 'activity', 'program_id');
        $this->addForeignKey('fk_program_id2', 'activity', 'program_id', 'program', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('activity');

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
