<?php
namespace app\models;

use Yii;
use app\modules\quiz\models\QuizCategory as BaseQuizCategory;
use yii\behaviors\BlameableBehavior;

class QuizCategory extends BaseQuizCategory
{
	public function behaviors()
	{
	  return [
			[
			  'class' => BlameableBehavior::className(),
			  'createdByAttribute' => 'created_by',
			  'updatedByAttribute' => 'updated_by',
			],
	  ];
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
            [['name'],'string'],
            [['name'],'required'],
			[['created_by','updated_by','lecture_id'],'integer'],
		];
	}

	/**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'lecture_id' => 'Material',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getLecture()
    {
        return $this->hasOne(CourseLecture::className(), ['id' => 'lecture_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCreated()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserUpdated()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

}