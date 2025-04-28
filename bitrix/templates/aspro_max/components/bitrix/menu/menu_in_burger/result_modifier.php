<?
$arResult = CMax::getChilds($arResult);
global $arRegion, $arTheme;
$catalogLink = isset($arTheme['CATALOG_PAGE_URL']['VALUE']) ? $arTheme['CATALOG_PAGE_URL']['VALUE'] : '';

$MENU_TYPE = isset($arTheme['MEGA_MENU_TYPE']['VALUE']) ? $arTheme['MEGA_MENU_TYPE']['VALUE'] : $arTheme['MEGA_MENU_TYPE'];
if($MENU_TYPE == 3) {
	CMax::replaceMenuChilds($arResult, $arParams);
}

if($arResult){
	foreach($arResult as $key=>$arItem)
	{
		if(isset($arItem['CHILD']))
		{
			foreach($arItem['CHILD'] as $key2=>$arItemChild)
			{
				if(isset($arItemChild['PARAMS']) && $arRegion && isset($arTheme['USE_REGIONALITY']['VALUE']) && $arTheme['USE_REGIONALITY']['VALUE'] === 'Y' && isset($arTheme['USE_REGIONALITY']['DEPENDENT_PARAMS']['REGIONALITY_FILTER_ITEM']['VALUE']) && $arTheme['USE_REGIONALITY']['DEPENDENT_PARAMS']['REGIONALITY_FILTER_ITEM']['VALUE'] === 'Y')
				{
					// filter items by region
					if(isset($arItemChild['PARAMS']['LINK_REGION']))
					{
						if($arItemChild['PARAMS']['LINK_REGION'])
						{
							if(!in_array($arRegion['ID'], $arItemChild['PARAMS']['LINK_REGION']))
								unset($arResult[$key]['CHILD'][$key2]);
						}
						else
							unset($arResult[$key]['CHILD'][$key2]);
					}
				}
			}
		}

		if($arItem['LINK'] == $catalogLink) {
			$arResult['EXPANDED'] = $arItem;
			unset($arResult[$key]);
		}
	}
}

?>