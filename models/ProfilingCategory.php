<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profiling_category".
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 */
class ProfilingCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiling_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'status' => 'Status',
        ];
    }
}
