<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\Storage;
use MoscowBeton\SitemapGenerate\Config;
use \Helper\CHelperCommon;


class BitrixAPIFiltersStorage extends BitrixAPIStorage implements Storage
{
    protected static $filters = [];

    protected static function getFilters(): array
    {
        if (empty(static::$filters)) static::$filters = CHelperCommon::getFilterRelinkData(); 

        return static::$filters;
    }
    
    public function getRegionData(array $regionData): array
    {
        $sectionFilters = [];
        $filters = static::getFilters();
        $sections = $this->getSections($regionData, ['UF_SHOW_FILTER_RELINK' => true]);
        foreach ($sections as $key => $value) {
            foreach ($filters as $filterValues) {
                if (is_array($filterValues)) {
                    foreach ($filterValues as $filterValue) {
                        $sectionFilters[] = ['URL' => $sections[$key]['URL'] . $filterValue['link'], 'TIMESTAMP_X' => $sections[$key]['TIMESTAMP_X']];
                    }
                }
            }
        }
        
        return $sectionFilters;
    }
}