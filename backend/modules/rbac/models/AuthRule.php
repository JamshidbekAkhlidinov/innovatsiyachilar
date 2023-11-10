<?php

namespace backend\modules\rbac\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "auth_rule".
 *
 * @property string $name
 * @property resource|null $data
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property AuthItem[] $authItems
 */
class AuthRule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_rule';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[AuthItems]].
     *
     * @return \yii\db\ActiveQuery|\backend\modules\rbac\query\AuthItemQuery
     */
    public function getAuthItems()
    {
        return $this->hasMany(AuthItem::class, ['rule_name' => 'name']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\rbac\query\AuthRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\rbac\query\AuthRuleQuery(get_called_class());
    }
}
