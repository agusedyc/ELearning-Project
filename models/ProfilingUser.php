<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "profiling_question".
 *
 * @property int $id
 * @property int $question
 *
 * @property QuizCategory $category
 */
class ProfilingUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiling_user';
    }

    public function behaviors()
    {
       return [
            // 'blameable' => [
            //       'class' => BlameableBehavior::className(),
            //       'createdByAttribute' => 'created_by',
            //       'updatedByAttribute' => 'updated_by',
            // ],
            // 'timestamp' => [
            //     'class' => TimestampBehavior::className(),
            //     'attributes' => [
            //         ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
            //         ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            //     ],
            // ],  
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'question_id','answer' ], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User'),
            'question_id' => Yii::t('app', 'Question'),
            'answer' => Yii::t('app', 'Answer'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(ProfilingQuestion::className(), ['id'=>'question_id']);
    }

}
