<?php

class m150317_131255_initial extends humhub\components\Migration
{

    public function up()
    {
        $this->createTable('gcm_relation', array(
        	'id' => 'pk',
            'user_id' => 'INT NOT NULL',
        	'register_key' => 'varchar(160) NOT NULL',
            ));
        $this->createIndex('unique_userid', 'gcm_relation', 'register_key', true);
    }

    public function down()
    {
        echo "m150317_131255_initial does not support migration down.\n";
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
