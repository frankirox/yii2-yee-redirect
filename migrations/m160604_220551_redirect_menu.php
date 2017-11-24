<?php

use yii\db\Migration;

class m160604_220551_redirect_menu extends Migration
{

    public function up()
    {
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-redirects', 'menu_id' => 'admin-menu', 'link' => '/redirect/default/index', 'parent_id' => 'settings', 'created_by' => 1, 'order' => 5]);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-redirects', 'label' => 'Redirects', 'language' => 'en-US']);
    }

    public function down()
    {
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-redirects']);
    }

}
