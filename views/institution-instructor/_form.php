<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use dektrium\user\models\User;
use app\models\Institution;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutionInstructor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institution-instructor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    $institutionItem = ArrayHelper::map(
	    Institution::find()->asArray()->all(),
	'id','name');

    echo $form->field($model, 'institution_id')->widget(Select2::classname(), [
      'data' => $institutionItem,
      'options' => [
        'placeholder' => 'Select Institution...',
      ],
      'pluginOptions' => [
        'allowClear' => true,
        'multiple' => false,
      ],
    ])->label('Institution'); ?>

    <?php

    $userItem = ArrayHelper::map(
	    User::find()->asArray()->all(),
	'id','username');

    echo $form->field($model, 'user_id')->widget(Select2::classname(), [
      'data' => $userItem,
      'options' => [
        'placeholder' => 'Select user...',
      ],
      'pluginOptions' => [
        'allowClear' => true,
        'multiple' => false,
      ],
    ])->label('User'); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
