<?php
/**
 * CTextFilter is used to create a list of available filters when writing and editing text.
 * CMContent calls this class.
 * 
 * @package LuminaCore
 */
use \Michelf\MarkdownExtra;

class CTextFilter
{

  /**
   * Properties
   */
  public static $instance = null;
    
    /**
    * Constructor
    */
    public function __construct()
    {
        ;
    }
	
    /**
   * Filter content according to a filter.
   *
   * @param $data string of text to filter and format according its filter settings.
   * @returns string with the filtered data.
   */
    public function Filter($data, $filter)
    {
        foreach ($filter as $value)
        {
            switch($value)
            {
            case 'markdown':
                $data = $this->markdown($data);
                break;
            case 'make_clickable':
                $data = $this->make_clickable($data);
                break;
            case 'smartypants':
                $data = $this->smartyPantsTypographer($data);
                break;
            case 'bbcode':
                $data = $this->bbcode2html($data);
                break;
            case 'htmlpurify':
                $data = $this->Purify($data);
                break;
            case 'plain': 
            default: $data = nl2br(makeClickable(htmlent($data))); break;
            }
        }
        
        return $data;
    }



    /**
    * Format text according to Markdown syntax.
    *
    * @param string $text the text that should be formatted.
    * @return string as the formatted html-text.
    */
    public static function markdown($text)
    {
        require_once(__DIR__ . '/php-markdown/Michelf/Markdown.php');
        require_once(__DIR__ . '/php-markdown/Michelf/MarkdownExtra.php');
        return MarkdownExtra::defaultTransform($text);
    }
	

    
    /**
    * Make clickable links from URLs in text.
    *
    * @param string $text the text that should be formatted.
    * @return string with formatted anchors.
    */
    public static function make_clickable($text)
    {
        return preg_replace_callback(
            '#\b(?<![href|src]=[\'"])https?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
            create_function(
                '$matches',
                'return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";'
                ),
                $text
                );
    }
    
    /**
    * Format text according to PHP SmartyPants Typographer.
    *
    * @param string $text the text that should be formatted.
    * @return string as the formatted html-text.
    */
    public static function smartyPantsTypographer($text)
    {
        require_once(__DIR__ . '/php-smartypants/smartypants.php');
        return SmartyPants($text);
    }
    
    /**
    * Helper, BBCode formatting converting to HTML.
    *
    * @param string text The text to be converted.
    * @returns string the formatted text.
    */
    public static function bbcode2html($text)
    {
        $search = array(
            '/\[b\](.*?)\[\/b\]/is',
            '/\[i\](.*?)\[\/i\]/is',
            '/\[u\](.*?)\[\/u\]/is',
            '/\[img\](https?.*?)\[\/img\]/is',
            '/\[url\](https?.*?)\[\/url\]/is',
            '/\[url=(https?.*?)\](.*?)\[\/url\]/is'
            );   
        $replace = array(
            '<strong>$1</strong>',
            '<em>$1</em>',
            '<u>$1</u>',
            '<img src="$1" />',
            '<a href="$1">$1</a>',
            '<a href="$1">$2</a>'
            );     
        return preg_replace($search, $replace, $text);
    }
    
   /**
   * Purify it. Create an instance of HTMLPurifier if it does not exists. 
   *
   * @param $text string the dirty HTML.
   * @returns string as the clean HTML.
   */
   public static function Purify($text) {   
    if(!self::$instance) {
      require_once(__DIR__.'/htmlpurifier-4.5.0-standalone/HTMLPurifier.standalone.php');
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Cache.DefinitionImpl', null);
      self::$instance = new HTMLPurifier($config);
    }
    return self::$instance->purify($text);
  }
}