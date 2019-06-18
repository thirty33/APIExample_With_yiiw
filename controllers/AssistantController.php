<?php

namespace app\controllers;
use app\models\Assistant;

class AssistantController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateAssistant() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $assistant = new Assistant();
        $assistant->scenario = Assistant:: SCENARIO_CREATE;
        $assistant->attributes = \yii::$app->request->post();

        if($assistant->validate()) {
            
            $assistant->save();
            return array('status' => true, 'data' => 'assistant is successfully created');
        }
        else {
            return array('status' => false, 'data' => $assistant->getErrors());
        }
    }

    public function actionGetAssistants() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $assistants = Assistant::find()->all();
        if(count($assistants) > 0) {
            return array('status' => true, 'data' => $assistants);
        }
        else {
            return array('status' => false, 'data' => 'no assistants found');
        }
    }

    public function actionGetAssistantsByEventId() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $attributes = \yii::$app->request->post();
        $assistants = Assistant::find()->where(['event_id' => $attributes['id']])
            ->all();
        if(count($assistants) > 0) {
            return array('status' => true, 'data' => $assistants);
        }
        return array('status' => false, 'data' => 'assistants not found');
    }
}
