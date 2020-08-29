<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Profiling User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">
<?php $form = ActiveForm::begin(); ?>

    <?php
        foreach ($allQuestion as $question) {
            echo "<pre>".$question->question.'</pre>';
            if ($question->type == 'scale') {
            echo '
                <label for="answer1'.$question->id.'" class="radio-inline">
                    <input type="radio" 
                    id="answer1'.$question->id.'" name="answer_'.$question->id.'" value="0">Tidak Sesuai
                </label>
                <label for="answer2'.$question->id.'" class="radio-inline">
                    <input type="radio" 
                    id="answer2'.$question->id.'" name="answer_'.$question->id.'" value="1">Sesuai
                </label>
                <label for="answer3'.$question->id.'" class="radio-inline">
                    <input type="radio" 
                    id="answer3'.$question->id.'" name="answer_'.$question->id.'" value="2">Sangat Sesuai
                </label>';
            } else {
                echo '
                <label for="answer1'.$question->id.'" class="radio-inline">
                    <input type="radio" 
                    id="answer1'.$question->id.'" name="answer_'.$question->id.'" value="0">No
                </label>
                <label for="answer2'.$question->id.'" class="radio-inline">
                    <input type="radio" 
                    id="answer2'.$question->id.'" name="answer_'.$question->id.'" value="1">Yes
                </label>';
            }

        }
        // print_r($allQuestion);
    ?>

<div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>