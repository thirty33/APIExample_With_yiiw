<?php

namespace app\controllers;
use app\models\Event;


class EventController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // return $this->render('index');
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $events = Event::find()->all();
        if(count($events) > 0) {
            return array('status' => true, 'data' => $events);
        }
        else {
            return array('status' => false, 'data' => 'no events found');
        }
    }

    public function actionCreateEvent() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $event = new Event();
        $event->scenario = Event:: SCENARIO_CREATE;
        $event->attributes = \yii::$app->request->post();

        if($event->validate()) {

            $event->save();
            return array('status' => true, 'data' => 'event record is successfully created');
        }
        else {
            return array('status' => false, 'data' => $event->getErrors());
        }
    }

    public function actionGetEvents() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $events = Event::find()->all();
        if(count($events) > 0) {
            return array('status' => true, 'data' => $events);
        }
        else {
            return array('status' => false, 'data' => 'no events found');
        }
    }

    public function actionUpdateEvent() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $attributes = \yii::$app->request->post();
        $event = Event::find()->where(['event_id' => $attributes['id']])
            ->one();
        if(count($event) > 0) {
            $event->attributes = \yii::$app->request->post();
            $event->save();
            return array('status' => true, 'data' => $event);
        }
        return array('status' => false, 'data' => 'event record unsuccesfully');
    }

    public function actionDeleteEvent() {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $attributes = \yii::$app->request->post();
        $event = Event::find()->where(['event_id' => $attributes['id']])
            ->one();
        if(count($event) > 0) {
            $event->delete();
            return array('status' => true, 'data' => 'event deleted');
        }
        return array('status' => false, 'data' => 'event not found');
    }
}
