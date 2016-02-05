<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\content\widgets;

use Yii;
use humhub\components\Widget;

/**
 * WallEntry is responsible to show a content inside a stream/wall.
 * 
 * @see \humhub\modules\content\components\ContentActiveRecord
 * @since 0.20
 * @author luke
 */
class WallEntry extends Widget
{

    /**
     * The content object
     *
     * @var \humhub\modules\content\components\ContentActiveRecord
     */
    public $contentObject;

    /**
     * Indicates the post was just edited
     *
     * @var boolean
     */
    public $justEdited = false;

    /**
     * Route to edit the content
     * 
     * @var string
     */
    public $editRoute = "";

    /**
     * The wall entry layout to use
     * 
     * @var string
     */
    public $wallEntryLayout = "@humhub/modules/content/widgets/views/wallEntry.php";

    /**
     * @var boolean show files widget containing a list of all assigned files
     */
    public $showFiles = true;

    /**
     * @inheritdoc
     */
    public static function widget($config = [])
    {
        ob_start();
        ob_implicit_flush(false);
        try {
            /* @var $widget Widget */
            $config['class'] = get_called_class();
            $widget = Yii::createObject($config);
            $out = $widget->render($widget->wallEntryLayout, ['content' => $widget->run(), 'object' => $widget->contentObject, 'wallEntryWidget' => $widget]);
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }

        return ob_get_clean() . $out;
    }

    /**
     * Returns the edit url to edit the content (if supported)
     * 
     * @return string url
     */
    public function getEditUrl()
    {
        if ($this->editRoute === "") {
            return "";
        }

        return \yii\helpers\Url::to([$this->editRoute, 'id' => $this->contentObject->id]);
    }

    /**
     * Renders the wall entry output 
     * 
     * @return string the output
     * @throws \Exception
     */
    public function renderWallEntry()
    {
        ob_start();
        ob_implicit_flush(false);
        try {
            $out = $this->render($this->wallEntryLayout, [
                'content' => $this->run(),
                'object' => $this->contentObject,
                'wallEntryWidget' => $this
            ]);
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }

        return ob_get_clean() . $out;
    }

}
