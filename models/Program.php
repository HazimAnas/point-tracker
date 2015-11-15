<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "status".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property datetime $created_at
 * @property datetime $updated_at
**/
class Program extends ActiveRecord {

	public static function tableName() {
		return 'program';
	}

	public function rules() {
		return [
			['name', 'required'],
			['description', 'safe'],
			[['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 256]
		];
	}

	public function behaviors() {
	        
	    return [
	        [
	            'class' => TimestampBehavior::className(),
	            'attributes' => [
	                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
	                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
	                'value' => new Expression('NOW()'),
	            ],
	        ],
	    ];
	}

	public function beforeSave($insert)
	{
	    if (parent::beforeSave($insert)) {

	    	$initial = '';

		    foreach (explode(' ', $this->name) as $word) {
		    	$initial .= strtoupper($word[0]);
		    }

	        $this->id = $initial;

	        return true;
	    } else {
	        return false;
	    }
	}

}