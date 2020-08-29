<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "quiz_question".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $answer
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property string $answer5
 * @property string $answer6
 *
 * @property QuizCategory $category
 */
class QuizQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_question';
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
            'sluggable' => [
                    'class' => SluggableBehavior::className(),
                    'attribute' => 'title',
                    'slugAttribute' => 'slug',
                ],    
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['id', 'key', 'category_id'], 'integer'],
            [['title','answer', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6'], 'required'],
            [['title','answer', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6'], 'string', 'max' => 255]
           // [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuizCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'title' => Yii::t('app', 'Title'),
            // 'slug' => Yii::t('app', 'Slug'),
            'answer' => Yii::t('app', 'Answer'),
            'answer2' => Yii::t('app', 'Answer2'),
            'answer3' => Yii::t('app', 'Answer3'),
            'answer4' => Yii::t('app', 'Answer4'),
            'answer5' => Yii::t('app', 'Answer5'),
            'answer6' => Yii::t('app', 'Answer6'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(QuizCategory::className(), ['id' => 'category_id']);
    }
}
