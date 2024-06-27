<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "conditions".
 *
 * @property int $id
 * @property string $condition
 *
 * @property Refunds[] $refunds
 */
class Conditions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conditions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condition'], 'required'],
            [['condition'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'condition' => 'Condition',
        ];
    }

    /**
     * Gets query for [[Refunds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefunds()
    {
        return $this->hasMany(Refunds::class, ['condition_id' => 'id']);
    }
}
