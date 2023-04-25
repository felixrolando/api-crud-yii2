<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeTypecastBehavior;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string|null $zip_code
 * @property int|null $is_default
 * @property int|null $client_id
 * @property string|null $created_at
 *
 * @property Client $client
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'city', 'street'], 'required'],
            [['client_id'], 'integer'],
            [['is_default'], 'boolean'],
            [['created_at'], 'safe'],
            [['country', 'city', 'street', 'zip_code'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'zip_code' => 'Zip Code',
            'is_default' => 'Is Default',
            'client_id' => 'Client ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    public function behaviors()
    {
        return [
            'typecast' => [
                'class' => AttributeTypecastBehavior::class,
                'typecastAfterFind' => true,
            ],
        ];
    }
}
