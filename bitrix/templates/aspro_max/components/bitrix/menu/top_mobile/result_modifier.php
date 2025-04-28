<?$arResult = CMax::getChilds($arResult);
global $arRegion, $arTheme;
if($arResult){
	$MENU_TYPE = isset($arTheme['MEGA_MENU_TYPE']['VALUE']) ? $arTheme['MEGA_MENU_TYPE']['VALUE'] : '';
	$bMenuIblock = isset($arTheme['MEGA_MENU_STRUCTURE']['VALUE']) ? ($arTheme['MEGA_MENU_STRUCTURE']['VALUE'] == '2') : false;

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
	}
	
	if($bMenuIblock) {
		CMax::replaceMenuChilds($arResult, $arParams);
	}
}?>