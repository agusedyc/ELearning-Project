<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutionInstructor */

$this->title = 'Create Institution Instructor';
$this->params['breadcrumbs'][] = ['label' => 'Institution Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-instructor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
