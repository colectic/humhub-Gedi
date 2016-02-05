<?php

use yii\helpers\Html;

humhub\modules\rss\Assets::register($this);
?>
<div class="panel panel-default" id="rss-panel">

    <!-- Display panel menu widget -->
    <?php humhub\widgets\PanelMenu::widget(array('id' => 'rss-panel')); ?>

    <div class="panel-heading">
        <?php echo Yii::t('RssModule.base', '<strong>Recent</strong> news'); ?>
    </div>
    <div class="panel-body">
		<?php 
		// run through the array of feeds
		if (is_array($feeds)){
			echo "<ul class='fa-ul'>";
			foreach ($feeds as $feed) {
				echo "<li><i class='fa-li fa fa-rss-square'></i> <a href='{$feed['link']}' target='_blank'>{$feed['title']}</a></li>";
				echo "<hr />";
			}
			echo "</ul>";
		}else{
			//Error
			echo "<p>{$feeds}</p>";
		}
        ?>
    </div>
</div>

