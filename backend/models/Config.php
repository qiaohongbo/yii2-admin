<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "yii2_config".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property integer $groupid
 * @property string $value
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii2_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data'], 'string'],
            [['keyid'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyid' => 'KeyId',
            'title' => 'Title',
            'data' => 'Data',
        ];
    }

    public static function getConfigs($keyid) {
        $configs = self::find()->where(['keyid' => $keyid])->asArray()->one();
        return json_decode($configs['data'], true);
    }

}
