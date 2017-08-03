<?php

class m170731_113718_create_category_table extends CDbMigration
{
	public function up()
	{
	    //(id, title, status)
        $this->createTable('Category', [
            'id' => 'pk',
            'title' => 'VARCHAR(50)',
            'status' => 'INTEGER',
            'root' => 'INTEGER',
            'lft' => 'INTEGER',
            'rgt' => 'INTEGER',
            'level' => 'INTEGER, KEY (`root`), KEY (`lft`), KEY (`rgt`), KEY (`level`)',
        ]);
	}

	public function down()
	{
	    $this->dropTable('Category');
		echo "m170731_113718_create_category_table migration down.\n";
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