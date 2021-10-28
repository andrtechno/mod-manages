<?php

namespace panix\mod\manages\controllers;

use panix\engine\data\ActiveDataProvider;
use Yii;
use panix\engine\controllers\WebController;
use panix\mod\manages\models\Manages;
use panix\mod\manages\models\ManagesSearch;
use yii\helpers\ArrayHelper;

class DefaultController extends WebController
{
    public function behaviors1()
    {
        $behaviors[] = [
            'class' => 'yii\filters\PageCache',
            'only' => ['view'],
            'duration' => 86400 * 30,
            'variations' => [
                //Yii::$app->language,
                Yii::$app->request->get('slug')
            ],
            'dependency' => [
                'class' => 'yii\caching\DbDependency',
                'sql' => 'SELECT MAX(updated_at) FROM ' . Manages::tableName(),
            ]
        ];
        return ArrayHelper::merge(parent::behaviors(), $behaviors);
    }

    public function actionIndex()
    {
        $this->pageName = Yii::t($this->module->id . '/default', 'MODULE_NAME');
        $this->view->params['breadcrumbs'][] = $this->pageName;

        $query = Manages::find()->published();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->settings->get('manages', 'pagenum')
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $this->dataModel = Manages::find()
            ->where(['id' => $id])
            ->published()
            // ->cache(3200, new \yii\caching\DbDependency(['sql' => 'SELECT MAX(updated_at) FROM ' . News::tableName()]))
            ->one();


        if (!$this->dataModel) {
            $this->error404();
        }
        $this->dataModel->updateCounters(['views' => 1]);
        $this->view->setModel($this->dataModel);
        $this->pageName = $this->dataModel->fullName;
        $this->view->params['breadcrumbs'] = [
            [
                'label' => Yii::t($this->module->id . '/default', 'MODULE_NAME'),
                'url' => ['index']
            ],
            $this->pageName
        ];

        $this->view->title = $this->pageName;
        return $this->render('view', ['model' => $this->dataModel]);
    }

}
