<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use dektrium\user\models\User;
use app\models\ProfilingQuestion;
use app\models\ProfilingQuestionSearch;
use app\models\ProfilingUser;
use app\models\ProfilingUserSearch;

/**
 * ProfilingController implements the CRUD actions for Profiling models
 */
class ProfilingTestController extends Controller
{
    /**
     * List of all Profiling Questions
     * @return mixed
     */
    public function actionIndex()
    {
        // $user_test = $this->findModel();
        $is_tested = false;
        $test_result = ProfilingUser::find((Yii::$app->user->id))->all();
        if ($test_result !== null) {
            $is_tested = true;

            foreach ($test_result as $result) {
                $category[] = $result->question->category_id; 
                $hitung[$result->question->category_id][] = $result->answer;
                $summary[$result->question->profiling_id]["".$result->question->category_id] = array_sum ($hitung[$result->question->category_id]);
            }
            // print_r($test_result);

            // $summary = array_count_values(array_column($test_result, 0));

        }
        return $this->render('status', [
            'is_tested' => $is_tested, 
            'test_result' => $test_result,
            'summary' => $summary
        ]);
    }

    public function actionTest(Type $var = null)
    {
        if (Yii::$app->request->post()) {

            if ($currentProfiling = ProfilingUser::deleteAll(['user_id' => Yii::$app->user->getId()]));

            foreach (Yii::$app->request->post() as $key => $value) {
                if (strpos($key, 'answer') !== false) {
                    $questionId = explode("_", $key);
                    $user_answer = new ProfilingUser();
                    $user_answer->user_id = Yii::$app->user->getId(); 
                    $user_answer->question_id =  $questionId[1]; 
                    $user_answer->answer =  $value; 
                    $user_answer->save();
                }
            }
            return $this->redirect(['index']);
        }
        $searchModel = new ProfilingUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $allQuestion = ProfilingQuestion::find()->all();
        return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'allQuestion' => $allQuestion
        ]);
    }

    public function actionCreate()
    {
        $model = new ProfilingUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    public function actionView($id)
    {
        $is_tested = false;
        $test_result = ProfilingUser::find($id)->all();
        $user = User::findOne($id);
        if ($test_result !== null) {
            $is_tested = true;

            foreach ($test_result as $result) {
                $category[] = $result->question->category_id; 
                $hitung[$result->question->category_id][] = $result->answer;
                $summary[$result->question->profiling_id]["".$result->question->category_id] = array_sum ($hitung[$result->question->category_id]);
            }

            $data = [
                'is_tested' => $is_tested, 
                'test_result' => $test_result,
                'summary' => $summary,
                'user' => $user
            ];
        } else {
            
            $data = [
                'is_tested' => $is_tested, 
                'test_result' => [],
                'summary' => [],
                'user' => $user
            ];
        }
        
        return $this->render('view', $data );
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = ProfilingUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
}