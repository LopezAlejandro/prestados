<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "estado".
 *
 * @property integer $estado_id
 * @property string $descripcion
 *
 * @property \app\models\Libros[] $libros
 */
class Estado extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_id', 'descripcion'], 'required'],
            [['estado_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estado_id' => Yii::t('app', 'Estado ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(\app\models\Libros::className(), ['estado_id' => 'estado_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\EstadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EstadoQuery(get_called_class());
    }
}
