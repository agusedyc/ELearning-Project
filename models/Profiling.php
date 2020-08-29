<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profiling".
 *
 * @property int $id
 * @property string $method
 * @property string $description
 */
class Profiling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['method', 'description'], 'required'],
            [['description'], 'string'],
            [['method'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'method' => 'Method',
            'description' => 'Description',
        ];
    }
}
