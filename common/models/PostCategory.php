<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_category".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PostCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PostCategoryQuery(get_called_class());
    }
}
