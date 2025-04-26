<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */


// global $USER;
// if ($USER->IsAdmin()){
//   echo "<pre>";
  
//   foreach ($arResult["ITEMS"] as $key => $item) {
//     var_dump($item['NAME']);  
//   }

//   echo "</pre>";  
//   die;
// }

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

/* function printValue($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
} */

$iblockId = $arResult["ORIGINAL_PARAMETERS"]["IBLOCK_ID"];
$dbTree = CIBlockSection::GetTreeList(
    array("IBLOCK_ID" => $iblockId, "<=DEPTH_LEVEL" => "3"),
    array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "SECTION_PAGE_URL", "DEPTH_LEVEL")
);

// 3 уровень - начало
$arSections = array();
$arSections3 = array();
$arSections3_ids = array();
$arItems3_ids = array();
while($section = $dbTree->GetNext()) {
    if ($section['DEPTH_LEVEL']==3){
        $arSections3[$section["IBLOCK_SECTION_ID"]]["CHILD"][$section["ID"]] = $section;
        $arSections3_ids[] = $section['ID'];
//         global $USER;
//         if ($USER->IsAdmin()){
//           echo "<pre>";
//           var_dump($arSections3);
//           echo "</pre>";  
// //          die;
//         }
        continue;

    }

    if ($section["IBLOCK_SECTION_ID"]) {
        $arSections[$section["IBLOCK_SECTION_ID"]]["CHILD"][$section["ID"]] = $section;
    } else {
        $arSections[$section["ID"]] = $section;
    }
}

foreach ($arResult["ITEMS"] as $id=>$data){
if (in_array($data['IBLOCK_SECTION_ID'], $arSections3_ids)){
    //var_dump($data['NAME']);
    $arItems3_ids[$data['ID']] = $data;
}
//if (13097 == $data['ID'])
    
//die;
}




$arResult["arSections3"] = $arSections3;
$arResult["arItems3_ids"] = $arItems3_ids;
// 3 уровень - конец

$arResult["SECTIONS"] = $arSections;

$arItems = $arResult["ITEMS"];

/* if (isset($_GET['test'])) {
              echo "<pre>";
              print_r($arResult["ITEMS"]);
              echo "</pre>";
              }*/



foreach ($arItems as $key => $item) {
    // if ($USER->IsAdmin()){
    //     echo "<pre>";
    //     var_dump($item);
    //     echo "</pre>";
    // }
    $itemsSortBySectId[$item["IBLOCK_SECTION_ID"]][$item["ID"]] = $item;
}

$arResult["ITEMS_SORT"] = $itemsSortBySectId;


$iblockMarksId = 30;
$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID"=>IntVal($iblockMarksId), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$result = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
$arMarks = array();
while($mark = $result->GetNextElement()) {
    $markFields = $mark->GetFields();
    $arMarks[$markFields["ID"]] = $markFields["NAME"];
}

$arResult["ITEMS_MARKS"] = $arMarks;

$iblockMarksId = 33;
$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID"=>IntVal($iblockMarksId), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$result = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
$arClasses = array();
while($class = $result->GetNextElement()) {
    $classFields = $class->GetFields();
    $arClasses[$classFields["ID"]] = $classFields["NAME"];
}

$arResult["ITEMS_CLASSES"] = $arClasses;


// Выведем актуальную корзину для текущего пользователя

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL"
    ),
    false,
    false,
    array("ID",
      "NAME",
      "CALLBACK_FUNC",
      "MODULE",
      "PRODUCT_ID",
      "QUANTITY",
      "DELAY",
      "CAN_BUY",
      "PRICE",
      "WEIGHT"
    )
);

$arProductsId = array();
while ($arItems = $dbBasketItems->Fetch()) {
    $arBasketItems[$arItems["PRODUCT_ID"]] = $arItems;
}
$arResult["USER_BASKET"] = $arBasketItems;
