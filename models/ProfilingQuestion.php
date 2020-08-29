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
class ProfilingQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiling_question';
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
            [['id', 'profiling_id','category_id'], 'integer'],
            [['question'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 30],
            [['profiling_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profiling::className(), 'targetAttribute' => ['profiling_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilingCategory::className(), 'targetAttribute' => ['category_id' => 'id']],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question' => Yii::t('app', 'Question'),
            'profiling_id' => Yii::t('app', 'Profiling Technique'),
            'category_id' => Yii::t('app', 'Profiling Category'),
        ];
    }

    public function getProfiling()
    {
        return $this->hasOne(Profiling::className(), ['id' => 'profiling_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(ProfilingCategory::className(), ['id' => 'category_id']);
    }

}
