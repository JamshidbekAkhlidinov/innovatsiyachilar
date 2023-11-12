<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "time_history".
 *
 * @property int $id
 * @property int|null $technical_id
 * @property int|null $status
 * @property string|null $created_at
 *
 * @property TechnicalList $technical
 */
class TimeHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'time_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['technical_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['technical_id'], 'exist', 'skipOnError' => true, 'targetClass' => TechnicalList::class, 'targetAttribute' => ['technical_id' => 'id']],
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
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Technical]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TechnicalListQuery
     */
    public function getTechnical()
    {
        return $this->hasOne(TechnicalList::class, ['id' => 'technical_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TimeHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TimeHistoryQuery(get_called_class());
    }
}
