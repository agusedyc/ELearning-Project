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
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'about:ntext',
            [
                'label' => 'Institution',
                'value' => $model->institution->name,
            ],
            [
                'label' => 'Subject',
                'value' => $model->subject->name,
            ],
            [
                'label' => 'Level',
                'value' => $model->level->name,
            ],
            // 'instructor_id',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
    <br>
    <h3>Material</h3>
    <?= Html::a('Add Material', ['create-lecture', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <br>
    <?php 
    // $url = str_replace("institution", "institution-instructor", $url);
     ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'title',
            // [
            //     'label' => 'Title',
            //     'attribute' => 'title',
            //     'format' => 'raw',
            //     'value' => function($model){
            //         return Html::a($model->title,['course/view-lecture','id'=>$model->id]);
            //     }
            // ],
            'description',
            // 'quiz.name',
            [
                'label' => 'Quiz Title',
                // 'attribute' => 'qio',
                'format' => 'raw',
                'value' => function($model){
                    $quizMany = $model->quizmany;
                    if(count($quizMany) != 0){
                        $result = array_map(function($quiz)use($model){
                            return Html::a($quiz->name,['course/view-lecture','id'=>$model->id, 'quizId' => $quiz->id]);
                        }, $quizMany);
                        return implode(', ', $result);
                    }
                    else{
                        return '';
                    }
                }
            ],
            // 'created_at:datetime',
            // 'updated_at:datetime',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{create-quiz} {delete-lecture} ',
                'buttons' => [
                    'delete-lecture' => function($url,$lecture) {
                    return Html::a('<span class="btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>', 
                        ['delete-lecture', 'id' => $lecture['id']], 
                        [
                            'title' => 'Delete', 
                            'class' => 'btn-danger', 
                            'data' => [
                                'confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 
                                'method' => 'post', 
                            ],
                        ]);
                    },
                    // 'update-lecture' => function($url,$lecture) {
                    // return Html::a('<span class="btn btn-sm btn-warning"><b class="fa fa-pencil"></b></span>', 
                    //     ['update-lecture', 'id' => $lecture['id']]);
                    // },
                    'view-lecture' => function($url,$lecture) {
                    return Html::a('<span class="btn btn-sm btn-primary"><b class="fa fa-eye"></b></span>', 
                        ['view-lecture', 'id' => $lecture['id']]);
                    },
                    'create-quiz' => function($url,$lecture) {
                    return Html::a('<span class="btn btn-sm btn-primary"><b class="fa fa-plus"></b> Quiz Title</span>', 
                        ['create-quiz', 'id' => $lecture['id']]);
                    }
                ],
            ],
        ],
    ]); ?>

</div>
