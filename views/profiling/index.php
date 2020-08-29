<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfilingQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiling Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiling-question-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profiling Question', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'label' => 'Profiling Technique',
                'attribute' => 'profiling_id',
                'value' => 'profiling.method',
            ],
            [
                'label' => 'Question Category',
                'attribute' => 'category_id',
                'value' => 'category.name',
            ],
            'question',
            'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
