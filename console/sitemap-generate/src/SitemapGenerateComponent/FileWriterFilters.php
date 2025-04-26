<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\ResultWriter;
use MoscowBeton\SitemapGenerate\Config;

class FileWriterFilters extends FileWriter implements ResultWriter
{
    public function write(string $text, array $regionData): string
    {
        $file = $_SERVER["DOCUMENT_ROOT"] .
            '/aspro_regions/sitemap/sitemap-filters-iblock-'
            . Config::IBLOCK_ID . '_'
            . $regionData['PROPERTY_MAIN_DOMAIN_VALUE'] . '.xml';
        
        file_put_contents($file, $text);
        
        return $file;
    }
}