<?php

namespace panix\mod\manages\models\search;

use Yii;
use yii\base\Model;
use panix\engine\data\ActiveDataProvider;
use panix\mod\manages\models\Manages;
use panix\mod\manages\models\ManagesTranslate;

/**
 * ManagesSearch represents the model behind the search form about `panix\mod\manages\models\News`.
 */
class ManagesSearch extends Manages
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'views'], 'integer'],
            [['name', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Manages::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => self::getSort(),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'translate.first_name', $this->first_name]);
        $query->andFilterWhere(['like', 'DATE(created_at)', $this->created_at]);
        $query->andFilterWhere(['like', 'views', $this->views]);

        return $dataProvider;
    }

    public static function getSort()
    {
        $sort = new \yii\data\Sort([
            'attributes' => [
                'created_at',
                'updated_at',
                'views',
                'first_name' => [
                    'asc' => ['first_name' => SORT_ASC],
                    'desc' => ['first_name' => SORT_DESC],
                ],
            ],
        ]);
        return $sort;
    }
}
