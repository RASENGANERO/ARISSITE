<?
use Bitrix\Main\Loader;
use Sotbit\Seometa\SeometaUrlTable;

define("NO_KEEP_STATISTIC", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$id_module = 'sotbit.seometa';

$toJsonData = [];

if (Loader::includeModule($id_module)) {

	$rsData = SeometaUrlTable::getList(array(
        'select' => array('REAL_URL','NEW_URL'),
        'filter' =>['ACTIVE' => 'Y']
    ));

	while ($arRes = $rsData->Fetch()) {
		$toJsonData[$arRes['REAL_URL']] = $arRes['NEW_URL'];
    }
}

exit(json_encode($toJsonData));