<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "deposito".
 *
 * @property integer $deposito_id
 * @property string $descripcion
 *
 * @property \app\models\Libros[] $libros
 */
class Deposito extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deposito_id', 'descripcion'], 'required'],
            [['deposito_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deposito';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'deposito_id' => Yii::t('app', 'Deposito ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(\app\models\Libros::className(), ['deposito_id' => 'deposito_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\DepositoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\DepositoQuery(get_called_class());
    }
}
