<?php

class m170731_113743_create_comment_table extends CDbMigration
{
	public function up()
	{
	    //(id, post_id, content, user_id, date_created, status)
        $this->createTable('Comment', [
            'id' => 'pk',
            'content' => 'TEXT',
            'post_id' => 'INTEGER',
            'user_id' => 'INTEGER',
            'date_created' => 'DATE',
            'status' => 'INTEGER'
        ]);
        $this->addForeignKey('comId', 'Comment', 'user_id', 'User', 'id', 'CASCADE', 'CASCADE');
	    $this->addForeignKey('pstId', 'Comment', 'post_id', 'Post', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
	    $this->dropTable('Comment');
		echo "m170731_113743_create_comment_table migration down.\n";
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