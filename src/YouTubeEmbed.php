<?php
/**
 * YouTubeEmbed Plugin for Craft CMS >= 3.1.33
 *
 * @link      https://mdxdave.de
 * @copyright Copyright (c) 2017-2019 MDXDave
 */

namespace mdxdave\craft-youtube;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

class YouTubeEmbed extends Plugin
{

    public static $plugin;

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new twigextensions\YouTubeTwigExtension());

        Craft::info(
            Craft::t(
                'craft-youtube',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }
}
