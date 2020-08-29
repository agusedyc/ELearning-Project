<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
// echo '<pre>';
// print_r($model);
// echo '</pre>';
?>
<div class="course-view">
    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'material_file',
            // 'about:ntext',
            // 'institution.name',
            // 'subject.name',
            // 'level.name',
            // 'instructor_id',
            // 'created_at:datetime',
            // 'updated_at:datetime',
        ],
    ]) ?>
     <h3>Quiz</h3>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{take-quiz}',
                'buttons' => [
                    'take-quiz' => function($url, $quiz) {
                        return Html::a('Take Quiz Now', ['quiz/site/start','category' => $quiz->id], ['class' => 'btn btn-sm btn-success']);
                    },
                ],
            ],
        ]
        ]);
    ?>
</div>
