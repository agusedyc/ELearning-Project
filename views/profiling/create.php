<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProfilingQuestion */

$this->title = 'Create Profiling Question';
$this->params['breadcrumbs'][] = ['label' => 'Profiling Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiling-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list_profiling' => $list_profiling,
        'list_category' => $list_category,
    ]) ?>

</div>
