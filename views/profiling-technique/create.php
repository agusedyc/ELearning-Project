<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profiling */

$this->title = 'Create Profiling';
$this->params['breadcrumbs'][] = ['label' => 'Profilings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
