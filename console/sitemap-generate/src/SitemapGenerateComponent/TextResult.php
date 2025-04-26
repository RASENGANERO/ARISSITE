<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\Result;

class TextResult implements Result
{
    public function getXml(array $urlsData): string
    {
        $text = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $text .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
        foreach ($urlsData as $data) {
            $text .= '<url><loc>' . $data['URL'] . '</loc><lastmod>' . $data['TIMESTAMP_X'] . '</lastmod></url>' . PHP_EOL;
        }
        $text .= '</urlset>' . PHP_EOL;
        return $text;
    }
}