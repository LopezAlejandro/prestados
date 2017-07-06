<?php

namespace app\models;

use Yii;
use \app\models\base\Deposito as BaseDeposito;

/**
 * This is the model class for table "deposito".
 */
class Deposito extends BaseDeposito
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['deposito_id', 'descripcion'], 'required'],
            [['deposito_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'deposito_id' => Yii::t('app', 'Deposito ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
