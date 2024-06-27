<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "refunds".
 *
 * @property int $id
 * @property string|null $date
 * @property int $book_id
 * @property int $staff_id
 * @property int|null $condition_id
 *
 * @property Books $book
 * @property Conditions $condition
 * @property Staff $staff
 */
class Refunds extends \yii\db\ActiveRecord
{

    public $client_id; 
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refunds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['book_id', 'staff_id'], 'required'],
            [['book_id', 'staff_id', 'condition_id'], 'default', 'value' => null],
            [['book_id', 'staff_id', 'condition_id'], 'integer'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['book_id' => 'id']],
            [['condition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conditions::class, 'targetAttribute' => ['condition_id' => 'id']],
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
            'date' => 'Date',
            'book_id' => 'Book ID',
            'staff_id' => 'Staff ID',
            'condition_id' => 'Condition ID',
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
     * Gets query for [[Condition]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondition()
    {
        return $this->hasOne(Conditions::class, ['id' => 'condition_id']);
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
