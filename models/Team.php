<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property string $id
 * @property string $name
 * @property string $members
 * @property string $program_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Point[] $points
 * @property Program $program
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'program_id', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['id'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 100],
            [['members'], 'string', 'max' => 256],
            [['program_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'members' => 'Members',
            'program_id' => 'Program ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoints()
    {
        return $this->hasMany(Point::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'program_id']);
    }
}
