<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProfilingQuestion */

$this->title = 'Update Profiling Question: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profiling Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profiling-question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list_profiling' => $list_profiling,
        'list_category' => $list_category,
    ]) ?>

</div>
