<?php

namespace app\modules\phone\models;

use Yii;

/**
 * This is the model class for table "userTel".
 *
 * @property integer $id
 * @property string $nameLastName
 * @property integer $country
 * @property integer $tel
 */
class UserTel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userTel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nameLastName', 'country', 'tel'], 'required'],
            [['country', 'tel'], 'integer'],
            [['nameLastName'], 'string', 'max' => 610],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nameLastName' => 'Name Last Name',
            'country' => 'Country',
            'tel' => 'Tel',
        ];
    }
}
