<?php

use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutionInstructor */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Add Question';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelQuiz['course_title'], 'url' => ['course/view?id=' . $modelQuiz['course_id']]];
$this->params['breadcrumbs'][] = ['label' => $modelQuiz['title'] . ' (' . $modelQuiz['name'] . ')', 'url' => ['course/view-lecture/' . $modelQuiz['lecture_id'] . '/quiz/' . $modelQuiz['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="lecture-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'answer')->textInput() ?>

    <?= $form->field($model, 'answer2')->textInput() ?>

    <?= $form->field($model, 'answer3')->textInput() ?>

    <?= $form->field($model, 'answer4')->textInput() ?>

    <?= $form->field($model, 'answer5')->textInput() ?>

    <?= $form->field($model, 'answer6')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
