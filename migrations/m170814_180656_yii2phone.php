<?php

use yii\db\Migration;

class m170814_180656_yii2phone extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170814_180656_yii2phone cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%country}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
        ]) ;

        $this->createTable('{{%userTel}}',[
            'id'=>$this->primaryKey(),
            'nameLastName'=>$this->string(255)->notNull(),
            'country'=>$this->integer()->notNull(),
            'tel'=>$this->string(255),
        ]) ;
        $this->createIndex(
            'row_nameLastName',
            '{{%userTel}}',
            'nameLastName'
        );

    }

    public function down()
    {
        $this->dropTable('{{%country}}');
        $this->dropTable('{{%userTel}}');
    }

}
