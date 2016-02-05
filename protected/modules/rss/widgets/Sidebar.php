<?php

namespace humhub\modules\rss\widgets;

use humhub\models\Setting;
use humhub\modules\rss\libs\lastRSS;

class Sidebar extends \humhub\components\Widget
{

    public function run()
    {
    	$rssFeed = Setting::Get('rssFeed', 'rss');
    	
    	// create lastRSS object
    	$rss = new lastRSS;
    	
    	// setup transparent cache
    	$rss->cache_dir = './cache';
    	$rss->cache_time = 3600; // one hour
    	
    	// load some RSS file
    	if ($rs = $rss->get($rssFeed)) {
    		$feeds = $rs['items'];
    	} else {
    		$feeds = 'Error';
    	}

        return $this->render('sidebar', array(
        	'feeds' => $feeds
        ));
    }

}

?>
