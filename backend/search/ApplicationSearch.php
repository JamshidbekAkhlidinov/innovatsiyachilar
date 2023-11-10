<?php

namespace backend\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Application;

/**
 * ApplicationSearch represents the model behind the search form of `common\models\Application`.
 */
class ApplicationSearch extends Application
{
    /**
     * {@inheritdoc}
     */
    public $fullName;

    public function rules()
    {
        return [
            [['id', 'specialist_id', 'status', 'user_id', 'updated_by'], 'integer'],
            [['firs_name', 'last_name', 'patronymic', 'passport_number', 'application_file', 'passport_file', 'diploma_copy_file', 'diploma_app_file', 'photo_file', 'certificate_file', 'created_at', 'updated_at'], 'safe'],
            [['exam_result'], 'number'],
            ['fullName', 'safe'],
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
        $query = Application::find();

        // add conditions that should always apply here
        if ($this->fullName) {

            $or_where_conditions = [];

            foreach (explode(' ', $this->fullName) as $name) {
                $or_where_conditions[] = ['like', 'firs_name', $name];
                $or_where_conditions[] = ['like', 'last_name', $name];
                $or_where_conditions[] = ['like', 'patronymic', $name];
            }

            $query->orWhere(['or', ...$or_where_conditions]);
        }

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
            'specialist_id' => $this->specialist_id,
            'status' => $this->status,
            'exam_result' => $this->exam_result,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'firs_name', $this->firs_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'passport_number', $this->passport_number])
            ->andFilterWhere(['like', 'application_file', $this->application_file])
            ->andFilterWhere(['like', 'passport_file', $this->passport_file])
            ->andFilterWhere(['like', 'diploma_copy_file', $this->diploma_copy_file])
            ->andFilterWhere(['like', 'diploma_app_file', $this->diploma_app_file])
            ->andFilterWhere(['like', 'photo_file', $this->photo_file])
            ->andFilterWhere(['like', 'certificate_file', $this->certificate_file]);

        return $dataProvider;
    }
}
