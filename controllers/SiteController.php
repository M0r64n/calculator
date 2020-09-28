<?php

namespace app\controllers;

use app\Models\CalculatorForm;
use app\Providers\OperationProvider;
use Exception;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new CalculatorForm();
        $result = 0;
        $error = '';

        if($model->load(Yii::$app->request->post())) {
            if($model->validate()) {

                $operation = OperationProvider::getInstance()
                    ->getOperation(
                        $model->operation_key,
                        $model->first_operand,
                        $model->second_operand
                    );

                try {
                    $result = $operation->execute();
                } catch (Exception $e) {
                    $error = $e->getMessage();
                }
            }
        }
        return $this->render('index', [
            'model' => $model,
            'result' => $result,
            'error' => $error,
        ]);
    }
}
