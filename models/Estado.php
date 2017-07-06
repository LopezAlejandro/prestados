<?php

namespace app\models;

use Yii;
use \app\models\base\Estado as BaseEstado;

/**
 * This is the model class for table "estado".
 */
class Estado extends BaseEstado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['estado_id', 'descripcion'], 'required'],
            [['estado_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'estado_id' => Yii::t('app', 'Estado ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
