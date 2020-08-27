<?php


namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;
class ParserService
{
    protected $url;
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function load() {
        $xml = XmlParser::load($this->url);
        return $xml;
    }

    public function getData() {
        $xml = $this->load();

        $news = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'text' => ['uses' => 'channel.description'],
            'link' => ['uses' => 'channel.link'],
            'news' => ['uses' => 'channel.item[title,description,link]']
        ]);

        return $news;
    }
}
