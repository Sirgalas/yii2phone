<?php

namespace app\modules\phone\models;

use app\modules\country\models\Country;
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
    
    public function getCountrys(){
        return $this->hasOne(Country::className(),['id'=>'country']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nameLastName', 'country', 'tel'], 'required'],
            [['country'], 'integer'],
            [['nameLastName', 'tel'], 'string', 'max' => 610],
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
