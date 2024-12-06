<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Request".
 *
 * @property int $id_request
 * @property int $id_user
 * @property int $id_category
 * @property string $description
 * @property int $id_status
 * @property int $id_department
 *
 * @property FailureCategory $category
 * @property Department $department
 * @property RequestStatus $status
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_category', 'description', 'id_status', 'id_department'], 'required'],
            [['id_user', 'id_category', 'id_status', 'id_department'], 'integer'],
            [['description'], 'string'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => FailureCategory::class, 'targetAttribute' => ['id_category' => 'id_category']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id_user']],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['id_department' => 'id_department']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::class, 'targetAttribute' => ['id_status' => 'id_status']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_request' => 'Id Request',
            'id_user' => 'Id User',
            'id_category' => 'Id Category',
            'description' => 'Description',
            'id_status' => 'Id Status',
            'id_department' => 'Id Department',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(FailureCategory::class, ['id_category' => 'id_category']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::class, ['id_department' => 'id_department']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(RequestStatus::class, ['id_status' => 'id_status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'id_user']);
    }
}
