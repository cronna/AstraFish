<?php

namespace app\entity;

use Yii;
use app\repository\ClientsRepository;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $fio
 * @property int $passport_series
 * @property int $passport_number
 * @property bool|null $book
 *
 * @property Distributions[] $distributions
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'passport_series', 'passport_number'], 'required'],
            [['passport_series', 'passport_number'], 'default', 'value' => null],
            [['passport_series', 'passport_number'], 'integer'],
            [['book'], 'boolean'],
            [['fio'], 'string', 'max' => 255],
            ['passport_number', 'validatePassport']
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
            'passport_series' => 'Серия паспорта',
            'passport_number' => 'Номер паспорта',
            'book' => 'Есть товар',
        ];
    }

    /**
     * Gets query for [[Distributions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistributions()
    {
        return $this->hasMany(Distributions::class, ['client_id' => 'id']);
    }

    public function validatePassport($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = ClientsRepository::getClientByPassportNumber($this->passport_number);
            if ($user) {
                $this->addError($attribute, 'Клиент с таким номером пасспорта уже существует!');
            }
        }
    }
}
