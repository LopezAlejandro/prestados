<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "tipo_libro".
 *
 * @property integer $tipo_libro_id
 * @property string $descripcion
 *
 * @property \app\models\Libros[] $libros
 */
class TipoLibro extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_libro_id', 'descripcion'], 'required'],
            [['tipo_libro_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_libro';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_libro_id' => Yii::t('app', 'Tipo Libro ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(\app\models\Libros::className(), ['tipo_libro_id' => 'tipo_libro_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\TipoLibroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TipoLibroQuery(get_called_class());
    }
}
