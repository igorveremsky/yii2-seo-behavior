<?php

use yii\db\Migration;

/**
 * Migration for seo content storage
 *
 * php yii migrate --migrationPath="@vendor/romi45/yii2-seo-behavior/migrations"
 */
class m160219_172342_create_seo_content extends Migration
{
    public function safeUp()
    {
		    $tableOptions = null;
		    if ($this->db->driverName === 'mysql') {
			    // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			    $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
		    }

        $this->createTable('{{%seo_content}}', [
            'id' => $this->primaryKey(),
            'model_name' => $this->string(255)->notNull(),
            'model_id' =>  $this->string(255)->notNull(),
            'title' => $this->string(255),
            'h1' => $this->string(255),
            'keywords' => $this->string(512),
            'description' => $this->string(1024)
        ], $tableOptions);

//        $this->createIndex('seo_content_model_model_id', '{{%seo_content}}', ['model_name', 'model_id'], true);
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%seo_content}}');
    }
}
