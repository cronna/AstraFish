<?php

namespace app\entity;

use Yii;
use app\repository\BooksRepository;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $category_id
 * @property int $author_id
 * @property string|null $deliv_date
 * @property string $img
 * @property bool|null $avail
 * @property int $art
 *
 * @property Authors $author
 * @property Categories $category
 * @property Distributions[] $distributions
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'category_id', 'price', 'author_id', 'art', 'deliv_date'], 'required'],
            [['description'], 'string'],
            [['category_id', 'author_id', 'art'], 'default', 'value' => null],
            [['category_id', 'author_id', 'art'], 'integer'],
            [['deliv_date'], 'safe'],
            [['avail'], 'boolean'],
            ['art', 'integer', 'min' => 1000], 'max' => 1000000000,
            [['title'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::class, 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
            ['art', 'validateArt']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'category_id' => 'Категория',
            'price' => 'Цена',
            'author_id' => 'Поставщик',
            'deliv_date' => 'Дата поставки',
            'img' => 'Изображение',
            'avail' => 'Есть в наличии',
            'art' => 'Артикул',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Distributions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistributions()
    {
        return $this->hasMany(Distributions::class, ['book_id' => 'id']);
    }

    public function validateArt($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $book = BooksRepository::getBookByArt($this->art);
            if ($book) {
                $this->addError($attribute, 'Продукт с таким артикулом уже существует!');
            }
        }
    }
}

