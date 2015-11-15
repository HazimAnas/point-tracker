<?php

use yii\db\Schema;
use yii\db\Migration;

class m151112_151509_create_program_table extends Migration
{
    public function up()
    {
         $tableOptions = null;
                  if ($this->db->driverName === 'mysql') {
                      $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                  }
         
                  $this->createTable('program', [
                      'id' => 'string NOT NULL',
                        'PRIMARY KEY (id)',
                      'name' => $this->string(100)->notNull(),
                      'description' => $this->string(256),
                      'created_at' => $this->int(11)->notNull(),
                      'updated_at' => $this->int(11)->notNull(),
                  ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('program');

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
