<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "technical_history".
 *
 * @property int $id
 * @property int|null $technical_id
 * @property string|null $date
 * @property int|null $calculate_time
 */
class TechnicalHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'technical_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['technical_id', 'calculate_time'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'technical_id' => Yii::t('app', 'Technical ID'),
            'date' => Yii::t('app', 'Date'),
            'calculate_time' => Yii::t('app', 'Calculate Time'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TechnicalHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TechnicalHistoryQuery(get_called_class());
    }
}
