<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "distributions".
 *
 * @property int $id
 * @property string $date
 * @property int $book_id
 * @property int $staff_id
 * @property int $client_id
 * @property int $term
 *
 * @property Books $book
 * @property Clients $client
 * @property Staff $staff
 */
class Distributions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distributions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'book_id', 'staff_id', 'client_id', 'term'], 'required'],
            [['date'], 'safe'],
            [['book_id', 'staff_id', 'client_id', 'term'], 'default', 'value' => null],
            [['book_id', 'staff_id', 'client_id', 'term'], 'integer'],
            ['term', 'integer', 'min' => 1, 'max' => 90],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['book_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client_id' => 'id']],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::class, 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'book_id' => 'Товар',
            'staff_id' => 'Сотрудник',
            'client_id' => 'Клиент',
            'term' => 'Кол-во дней до возврата',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Books::class, ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::class, ['id' => 'staff_id']);
    }
}
