<?php

use yii\db\Schema;
use yii\db\Migration;

class m151112_152157_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
         
                $this->createTable('user', [
                    'id' => 'string NOT NULL',
                        'PRIMARY KEY (id)',
                    'name' => $this->string(50)->notNull(),
                    'email' => $this->string(50)->notNull(),
                    'password_hash' => $this->string(100)->notNull(),
                    'password_reset' => $this->string(10)-<notNull(),
                    'created_at' => $this->dateTime()->notNull(),
                    'updated_at' => $this->dateTime()->notNull(),
                ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('user');

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
