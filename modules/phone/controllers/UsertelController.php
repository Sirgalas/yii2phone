<?php

namespace app\modules\phone\controllers;

use app\modules\country\models\Country;
use Yii;
use app\modules\phone\models\UserTel;
use app\modules\phone\models\UserTelSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsertelController implements the CRUD actions for UserTel model.
 */
class UsertelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserTel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserTelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $country = ArrayHelper::map(Country::find()->asArray()->all(),'id','name');
        if(!empty($country)){
            $country=false;
        }
        if (Yii::$app->request->post('hasEditable')) {
            $bookId = Yii::$app->request->post('editableKey');
            $model = UserTel::findOne($bookId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['UserTel']);
            $post = ['UserTel' => $posted];
            if ($model->load($post)) {
                $model->save();
                $output = '';
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            echo $out;
            return ;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'country'=>$country
        ]);
    }


    /**
     * Creates a new UserTel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserTel();
        $country = ArrayHelper::map(Country::find()->asArray()->all(),'id','name');
        if(!empty($country)){
            $country=false;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'country'=>$country
            ]);
        }
    }

    /**
     * Updates an existing UserTel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $country = ArrayHelper::map(Country::find()->asArray()->all(),'id','name');
        $dataCountry= ArrayHelper::map(Country::find()->where(['id'=>$id])->asArray()->all(),'id','name');
        if(empty($country)){
            $country=false;
            $dataCountry=false;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'country'=>$country,
                'dataCountry'=>$dataCountry
            ]);
        }
    }

    /**
     * Deletes an existing UserTel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserTel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserTel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserTel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
