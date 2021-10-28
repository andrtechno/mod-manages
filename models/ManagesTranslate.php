<?php

namespace panix\mod\manages\models;

use yii\db\ActiveRecord;

/**
 * Class ManageTranslate
 * @package panix\mod\manages\models
 *
 * @property array $translationAttributes
 */
class ManagesTranslate extends ActiveRecord
{

    public static $translationAttributes = ['first_name', 'last_name','text','position'];

    public static function tableName()
    {
        return '{{%manages_translate}}';
    }

}
