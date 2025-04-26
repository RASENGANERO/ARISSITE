<?php

namespace MoscowBeton\SitemapGenerate;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\GenerateController;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\ConsoleWriter;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\FileWriter;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\BitrixAPIStorage;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\TextResult;

class Main
{
    public function __construct()
    {
        $controller = new GenerateController(
            new BitrixAPIStorage(),
            new FileWriter(),
            new TextResult(),
            new ConsoleWriter()
        );
        $controller->generate();
    }
}