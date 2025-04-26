<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces;

interface Result
{
    public function getXml(array $urlsData): string;
}