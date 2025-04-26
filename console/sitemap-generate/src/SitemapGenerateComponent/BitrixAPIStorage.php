<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\Storage;
use MoscowBeton\SitemapGenerate\Config;


class BitrixAPIStorage implements Storage
{
    protected function getSections(array $regionData, array $filter = []): array
    {
        $sections = [];
        $rsSections = \CIBlockSection::GetList(
            [],
            array_merge(['IBLOCK_ID' => Config::IBLOCK_ID, 'GLOBAL_ACTIVE' => 'Y'], $filter),
            false,
            ['ID', 'IBLOCK_ID', 'SECTION_PAGE_URL', 'TIMESTAMP_X']
        );
        while ($arSection = $rsSections->GetNext()) {
            $sections[] = [
                'URL' => Config::PROTOCOL . '://' . $regionData['PROPERTY_MAIN_DOMAIN_VALUE'] . $arSection['SECTION_PAGE_URL'],
                'TIMESTAMP_X' => ($arSection['TIMESTAMP_X']) ? date(\DateTime::ATOM, MakeTimeStamp($arSection['TIMESTAMP_X'])) : '',
            ];
        }
        return $sections;
    }

    protected function getElementsByRegion(array $regionData): array
    {
        $list = [];
        $res = \CIBlockElement::GetList(
            [],
            ['IBLOCK_ID' => Config::IBLOCK_ID, 'ACTIVE' => 'Y', 'PROPERTY_LINK_REGION' => $regionData['ID']],
            false,
            false,
            ['ID', 'IBLOCK_ID', 'DETAIL_PAGE_URL', 'TIMESTAMP_X']
        );
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $list[] = [
                'URL' => Config::PROTOCOL . '://' . $regionData['PROPERTY_MAIN_DOMAIN_VALUE'] . $arFields['DETAIL_PAGE_URL'],
                'TIMESTAMP_X' => ($arFields['TIMESTAMP_X']) ? date(\DateTime::ATOM, MakeTimeStamp($arFields['TIMESTAMP_X'])) : '',
            ];
        }
        return $list;
    }

    public function getRegionsList(): array
    {
        $arSites = [];
        $db_res = \CSite::GetList('id', 'asc', ['ACTIVE' => 'Y']);
        while ($res = $db_res->Fetch()) {
            $arSites[] = $res;
        }
        $arItems = [];
        foreach ($arSites as $key => $arSite) {
            $optionsSiteID = $arSite['ID'];
            $rsItems = \CIBlockElement::GetList(
                ['NAME' => 'ASC'],
                ['ACTIVE' => 'Y', 'LID' => $optionsSiteID, 'IBLOCK_CODE' => 'aspro_max_regions'],
                false,
                false,
                ['ID', 'NAME', 'IBLOCK_ID', 'PROPERTY_MAIN_DOMAIN']
            );
            while ($arItem = $rsItems->Fetch()) {
                $arItems[] = $arItem;
            }
        }
        return $arItems;
    }

    public function getRegionData(array $regionData): array
    {
        $result = array_merge($this->getSections($regionData), $this->getElementsByRegion($regionData));
        return $result;
    }
}