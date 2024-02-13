<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Applications".
 *
 * @property int $id_application
 * @property int|null $user_id
 * @property string $carNumber
 * @property string $description
 * @property string|null $Status
 *
 * @property Users $user
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Applications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['carNumber', 'description'], 'required'],
            [['description', 'Status'], 'string'],
            [['carNumber'], 'string', 'max' => 15],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_application' => 'Id Application',
            'user_id' => 'User ID',
            'carNumber' => 'Car Number',
            'description' => 'Description',
            'Status' => 'Status',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id_user' => 'user_id']);
    }
}
