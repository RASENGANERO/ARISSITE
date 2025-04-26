<?
use Bitrix\Main\Loader;
use Bitrix\Iblock\Template;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Config\Option;
use Sotbit\Seometa\Helper\OGraphTWCard;
use Sotbit\Seometa\OpengraphTable;
use Sotbit\Seometa\SeometaNotConfiguredPagesTable;
use Sotbit\Seometa\SeometaUrlTable;
use Sotbit\Seometa\SeoMetaMorphy;
use Sotbit\Seometa\SeometaStatisticsTable;
use Sotbit\Seometa\TwitterCardTable;
use Sotbit\Seometa\ConditionTable;

if(!Loader::includeModule('sotbit.seometa') || !Loader::includeModule('iblock'))
{
    return false;
}

global $sotbit_meta;
global $sotbit_data;

//if ($USER->IsAdmin()){
	$arFilter = array();
	$arFilter['NEW_URL'] = $_SERVER['SCRIPT_URL'];

	//var_dump($arFilter);

	$rsData = SeometaUrlTable::getList(array(
//	    'select' => array('ID', 'NAME', 'CONDITION_ID', 'ACTIVE', 'REAL_URL', 'NEW_URL', 'IN_SITEMAP', 'iblock_id', 'section_id', 'PRODUCT_COUNT', 'DATE_CHANGE', 'PROPERTIES'),
	    'filter' => $arFilter,
	    'order' => array('REAL_URL' => 'ASC'),
	));

	$cond_id = 0;
    if($arRes = $rsData->Fetch())
    {
//		var_dump($_SERVER);
//    	var_dump($arRes['REAL_URL']);
        // if (strpos($_SERVER['SCRIPT_URL'], $arRes['REAL_URL']) !== false){
	        
        // }
//        if ($arRes[''])
        $cond_id = $arRes['CONDITION_ID'];
    }

    if ($cond_id>0){
    	$arFilter = array('ID' => $cond_id);
	    $rsData=ConditionTable::getList(array(
	            //'select' => array('ID','NAME','SORT','ACTIVE','NO_INDEX'),
	            'filter' =>$arFilter,
	            'order' => array('ID' => 'ASC'),
	    ));

	    if($arRes = $rsData->Fetch())
	    {
	    	if ($arRes['NO_INDEX'] == 'Y'){
	    		$APPLICATION->SetPageProperty("robots", 'noindex, nofollow');
	    	}
	    	
//	    	var_dump($arRes);
	    	$meta = unserialize($arRes['META']);
	    	$sotbit_data = $arRes;
	    	// $sotbit_meta = $meta;
	    	// if (strlen($meta['ELEMENT_DESCRIPTION'])>0){
	    	// 	$APPLICATION->SetPageProperty("description", $meta['ELEMENT_DESCRIPTION']);
	    	// }

	    	// if (strlen($meta['ELEMENT_TITLE'])>0){
	    	// 	$APPLICATION->SetPageProperty("title", $meta['ELEMENT_TITLE']);
	    	// }

	    	// if (strlen($meta['ELEMENT_PAGE_TITLE'])>0){
	    	// 	$APPLICATION->SetTitle($meta['ELEMENT_TITLE']);
	    	// }


//	        var_dump($meta);
	    }

    }


	// $arParams = array();
	// $arParams['INFOBLOCK'] = 26;
	// $arResult = CSeoMeta::getRules($arParams);
	// var_dump($arResult);

//	die;
	
//	 die;
//}
/*
if ($_SERVER['SCRIPT_URL'] == '/catalog/beton/filter/brand-is-m300/apply/'){
	?>
	<meta name="robots" content="noindex">
	<?
}
*/
?>
