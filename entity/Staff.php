<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $fio
 * @property string $post
 *
 * @property Distributions[] $distributions
 * @property Refunds[] $refunds
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'post'], 'required'],
            [['fio', 'post'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'post' => 'Должность',
        ];
    }

    /**
     * Gets query for [[Distributions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistributions()
    {
        return $this->hasMany(Distributions::class, ['staff_id' => 'id']);
    }

    /**
     * Gets query for [[Refunds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefunds()
    {
        return $this->hasMany(Refunds::class, ['staff_id' => 'id']);
    }
}
