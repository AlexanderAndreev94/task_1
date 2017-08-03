<?php

class m170731_113730_create_post_table extends CDbMigration
{
	public function up()
	{
	    //(id, title, content, category_id, status, pub_date)
        $this->createTable('Post', [
            'id' => 'pk',
            'title' => 'VARCHAR(50)',
            'content' => 'TEXT',
            'category_id' => 'INTEGER',
            'status' => 'INTEGER',
            'pub_date' => 'DATE'
        ]);
        $this->addForeignKey('catId','Post','category_id','Category','id','CASCADE', 'CASCADE');
	}

	public function down()
	{
	    $this->dropTable('Post');
		echo "m170731_113730_create_post_table migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}