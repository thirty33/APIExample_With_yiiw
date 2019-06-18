<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assistant".
 *
 * @property int $id
 * @property string $firts_name
 * @property string $last_name
 * @property string $user_password
 * @property int $event_id
 *
 * @property Event $event
 */
class Assistant extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assistant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firts_name', 'last_name', 'user_password', 'event_id'], 'required'],
            [['event_id'], 'integer'],
            [['firts_name', 'last_name', 'user_password'], 'string', 'max' => 50],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'event_id']],
        ];
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['firts_name','last_name','user_password','event_id'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firts_name' => 'Firts Name',
            'last_name' => 'Last Name',
            'user_password' => 'User Password',
            'event_id' => 'Event ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['event_id' => 'event_id']);
    }
}
