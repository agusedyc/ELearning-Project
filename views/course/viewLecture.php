<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $courseName, 'url' => ['course/view?id=' . $model->course_id]];
$this->params['breadcrumbs'][] = ['label' => $this->title . ' (' . $modelQuiz->name . ')'];
\yii\web\YiiAsset::register($this);
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-warning']) ?>
        <!-- <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            // 'institution.name',
            // 'subject.name',
            // 'level.name',
            // 'instructor_id',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
    <br>
    <h3>Quiz</h3>
    <!-- <?= Html::a('Add Quiz Title', ['create-quiz', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
    <br>
    <?= DetailView::widget([
        'model' => $modelQuiz,
        'attributes' => [
            // 'id',
            'name',
            // 'description:ntext',
            // 'institution.name',
            // 'subject.name',
            // 'level.name',
            // 'instructor_id',
            // 'created_at:datetime',
            // 'updated_at:datetime',
        ],
    ]) ?>
    <?= Html::a('Add Question', ['create-question', 'id' => $model->id, 'quizId' => $modelQuiz->id], ['class' => 'btn btn-primary']) ?>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',    
            'title',
            'answer',
            // 'created_at:datetime',
            // 'updated_at:datetime',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete-question}',
                'buttons' => [
                    'delete-question' => function($url,$model) {
                    return Html::a('<span class="btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>', 
                        ['delete-question', 'key' => $model['key']], 
                        [
                            'title' => 'Delete', 
                            'class' => 'btn-danger', 
                            'data' => [
                                'confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 
                                'method' => 'post', 
                            ],
                        ]);
                    },
                    // 'create-quiz' => function($url,$lecture) {
                    // return Html::a('<span class="btn btn-sm btn-primary"><b class="fa fa-plus"></b></span>', 
                    //     ['create-quiz', 'id' => $lecture['id']]);
                    // },
                    'edit-question' => function($url,$lecture) {
                    return Html::a('<span class="btn btn-sm btn-warning"><b class="fa fa-pencil"></b></span>', 
                        ['create-question', 'id' => $lecture['id']]);
                    }

                ],
            ],
        ],
    ]); ?>

</div>
