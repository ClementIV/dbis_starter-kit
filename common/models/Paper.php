<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paper".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $journalName
 * @property integer $publishTime
 * @property integer $projectId
 *
 * @property Project $project
 */
class Paper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publishTime', 'projectId'], 'integer'],
            [['title', 'author', 'journalName'], 'string', 'max' => 512],
            [['projectId'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['projectId' => 'id']],
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
            'author' => 'Author',
            'journalName' => 'Journal Name',
            'publishTime' => 'Publish Time',
            'projectId' => 'Project ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'projectId']);
    }
}
