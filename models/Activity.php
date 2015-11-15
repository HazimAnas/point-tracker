<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $program_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Program $program
 * @property Point[] $points
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['description'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 256],
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
            'description' => 'Description',
            'program_id' => 'Program ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoints()
    {
        return $this->hasMany(Point::className(), ['team_id' => 'id']);
    }
}
