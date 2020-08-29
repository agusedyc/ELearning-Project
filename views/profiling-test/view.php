<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use app\models\Profiling;
use app\models\ProfilingCategory;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Profiling User');
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<div class="course-index text-center">
    <h2>Profiling : <?= $user->email;?></h2>
    

<?php if ($is_tested) {?>
<div class="row">
    <div class="col-sm-12 text-center">
        <?php foreach ($summary as $key => $sum) {
            echo '<canvas id="chart'.$key.'" style="position: relative; height:100vh; width:200vw"';
            $cat = [] ;
            $ans = [];
            foreach ($sum as $category => $answer) {
                $cat[] = ProfilingCategory::findOne($category)->name;
                $ans[] = $answer;
            }
            $data = Profiling::findOne($key);
        ?>
    </div>
</div>
<script>
var ctx = document.getElementById("<?='chart'.$key?>").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($cat)?>,
        datasets: [{
            label: '# <?=$data->method;?> Score',
            data: <?= json_encode($ans)?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<?php }}?>

</div>