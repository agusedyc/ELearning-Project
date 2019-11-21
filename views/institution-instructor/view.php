<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutionInstructor */

$this->title = $model->institution->name . ' (' . $model->user->username . ')';
$this->params['breadcrumbs'][] = ['label' => 'Institution Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->institution->name . ' (' . $model->user->username . ')', 'url' => ['view', 'id' => $model->id]];
\yii\web\YiiAsset::register($this);
?>
<div class="institution-instructor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'label' => 'Institution',
                'value' => $model->institution->name,
            ],
            [
                'label' => 'User',
                'value' => $model->user->username,
            ]
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
