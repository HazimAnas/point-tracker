<?php

use yii\db\Schema;
use yii\db\Migration;

class m151112_152146_create_point_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
         
                $this->createTable('point', [
                    'id' => 'string NOT NULL',
                        'PRIMARY KEY (id)',
                    'amount' => $this->integer()->notNull(),
                    'team_id' => $this->string(50)->notNull(),
                    'activity_id' => $this->string(50)->notNull(),
                    'created_at' => $this->dateTime()->notNull(),
                    'updated_at' => $this->dateTime()->notNull(),
                ], $tableOptions);

        $this->createIndex('index_team_id', 'point', 'team_id');
        $this->createIndex('index_activity_id', 'point', 'activity_id');
        $this->addForeignKey('fk_team_id', 'point', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_activity_id', 'point', 'team_id', 'activity', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('point');

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
