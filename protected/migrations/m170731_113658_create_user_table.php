<?php

class m170731_113658_create_user_table extends CDbMigration
{
	public function up()
	{
	    //id, username, email, status, role, password, password_salt, datetime_registration
	    $this->createTable('User', [
	        'id' => 'pk',
            'username' => 'VARCHAR(50)',
            'email' => 'VARCHAR(50)',
            'role' => 'VARCHAR(10)',
            'password' => 'VARCHAR(50)',
            'password_salt' => 'VARCHAR(50)',
            'datetime_registration' => 'DATETIME'
        ]);
       // $this->addPrimaryKey('usrPkId', 'User', 'id');
	}

	public function down()
	{
	    $this->dropTable('User');
		echo "m170731_113658_create_user_table migration down.\n";
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