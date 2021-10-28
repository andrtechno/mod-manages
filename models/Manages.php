<?php

namespace panix\mod\manages\models;


use Yii;
use panix\engine\db\ActiveRecord;
use panix\mod\manages\models\query\ManagesQuery;
use panix\mod\manages\models\search\ManagesSearch;
use panix\mod\user\models\User;

/**
 * This is the model class for table "manages".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $text
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property integer $views
 * @property string $position
 * @property string $image
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $category_id
 * @property string $fullName
 * @property User $user
 */
class Manages extends ActiveRecord
{

    const route = '/admin/manages/default';
    const MODULE_ID = 'manages';
    public $translationClass = ManagesTranslate::class;

    public static function find()
    {
        return new ManagesQuery(get_called_class());
    }

    public function getGridColumns()
    {
        return [
            'id' => [
                'attribute' => 'id',
                'contentOptions' => ['class' => 'text-center'],
            ],
            'first_name' => [
                'attribute' => 'first_name',
                'contentOptions' => ['class' => 'text-left'],
            ],
            'last_name' => [
                'attribute' => 'last_name',
                'contentOptions' => ['class' => 'text-left'],
            ],
            'views' => [
                'attribute' => 'views',
                'contentOptions' => ['class' => 'text-center'],
            ],
            'created_at' => [
                'attribute' => 'created_at',
                'format' => 'raw',
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => new ManagesSearch(),
                    'attribute' => 'created_at',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->created_at, 'php:d D Y H:i:s');
                }
            ],
            'updated_at' => [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => new ManagesSearch(),
                    'attribute' => 'updated_at',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->updated_at, 'php:d D Y H:i:s');
                }
            ],
            'DEFAULT_CONTROL' => [
                'class' => 'panix\engine\grid\columns\ActionColumn',
            ],
            'DEFAULT_COLUMNS' => [
                ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
                [
                    'class' => \panix\engine\grid\sortable\Column::class,
                    'url' => ['/admin/manages/default/sortable']
                ],
            ],
        ];
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%manages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        $rules = [];

        $rules[] = [['first_name', 'last_name', 'position'], 'required'];
        $rules[] = [['first_name', 'last_name'], 'string', 'max' => 50];
        $rules[] = [['text', 'email', 'social_1', 'social_2'], 'string'];
        $rules[] = [['first_name', 'last_name'], 'trim'];
        $rules[] = ['phone', 'panix\ext\telinput\PhoneInputValidator'];
        $rules[] = [['updated_at', 'created_at'], 'safe'];
        $rules[] = [['text', 'image', 'email'], 'default'];
        $rules[] = [['social_1', 'social_2'], 'default'];
        $rules[] = [['social_1', 'social_2'], 'url'];


        $rules[] = ['social_1', 'match', 'pattern' => '/(?:(?:https?):\/\/)?(?:www.)?facebook.com\/([\w\-]*)?/i'];
        $rules[] = ['social_2', 'match', 'pattern' => '/(?:(?:https?):\/\/)?(?:www.)?linkedin.com\/([\w\-]*)?/i'];


        return $rules;
    }

    public function getUrl()
    {

        return ['/manages/default/view', 'id' => $this->getPrimaryKey()];


    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Yii::$app->user->identityClass, ['id' => 'user_id']);
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $b = [];
        if (Yii::$app->getModule('seo'))
            $b['seo'] = [
                'class' => '\panix\mod\seo\components\SeoBehavior',
                'url' => $this->getUrl()
            ];

        if (Yii::$app->getModule('sitemap')) {
            $b['sitemap'] = [
                'class' => '\panix\mod\sitemap\behaviors\SitemapBehavior',
                //'batchSize' => 100,
                'groupName' => 'Новости',
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    //$model->select(['slug', 'updated_at','name']);
                    $model->where(['switch' => 1]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => $model->getUrl(),
                        'lastmod' => $model->updated_at,
                        'name' => $model->name,
                        'changefreq' => \panix\mod\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.1
                    ];
                }
            ];
        }

        $b['uploadFile'] = [
            'class' => 'panix\engine\behaviors\UploadFileBehavior',
            'files' => [
                'image' => '@uploads/manages',
            ],
            'options' => [
                'watermark' => false
            ]
        ];

        return \yii\helpers\ArrayHelper::merge($b, parent::behaviors());
    }

}
