<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "technical_list".
 *
 * @property int $id
 * @property int|null $category_id
 * @property float|null $power
 * @property int|null $count
 * @property int|null $time
 * @property string|null $created_at
 * @property int|null $updated_at
 *
 * @property Category $category
 */
class TechnicalList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'technical_list';
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'count', 'time',], 'integer'],
            [['power'], 'number'],
            [['updated_at', 'created_at'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'power' => Yii::t('app', 'Power'),
            'count' => Yii::t('app', 'Count'),
            'time' => Yii::t('app', 'Time'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TechnicalListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TechnicalListQuery(get_called_class());
    }
}
