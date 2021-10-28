<?php

/**
 * Generation migrate by PIXELION CMS
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 *
 * Class m170908_136101_manages
 */

use panix\engine\db\Migration;
use panix\mod\manages\models\Manages;
use panix\mod\manages\models\ManagesTranslate;

class m170908_136101_manages extends Migration
{

    public $text = 'Lorem ipsum dolor sit amet, consecte dunt ut labore et dot nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(Manages::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'phone' => $this->phone(),
            'email' => $this->string(50)->null(),
            'social_1' => $this->string(255)->null(),
            'social_2' => $this->string(255)->null(),
            'image' => $this->string()->null()->defaultValue(null),
            'views' => $this->integer()->defaultValue(0),
            'ordern' => $this->integer()->unsigned(),
            'switch' => $this->boolean()->defaultValue(true),
            'created_at' => $this->integer(11)->null(),
            'updated_at' => $this->integer(11)->null()
        ], $tableOptions);


        $this->createTable(ManagesTranslate::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'object_id' => $this->integer()->unsigned(),
            'language_id' => $this->tinyInteger()->unsigned(),
            'first_name' => $this->string(50)->null(),
            'last_name' => $this->string(50)->null(),
            'position' => $this->string(50)->null(),
            'text' => $this->text(),
        ], $tableOptions);


        $this->createIndex('switch', Manages::tableName(), 'switch');
        $this->createIndex('ordern', Manages::tableName(), 'ordern');
        $this->createIndex('user_id', Manages::tableName(), 'user_id');
      //  $this->createIndex('slug', Manages::tableName(), 'slug');


        $this->createIndex('object_id', ManagesTranslate::tableName(), 'object_id');
        $this->createIndex('language_id', ManagesTranslate::tableName(), 'language_id');

        if ($this->db->driverName != "sqlite" || $this->db->driverName != 'pgsql') {
            $this->addForeignKey('{{%fk_manages_translate}}', ManagesTranslate::tableName(), 'object_id', Manages::tableName(), 'id', "CASCADE", "NO ACTION");
        }




    }

    public function down()
    {
        if ($this->db->driverName != "sqlite" || $this->db->driverName != 'pgsql') {
            $this->dropForeignKey('{{%fk_manages_translate}}', ManagesTranslate::tableName());
        }
        $this->dropTable(Manages::tableName());
        $this->dropTable(ManagesTranslate::tableName());
    }

}
