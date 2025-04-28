<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(count($arResult['COMBO']) == 1)
{
	$hidden = true;
	foreach($arResult['COMBO'][0] as $value)
	{
		if($value)
			$hidden = false;
	}
}


/*
HIT - Наши предложения
MARKA - Марка
IN_STOCK - В наличии
CLASSES - Класс бетона
STRENGTH - Средняя прочность кгс/см²
FROST - Морозостойкость F
FLUIDITY - Подвижность
STIFFNESS - Жесткость
FILLER - Наполнитель
WATER_RESISTANT - Воднонепроницаемость
 - Плотность кг/м³
 - Противоморозные добавки (ПМД)
 - Фибра
BASE - Розничная цена
*/
foreach($arResult['ITEMS'] as $key=>$item) {
	if(
		$item['CODE'] == 'HIT' ||
		$item['CODE'] == 'IN_STOCK' ||
		$item['CODE'] == 'BASE'
	)
		unset($arResult['ITEMS'][$key]);
}

if($hidden)
	$arResult['ITEMS'] = array();

if($arResult['ITEMS'])
{
	$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";
	foreach($arResult["ITEMS"] as $key => $arItem)
	{
		if($arItem["CODE"]=="IN_STOCK")
		{
			sort($arResult["ITEMS"][$key]["VALUES"]);
			if($arResult["ITEMS"][$key]["VALUES"])
				$arResult["ITEMS"][$key]["VALUES"][0]["VALUE"]=$arItem["NAME"];
		}

		if(isset($arItem['PRICE']) && $arItem['PRICE'])
		{
			if(isset($arItem['VALUES']['MIN']['HTML_VALUE']) || $arItem['VALUES']['MAX']['HTML_VALUE'])
			{
				$arResult['PRICE_SET'] = 'Y';
				break;
			}
		}

		$i = 0;

		if($arItem['PROPERTY_TYPE'] == 'S' || $arItem['PROPERTY_TYPE'] == 'L' || $arItem['PROPERTY_TYPE'] == 'E')
		{
			foreach($arItem['VALUES'] as $arValue)
			{
				if(isset($arValue['CHECKED']) && $arValue['CHECKED'])
				{
					$arResult["ITEMS"][$key]['PROPERTY_SET'] = 'Y';
					++$i;
				}
			}

			if($i)
			{
				$arResult["ITEMS"][$key]['COUNT_SELECTED'] = $i;
			}
		}

		if($arItem['PROPERTY_TYPE'] == 'N')
		{
			foreach($arItem['VALUES'] as $arValue)
			{
				if(isset($arValue['HTML_VALUE']) && $arValue['HTML_VALUE'])
				{
					$arResult['ITEMS'][$key]['PROPERTY_SET'] = 'Y';
				}
			}
		}
	}
}

\Bitrix\Main\Localization\Loc::loadLanguageFile(__FILE__);

//global $USER;
//if($USER->IsAdmin()) {
	$arResult["ITEMS"][99599] = $arResult["ITEMS"][599];
	unset($arResult["ITEMS"][599]);
	$arResult["ITEMS"][99600] = $arResult["ITEMS"][600];
	unset($arResult["ITEMS"][600]);
	$arResult["ITEMS"][99606] = $arResult["ITEMS"][606];
	unset($arResult["ITEMS"][606]);
	$arResult["ITEMS"][99608] = $arResult["ITEMS"][608];
	unset($arResult["ITEMS"][608]);
	$arResult["ITEMS"][99612] = $arResult["ITEMS"][612];
	unset($arResult["ITEMS"][612]);
	$arResult["ITEMS"] = array_values($arResult["ITEMS"]);
	/*
	echo "<pre>";
	var_dump($arResult["ITEMS"]);
	echo "</pre>";
	die();
	*/
//}

// sort
include 'sort.php';

global $sotbitFilterResult;
$sotbitFilterResult = $arResult;