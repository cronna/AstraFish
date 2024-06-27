<?php

namespace app\controllers;

use app\entity\Distributions;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\repository\BooksRepository;
use app\repository\StaffRepository;
use app\repository\ClientsRepository;
use app\repository\DistRepository;
use yii\filters\AccessControl;

/**
 * DistributionsController implements the CRUD actions for Distributions model.
 */
class DistributionsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Distributions models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $distributions = DistRepository::getAll();

        return $this->render('index', [
            'distributions' => $distributions,
        ]);
    }


    /**
     * Creates a new Distributions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $books = BooksRepository::getAll();
        $staff = StaffRepository::getAll();
        $clients = ClientsRepository::getAll();

        $model = new Distributions();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                ClientsRepository::EditColumnBookToTrue($model->client_id);
                $model->save();
                return $this->redirect(['index']);
            }

            
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'books' => $books,
            'staff' => $staff,
            'clients' => $clients
        ]);
    }

    /**
     * Deletes an existing Distributions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Distributions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Distributions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Distributions::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
