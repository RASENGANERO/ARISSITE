<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\ResultWriter;
use MoscowBeton\SitemapGenerate\Config;

class FileWriter implements ResultWriter
{
    public function write(string $text, array $regionData): string
    {
        $file = $_SERVER["DOCUMENT_ROOT"] .
            '/aspro_regions/sitemap/sitemap-iblock-'
            . Config::IBLOCK_ID . '_'
            . $regionData['PROPERTY_MAIN_DOMAIN_VALUE'] . '.xml';
        if (file_exists($file)) {
            file_put_contents($file, $text);
        } else {
            throw new \Exception('Не найден файл ' . $file);
        }
        return $file;
    }
}