<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\entity\Books;

/**
 * BooksSearch represents the model behind the search form of `app\entity\Books`.
 */
class BooksSearch extends Books
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'author_id', 'art'], 'integer'],
            [['title', 'description', 'deliv_date', 'img'], 'safe'],
            [['avail'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Books::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'author_id' => $this->author_id,
            'deliv_date' => $this->deliv_date,
            'avail' => $this->avail,
            'art' => $this->art,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'img', $this->img]);

        return $dataProvider;
    }
}
