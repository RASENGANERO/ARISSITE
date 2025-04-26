<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

class AboutFactory extends CBitrixComponent
{
    
    public function executeComponent()
    {
        global $APPLICATION;
        $sectionId = $APPLICATION->GetPageProperty('sectionId');

        $filter = ['IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'PROPERTY_LINK_REGION' => $this->arParams['REGION_ID']];

        if ($sectionId && empty($this->arParams['ITEM_ID'])) {
            $filter['PROPERTY_CATALOG_SECTION'] = [$sectionId];
        } 

        if (!empty($this->arParams['ITEM_ID'])) {
            $filter['ID'] = intval($this->arParams['ITEM_ID']);
        }
        
        $res = CIBlockElement::GetList(
            ["ID" => "ASC"],
            $filter,
            false,
            false,
            ["ID", "IBLOCK_ID", "NAME", "PROPERTY_*"]
        );
        
        if ($element = $res->GetNextElement()) {
            $arProps = $element->GetProperties();
            $arFields = $element->GetFields();
            $this->arResult = [
                'ID' => $arFields['ID'],
                'IBLOCK_ID' => $arFields['IBLOCK_ID'],
                'NAME' => $arFields['NAME'],
                'LINK_REGION' => $arProps['LINK_REGION'],
                'TIZERS' => $arProps['TIZERS'],
                'PHOTO' => $arProps['PHOTO'],
                'TITLE' => $arProps['TITLE'],
            ];
        }
        $this->IncludeComponentTemplate();
    }
}

