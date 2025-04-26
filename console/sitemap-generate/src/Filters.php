<?php

namespace MoscowBeton\SitemapGenerate;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\GenerateController;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\ConsoleWriter;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\FileWriterFilters;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\BitrixAPIFiltersStorage;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\TextResult;

class Filters
{
    public function __construct()
    {
        $controller = new GenerateController(
            new BitrixAPIFiltersStorage(),
            new FileWriterFilters(),
            new TextResult(),
            new ConsoleWriter()
        );
        $controller->generate();
    }
}