<?php

namespace app\controllers;

use app\entity\Refunds;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\repository\DistRepository;
use app\repository\StaffRepository;
use app\repository\RefundsRepository;
use app\repository\BooksRepository;
use app\repository\ClientsRepository;
use yii\filters\AccessControl;
/**
 * RefundsController implements the CRUD actions for Refunds model.
 */
class RefundsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Refunds models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $refunds = RefundsRepository::getAll();

        return $this->render('index', [
            'refunds' => $refunds,
        ]);
    }

    /**
     * Displays a single Refunds model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Refunds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($dist_id)
    {
        $staff = StaffRepository::getAll();
        $conditions = DistRepository::getAllConditions();
        $book = BooksRepository::getBookById(DistRepository::getDistById($dist_id)->book_id);

        $model = new Refunds();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                DistRepository::deleteDistById($dist_id);
                return $this->redirect('index');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'staff' => $staff,
            'conditions' => $conditions,
            'book' => $book
        ]);
    }

    /**
     * Updates an existing Refunds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $staff = StaffRepository::getAll();
        $conditions = DistRepository::getAllConditions();

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'staff' => $staff,
            'conditions' => $conditions
        ]);
    }

    /**
     * Deletes an existing Refunds model.
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
     * Finds the Refunds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Refunds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Refunds::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
