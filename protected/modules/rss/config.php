<?php

use humhub\modules\dashboard\widgets\Sidebar;

return [
    'id' => 'rss',
    'class' => 'humhub\modules\rss\Module',
    'namespace' => 'humhub\modules\rss',
    'events' => [
        [	'class' => Sidebar::className(), 
        	'event' => Sidebar::EVENT_INIT, 
        	'callback' => ['humhub\modules\rss\Module', 'onSidebarInit']
        ],
    ],
];
?>
