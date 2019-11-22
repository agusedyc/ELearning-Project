<?php
namespace app\controllers\user;

use Yii;
use dektrium\user\controllers\RegistrationController as BaseRegistrationController;
use dektrium\user\models\RegistrationForm;
use dektrium\user\models\User;
use hscstudio\mimin\models\AuthAssignment;
use hscstudio\mimin\models\AuthItem;
use yii\helpers\ArrayHelper;
class RegistrationController extends BaseRegistrationController
{
     /**
     * Displays the registration page.
     * After successful registration if enableConfirmation is enabled shows info message otherwise
     * redirects to home page.
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            
            // Yii::$app->session->setFlash('success', 'Data tersimpan');
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            // $id = Yii::$app->db->getLastInsertID();
            // $model = $this->findModel($id);
            $user_model = User::find()->orderBy(['id'=>SORT_DESC])->one();
            // ->where('confirmed_at <= :confirmed_at',[':confirmed_at' => 0])
            $authAssignment = new AuthAssignment([
                'user_id' => $user_model->id,
            ]);
            // echo '<pre>';
            // print_r(Yii::$app->request->post('register-form')['item_name']);
            // echo '</pre>';
            // Yii::$app->request->post('register-form')['item_name']
            // $authAssignment->load(Yii::$app->request->post());
            // delete all role
            AuthAssignment::deleteAll(['user_id' => $user_model->id]);
            // if (is_array($authAssignment->item_name)) {
            //     foreach ($authAssignment->item_name as $item) {
            //         if (!in_array($item, $authAssignments)) {
                        $authAssignment2 = new AuthAssignment([
                            'user_id' => $user_model->id,
                        ]);
                        $authAssignment2->item_name = Yii::$app->request->post('register-form')['item_name'];
                        // $authAssignment2->item_name = $item;
                        $authAssignment2->created_at = time();
                        $authAssignment2->save();

                        // $authAssignments = AuthAssignment::find()->where([
                        //     'user_id' => $model->id,
                        // ])->column();
                    // }
                // }
            // }

            // return $this->render('/message', [
            //     'title'  => \Yii::t('user', 'Your account has been created'),
            //     'module' => $this->module,
            // ]);
            // Yii::$app->session->setFlash('success', 'Your account has been created Check Email Now');
            return $this->redirect(['/user/login']);
        }

        $list_role = ArrayHelper::map(AuthItem::find()->where(['not in', 'name', 'Sysadmin'])->andWhere(['type'=>1])->asArray()->all(), 'name', 'name');

        // $this->layout = 'main-login';
        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
            'list_role'  => $list_role,
        ]);
    }
}