<?php

namespace panix\mod\manages\models;

use panix\engine\SettingsModel;

/**
 * Class SettingsForm
 * @package panix\mod\manages\models
 */
class SettingsForm extends SettingsModel
{

    protected $module = 'manages';
    public static $category = 'manages';

    public $pagenum;

    public function rules()
    {
        return [
            ['pagenum', 'required'],
        ];
    }

    public static function defaultSettings()
    {
        return [
            'pagenum' => 10,
        ];
    }
}
