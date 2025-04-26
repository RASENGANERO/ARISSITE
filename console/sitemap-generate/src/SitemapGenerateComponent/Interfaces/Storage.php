<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces;

interface Storage
{
    public function getRegionsList(): array;

    public function getRegionData(array $regionData): array;
}