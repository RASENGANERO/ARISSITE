<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

class FilterRelink extends CBitrixComponent
{
    
    public function executeComponent()
    {
        $arResult = [];

        $uf_arresult = CIBlockSection::GetList(["SORT"=>"ASC"], ["IBLOCK_ID" => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', "ID" =>  $this->arParams['SECTION_ID'], 'UF_SHOW_FILTER_RELINK' => true], false, []);
		if($uf_value = $uf_arresult->GetNext()):
			$arResult['data'] = \Helper\CHelperCommon::getFilterRelinkData();
			$arResult['pageUrl'] = $uf_value['SECTION_PAGE_URL'];
		endif;
        $this->arResult = $arResult;
        $this->IncludeComponentTemplate();
    }
}

