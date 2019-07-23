<?php
/**
 * YouTubeEmbed Plugin for Craft CMS >= 3.1.33
 *
 * @link      https://mdxdave.de
 * @copyright Copyright (c) 2017-2019 MDXDave
 */

namespace mdxdave\craft-youtube\twigextensions;

use mdxdave\craft-youtube\YouTubeEmbed;
use Craft;

class YouTubeEmbedTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'YouTubeEmbed';
    }

    
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('youtube', [$this, 'youtubeEmbed']),
        ];
    }
    
    function showYouTube($id){
      $output = '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/'.$id.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      return \Craft\helpers\Template::raw($output);
   
    }
    
    function youtubeEmbed($raw){      
        $raw = preg_replace_callback("/\[youtube\]([0-9a-z-\/]*)\[\/youtube\]/", function($match){
          return $this->showYouTube($match[1]);
        }, $raw);
        return $raw;    
    }
}
