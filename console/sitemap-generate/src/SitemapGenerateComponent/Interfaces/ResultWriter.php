<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces;

interface ResultWriter
{
    public function write(string $text, array $regionData): string;
}