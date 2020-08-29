<?php

namespace app\controllers;

use Yii;
use app\models\Level;
use yii\web\Response;
use app\models\Course;
use app\models\Subject;
use yii\web\Controller;
use app\models\Institution;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use app\models\CourseSearch;
use app\models\QuizCategory;
use app\models\QuizQuestion;
use yii\helpers\ArrayHelper;
use app\models\CourseLecture;
use app\models\EnroledCourse;
use dektrium\user\models\User;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\InstitutionInstructor;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'create-question' => ['POST', 'GET'],
                    'create-quiz' => ['POST', 'GET']
                ],
            ],
        ];
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $dataProvider = new ActiveDataProvider([ 
           'query' => CourseLecture::find()->where(['course_id'=>$id]), 
        ]); 
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionJoin($id)
    {
        
        $model = new EnroledCourse();

        // if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) { 
           $model->user_id = Yii::$app->user->id; 
           $model->course_id = $id; 
           // echo '<pre>'; 
           // print_r(Yii::$app->request->post()); 
           // echo '</pre>'; 
           return ($model->save()) ?  $this->redirect(['view-member', 'id' => $id]) : null; 
        // } 
        // return $this->render('_formQuiz', [ 
           // 'model' => $this->findModel($id), 
           // 'model' => $model, 
           // 'list_user' => $list_user, 
        // ]);
    }


    public function actionViewMember($id)
    {
        $enroled = EnroledCourse::find()->where(['course_id'=>$id])->andWhere(['user_id'=>Yii::$app->user->id])->one();
        
        // echo '<pre>';
        // print_r(empty($enroled));
        // echo '</pre>';

        $dataProvider = new ActiveDataProvider([ 
           'query' => CourseLecture::find()->where(['course_id'=>$id]), 
        ]);

        if (empty($enroled)) {
            return $this->render('viewMember', [
                'model' => $this->findModel($id),
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->render('viewCourse', [
                'model' => $this->findModel($id),
                'dataProvider' => $dataProvider,
            ]);
        }
        
    }
    
    public function actionViewMaterial($id)
    {
        $courseLecture = CourseLecture::find()->where(['id' => $id])->one();
        if($courseLecture == null){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        $dataProvider = new ActiveDataProvider([ 
            'query' => QuizCategory::find()->where(['lecture_id'=>$id]), 
         ]);    

        return $this->render('viewMaterial', [
            'model' => $courseLecture,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // ->where(['id'=>InstitutionInstructor::find()->where(['user_id'=>Yii::$app->user->id])->institution_id])
        // echo '<pre>';
        // print_r($test);
        // echo '</pre>';
        $active_user_institution = InstitutionInstructor::find()->where(['user_id'=>Yii::$app->user->id])->one();
        if (!empty($active_user_institution)) {
            $list_institution = ArrayHelper::map(Institution::find()->where(['id'=>$active_user_institution->institution_id])->asArray()->all(), 'id', 'name');    
        }else{
            $list_institution = ArrayHelper::map(Institution::find()->asArray()->all(), 'id', 'name');    
        }
        $list_instructor = ArrayHelper::map(InstitutionInstructor::find()->asArray()->all(), 'id', 'user.username');
        $list_level = ArrayHelper::map(Level::find()->asArray()->all(), 'id', 'name');
        $list_subject = ArrayHelper::map(Subject::find()->asArray()->all(), 'id', 'name');
        $list_user = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username');
        $model = new Course();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'list_institution' => $list_institution,
            'list_instructor' => $list_instructor,
            'list_level' => $list_level,
            'list_user' => $list_user,
            'list_subject' => $list_subject,
        ]);
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $active_user_institution = InstitutionInstructor::find()->where(['user_id'=>Yii::$app->user->id])->one();
        if (!empty($active_user_institution)) {
            $list_institution = ArrayHelper::map(Institution::find()->where(['id'=>$active_user_institution->institution_id])->asArray()->all(), 'id', 'name');    
        }else{
            $list_institution = ArrayHelper::map(Institution::find()->asArray()->all(), 'id', 'name');    
        }
        $list_instructor = ArrayHelper::map(InstitutionInstructor::find()->asArray()->all(), 'id', 'user.username');
        $list_subject = ArrayHelper::map(Subject::find()->asArray()->all(), 'id', 'name');
        $list_level = ArrayHelper::map(Level::find()->asArray()->all(), 'id', 'name');
        $list_user = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'list_institution' => $list_institution,
            'list_instructor' => $list_instructor,
            'list_level' => $list_level,
            'list_user' => $list_user,
            'list_subject' => $list_subject,
        ]);
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteLecture($id)
    {
        // $this->findModel($id)->delete();
        $lecture = CourseLecture::findOne($id)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionCreateLecture($id)
    {
        // $list_user = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'); 
        $model = new CourseLecture();

        if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) { 
           $model->course_id = $id; 
           // echo '<pre>'; 
           // print_r(Yii::$app->request->post()); 
           // echo '</pre>'; 
           return ($model->save()) ? $this->redirect(['view', 'id' => $id]) : null; 
           // return $this->redirect(['view', 'id' => $model->id]); 
        } 
        return $this->render('_formLecture', [ 
           // 'model' => $this->findModel($id), 
           'model' => $model, 
           // 'list_user' => $list_user, 
        ]);
    }

    // public function actionUpdateLecture($id)
    // {
    //     // $list_user = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'); 
    //     $model = CourseLecture::findOne($id);

    //     if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) { 
    //        $model->course_id = $id; 
    //        // echo '<pre>'; 
    //        // print_r(Yii::$app->request->post()); 
    //        // echo '</pre>'; 
    //        return ($model->save()) ? $this->redirect(['index']) : null; 
    //        // return $this->redirect(['view', 'id' => $model->id]); 
    //     } 
    //     return $this->render('_formLecture', [ 
    //        // 'model' => $this->findModel($id), 
    //        'model' => $model, 
    //        // 'list_user' => $list_user, 
    //     ]);
    // }

    public function actionViewLecture($id, $quizId = null)
    {
        // $list_user = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'); 
        $courseLecture =  CourseLecture::findOne($id);
        $conditions = ['lecture_id'=> $id];
        if($quizId != null){
            $conditions['id'] = $quizId;
        }
        $quizCategory = QuizCategory::find()->where($conditions)->one();
        if($courseLecture == null || $quizCategory == null){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        $courseName = $courseLecture->course->title ?? '-';
        $dataProvider = new ActiveDataProvider([ 
           'query' => QuizQuestion::find()->where(['category_id'=> $quizCategory->id]), 
        ]); 
        return $this->render('viewLecture', [
            'courseName' => $courseName,
            'model' => $courseLecture,
            'modelQuiz' => $quizCategory,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionCreateQuiz($id)
    {

        $model = new QuizCategory();
        $courseLecture = (new \yii\db\Query())
        ->innerJoin('course', 'course.id = course_lecture.course_id')
        ->from('course_lecture')
        ->where(['course_lecture.id' => $id])
        ->select(['course_lecture.id', 'course_lecture.title', 'course_lecture.course_id', 'course.title as course_title'])
        ->one();
        if($courseLecture == null){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->lecture_id = $id; 
            return ($model->save()) ?  $this->redirect(['view-lecture', 'id' => $id, 'quizId' => $model->id]) : null; 
            } 
        }
        return $this->render('_formQuiz', [ 
           'lecture' => $courseLecture,
           'model' => $model, 
        ]);
    }

    public function actionCreateQuestion($id, $quizId)
    {
        $model = new QuizQuestion();
        $quizCategory =(new \yii\db\Query())->where(['quiz_category.lecture_id'=>$id, 'quiz_category.id' => $quizId])
        ->innerJoin('course_lecture', 'course_lecture.id = quiz_category.lecture_id')
        ->innerJoin('course', 'course.id = course_lecture.course_id')
        ->from('quiz_category')
        ->select(['quiz_category.*', 'course_lecture.course_id' , 'course.title as course_title', 'course_lecture.title'])->one();
        if($quizCategory == null){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                   $model->id = $id;
                   $model->category_id = $quizCategory['id']; 
                   return ($model->save()) ? $this->redirect(['view-lecture', 'id' => $id, 'quizId' => $quizId]) : null; 
            }
        }
        return $this->render('_formQuestion', [ 
           'model' => $model, 
           'modelQuiz' => $quizCategory
        ]);
    }

    public function actionDeleteQuestion($key)
    {
        // $this->findModel($id)->delete();
        $model = QuizQuestion::findOne($key)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
