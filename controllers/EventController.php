<?php

namespace app\controllers;
use Yii;
use app\models\Event;


class EventController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateEvent() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $event = new Event();
        $event->scenario = Event:: SCENARIO_CREATE;
        $event->attributes = \yii::$app->request->post();

        if($event->validate()) {

            $event->save();
            return array('status' => true, 'data' => 'event record is successfully updated');
        }
        else {
            return array('status' => false, 'data' => $event->getErrors());
        }
    }
}
