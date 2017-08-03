<?php

class m170731_113753_create_postimage_table extends CDbMigration
{
	public function up()
	{
	    //(id, image, post_id)
        $this->createTable('PostImage', [
            'id' => 'pk',
            'image' => 'TEXT',
            'post_id' => 'INTEGER'
        ]);

        $this->addForeignKey('pimgId', 'PostImage', 'post_id', 'Post', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
	    $this->dropTable('PostImage');
		echo "m170731_113753_create_postimage_table migration down.\n";
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