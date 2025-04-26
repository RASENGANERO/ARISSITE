<?php
@set_time_limit(0);
@ignore_user_abort(true);

if (!empty($argv[1]) && $argv[1] == "cron"){
    $_SERVER["DOCUMENT_ROOT"] = "/home/bitrix/ext_www/beton-gost.ru";
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    $cronrun = true;
}else{
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $cronrun = false;
}


?>

<?

global $USER;
if(!$USER->IsAdmin() && !$cronrun){
    die();
}

function getSeoFieldTemplates($iblockId, $elementId, $getAll = false) {
    $result = array();


    $getAll = ($getAll === true);
    $seoTemplates = new \Bitrix\Iblock\InheritedProperty\ElementTemplates($iblockId, $elementId);
    $elementTemplates = $seoTemplates->findTemplates();
    if (empty($elementTemplates) || !is_array($elementTemplates)) {
        return $result;
    }
    foreach ($elementTemplates as &$fieldTemplate) {
        if (!$getAll && (!isset($fieldTemplate['INHERITED']) || $fieldTemplate['INHERITED'] !== 'N')) {
            continue;
        }
        $result[$fieldTemplate['CODE']] = $fieldTemplate['TEMPLATE'];
    }
    unset($fieldName, $data);

    return $result;
}

$arSelectR = Array("ID", "IBLOCK_ID", "CODE", "NAME");
$arFilterR = Array("IBLOCK_ID" => 4, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "INCLUDE_SUBSECTIONS" => "Y");
$resRegions = CIblockElement::GetList(Array("NAME" => "DESC"), $arFilterR, false, false, $arSelectR);
$regionSelect = [];

if(!empty($_GET["MESSAGE"])){
    echo "<p style='color:red;'>{$_GET["MESSAGE"]}</p>";
}

if(!$cronrun) {

    echo "<form action='' method='post'>";
    echo "<b>Выберите регион</b><br />";
    while ($obRegions = $resRegions->GetNextElement()) {
        $arFieldsR = $obRegions->GetFields();
//    $regionSelect[] = $arFieldsR["ID"];
        echo "<label><input type='checkbox' name='regions[]' value='{$arFieldsR["ID"]}'> {$arFieldsR["NAME"]}</label><br />";
    }
    echo "<b>Элемент для копирования</b><br />
        <input type='text' id='elementcopy' name='elementcopy'>
		<input type='button' value='Выберите элемент' onClick=\"jsUtils.OpenWindow('/bitrix/admin/iblock_element_search.php?lang=ru&IBLOCK_ID=26&n=elementcopy&k=n0&iblockfix=y&tableId=iblockprop-E-367-26', 900, 700);\">		
		<br />
		
		<br />
		<input type='text' id='section_id' name='section_id'>
		<input type=\"button\" value=\"Выбрать раздел\" onClick=\"jsUtils.OpenWindow('/bitrix/admin/iblock_section_search.php?lang=ru&IBLOCK_ID=26&n=section_id', 800, 600);\">		
		<br />
		
		<b>Цены торговых предложений</b> 
		    <select name='price_settings'>
		         <option value='false'>не изменять</option>    
		        <option value='plus'>Увеличить</option>    
		        <option value='minus'>Уменьшить</option> 
		        <option value='plus_procent'>Увеличить на процент</option>    
		        <option value='minus_procent'>Уменьшить на процент</option>    
		    </select>
		    <br /><br />
		    число/процент <input type='text' name='price_number'> 
		    		
		
		
		<br /><br /><input type='submit' value='Копировать'>";

    echo "</form>";
}

if(!empty($_POST["section_id"]) && !empty($_POST["regions"])){
    @file_put_contents("copysections.txt", json_encode(array("section_id" => $_POST["section_id"], "regions" => $_POST["regions"], "price_settings" => $_POST["price_settings"], "price_number" => $_POST["price_number"]))."\r\n", FILE_APPEND);
    LocalRedirect("/test2.php?MESSAGE=Раздел добавлен в расписание");
}






//if((!empty($_POST["section_id"]) || !empty($_POST["elementcopy"])) && !empty($_POST["regions"])) {
if((!empty($_POST["elementcopy"]) && !empty($_POST["regions"])) || $cronrun) {
    $IBLOCK_ID = 26;
    $IBLOCK_OFFER_ID = 28;

//    echo "<pre>"; print_r($_POST["section_id"]); echo "</pre>";
//    die();

    if($cronrun){
        $file = @file($_SERVER["DOCUMENT_ROOT"]."/copysections.txt");
        $line0 = $file[0];
        unset($file[0]);
        @file_put_contents($_SERVER["DOCUMENT_ROOT"].'/copysections.txt', implode('', $file));
        $jsonData = json_decode($line0);
        if($jsonData){
            $_POST["section_id"] = $jsonData->section_id;
            $_POST["regions"] = $jsonData->regions;
            $_POST["price_settings"] = $jsonData->price_settings;
            $_POST["price_number"] = $jsonData->price_number;
        }
    }


    if(!empty($_POST["section_id"])) {
        $arSelectELementSection = Array("ID");
        $arFilterSectionElement = Array("IBLOCK_ID" => $IBLOCK_ID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "SECTION_ID" => $_POST["section_id"], "INCLUDE_SUBSECTIONS" => "Y", "PROPERTY_LINK_REGION" => 22);
        $resSectionElement = CIblockElement::GetList(Array("ID" => "DESC"), $arFilterSectionElement, false, false, $arSelectELementSection);
        while($arSectionElement = $resSectionElement->GetNextElement()){
            $arFieldsElement = $arSectionElement->GetFields();
            $elements[] = $arFieldsElement["ID"];
        }
    }elseif(!empty($_POST["elementcopy"])){
        $elements = array($_POST["elementcopy"]);
    }




    foreach ($elements as $elementID) {

        $arRegionsSelect = $_POST["regions"];

        $ID = "E" . $elementID;



        $bMixPage = true;

        $_REQUEST['ID'] = array();
        foreach ($_POST["regions"] as $region) {
            array_push($_REQUEST['ID'], $ID);
        }


        $intSrcIBlockID = $IBLOCK_ID;
        $intDestIBlockID = $IBLOCK_ID;


        $keepOldSections = false;

        $multipleCopy = false;

        $elementSections = array(0 => array());


        $boolCreateElement = true;

        if ($boolCreateElement) {
            $arPropListCache = array();
            $arOldPropListCache = array();
            $arNamePropListCache = array();
            $arOldNamePropListCache = array();

            $boolUFListCache = false;
            $arUFListCache = array();
            $arOldUFListCache = array();
            $arUFEnumCache = array();
            $arOldUFEnumCache = array();
            $arUFNameEnumCache = array();
            $arOldUFNameEnumCache = array();

            $arDestIBlock = CIBlock::GetArrayByID($intDestIBlockID);
            $arDestIBFields = $arDestIBlock['FIELDS'];
            $boolCodeUnique = false;
            if ($arDestIBFields['CODE']['DEFAULT_VALUE']['UNIQUE'] == 'Y') {
                $boolCodeUnique = ($intSrcIBlockID == $intDestIBlockID);
            }
            $boolSectCodeUnique = false;
            if ($arDestIBFields['SECTION_CODE']['DEFAULT_VALUE']['UNIQUE'] == 'Y') {
                $boolSectCodeUnique = ($intSrcIBlockID == $intDestIBlockID);
            }

            $boolCopyCatalog = true;
            $boolNewCatalog = false;


            $sectionsErr = false;

            $el = new CIBlockElement();
            $sc = new CIBlockSection();
            $obEnum = new CUserFieldEnum();
            foreach ($_REQUEST['ID'] as $eID) {


                $boolCopyElem = false;
                $boolCopySect = false;
                if ($bMixPage) {
                    if (strncmp($eID, 'E', 1) == 0) {
                        $boolCopyElem = true;
                    } else {
                        $boolCopySect = true;
                    }
                    $ID = (int)substr($eID, 1);
                } else {
                    $boolCopyElem = $bElemPage;
                    $boolCopySect = $bSectPage;
                    $ID = (int)$eID;
                }


                if ($boolCreateElement && $boolCopyElem) {
                    if ($obSrc = CIBlockElement::GetByID($ID)->GetNextElement()) {
                        $arSrc = $obSrc->GetFields();
                        $arSrcPr = $obSrc->GetProperties(false, array('EMPTY' => 'N'));
                        $arSrc['PREVIEW_PICTURE'] = (int)$arSrc['PREVIEW_PICTURE'];
                        if ($arSrc['PREVIEW_PICTURE'] > 0) {
                            $arSrc['PREVIEW_PICTURE'] = CFile::MakeFileArray($arSrc['PREVIEW_PICTURE']);
                            if (empty($arSrc['PREVIEW_PICTURE'])) {
                                $arSrc['PREVIEW_PICTURE'] = false;
                            } else {
                                $arSrc['PREVIEW_PICTURE']['COPY_FILE'] = 'Y';
                            }
                        } else {
                            $arSrc['PREVIEW_PICTURE'] = false;
                        }
                        $arSrc['DETAIL_PICTURE'] = (int)$arSrc['DETAIL_PICTURE'];
                        if ($arSrc['DETAIL_PICTURE'] > 0) {
                            $arSrc['DETAIL_PICTURE'] = CFile::MakeFileArray($arSrc['DETAIL_PICTURE']);
                            if (empty($arSrc['DETAIL_PICTURE'])) {
                                $arSrc['DETAIL_PICTURE'] = false;
                            } else {
                                $arSrc['DETAIL_PICTURE']['COPY_FILE'] = 'Y';
                            }
                        } else {
                            $arSrc['DETAIL_PICTURE'] = false;
                        }
                        $rawSource = $arSrc;
                        $arSrc = array(
                            'IBLOCK_ID' => $intDestIBlockID,
                            'ACTIVE' => false, //$arSrc['ACTIVE'],
                            'ACTIVE_FROM' => $arSrc['ACTIVE_FROM'],
                            'ACTIVE_TO' => $arSrc['ACTIVE_TO'],
                            'SORT' => $arSrc['SORT'],
                            'NAME' => $arSrc['~NAME'],
                            'PREVIEW_PICTURE' => $arSrc['PREVIEW_PICTURE'],
                            'PREVIEW_TEXT' => $arSrc['~PREVIEW_TEXT'],
                            'PREVIEW_TEXT_TYPE' => $arSrc['PREVIEW_TEXT_TYPE'],
                            'DETAIL_TEXT' => $arSrc['~DETAIL_TEXT'],
                            'DETAIL_TEXT_TYPE' => $arSrc['DETAIL_TEXT_TYPE'],
                            'DETAIL_PICTURE' => $arSrc['DETAIL_PICTURE'],
                            'WF_STATUS_ID' => $arSrc['WF_STATUS_ID'],
                            'CODE' => $arSrc['~CODE'],
                            'TAGS' => $arSrc['~TAGS'],
                            'PROPERTY_VALUES' => array(),
                        );


                        if ($arDestIBFields['CODE']['IS_REQUIRED'] == 'Y') {
                            if ((string)$arSrc['CODE'] === '') {
                                $arSrc['CODE'] = mt_rand(100000, 1000000);
                            }
                        }

                        $otherIblock = $intSrcIBlockID != $intDestIBlockID;


                        /************************* props  *********************/

                        //                                    echo "<pre>"; print_r($regionSelect); echo "</pre>";

                        foreach ($arSrcPr as &$arProp) {
                            $propertyIndex = (string)$arProp['CODE'];
                            if ($propertyIndex === '' && !$otherIblock) {
                                $propertyIndex = $arProp['ID'];
                            }
                            if ($propertyIndex === '') {
                                continue;
                            }

                            if ($arProp["CODE"] == "LINK_REGION") {
                                $arSrc['PROPERTY_VALUES'][$propertyIndex] = array_shift($arRegionsSelect);
                            } elseif ($arProp['USER_TYPE'] == 'HTML') {
                                if (is_array($arProp['~VALUE'])) {
                                    if ($arProp['MULTIPLE'] == 'N') {
                                        $arSrc['PROPERTY_VALUES'][$propertyIndex] = array('VALUE' => array('TEXT' => $arProp['~VALUE']['TEXT'], 'TYPE' => $arProp['~VALUE']['TYPE']));
                                        if ($arProp['WITH_DESCRIPTION'] == 'Y') {
                                            $arSrc['PROPERTY_VALUES'][$propertyIndex]['DESCRIPTION'] = $arProp['~DESCRIPTION'];
                                        }
                                    } else {
                                        if (!empty($arProp['~VALUE'])) {
                                            $arSrc['PROPERTY_VALUES'][$propertyIndex] = array();
                                            foreach ($arProp['~VALUE'] as $propValueKey => $propValue) {
                                                $oneNewValue = array('VALUE' => array('TEXT' => $propValue['TEXT'], 'TYPE' => $propValue['TYPE']));
                                                if ($arProp['WITH_DESCRIPTION'] == 'Y') {
                                                    $oneNewValue['DESCRIPTION'] = $arProp['~DESCRIPTION'][$propValueKey];
                                                }
                                                $arSrc['PROPERTY_VALUES'][$propertyIndex][] = $oneNewValue;
                                                unset($oneNewValue);
                                            }
                                            unset($propValue, $propValueKey);
                                        }
                                    }
                                }
                            } elseif ($arProp['USER_TYPE'] == 'video') {
                                if (!empty($arProp['~VALUE'])) {
                                    if ($arProp['MULTIPLE'] == 'N') {
                                        if (!is_array($arProp['~VALUE'])) {
                                            $arProp['~VALUE'] = unserialize($arProp['~VALUE'], ['allowed_classes' => false]);
                                        }
                                        if (is_array($arProp['~VALUE'])) {
                                            $arSrc['PROPERTY_VALUES'][$propertyIndex] = ['VALUE' => $arProp['~VALUE']];
                                            if ($arProp['WITH_DESCRIPTION'] == 'Y') {
                                                $arSrc['PROPERTY_VALUES'][$propertyIndex]['DESCRIPTION'] = $arProp['~DESCRIPTION'];
                                            }
                                        }
                                    } else {
                                        $arSrc['PROPERTY_VALUES'][$propertyIndex] = array();
                                        foreach ($arProp['~VALUE'] as $propValueKey => $propValue) {
                                            if (!is_array($propValue)) {
                                                $propValue = unserialize($propValue, ['allowed_classes' => false]);
                                            }
                                            if (is_array($propValue)) {
                                                $oneNewValue = array('VALUE' => $propValue);
                                                if ($arProp['WITH_DESCRIPTION'] == 'Y') {
                                                    $oneNewValue['DESCRIPTION'] = $arProp['~DESCRIPTION'][$propValueKey];
                                                }
                                                $arSrc['PROPERTY_VALUES'][$propertyIndex][] = $oneNewValue;
                                                unset($oneNewValue);
                                            }
                                        }
                                        unset($propValue, $propValueKey);
                                    }
                                }
                            } elseif ($arProp['PROPERTY_TYPE'] == 'F') {
                                if (is_array($arProp['VALUE'])) {
                                    $arSrc['PROPERTY_VALUES'][$propertyIndex] = array();
                                    foreach ($arProp['VALUE'] as $propValueKey => $file) {
                                        if ($file > 0) {
                                            $tmpValue = CFile::MakeFileArray($file);
                                            if (!is_array($tmpValue))
                                                continue;
                                            if ($arProp['WITH_DESCRIPTION'] == 'Y') {
                                                $tmpValue = array(
                                                    'VALUE' => $tmpValue,
                                                    'DESCRIPTION' => $arProp['~DESCRIPTION'][$propValueKey]
                                                );
                                            }
                                            $arSrc['PROPERTY_VALUES'][$propertyIndex][] = $tmpValue;
                                        }
                                    }
                                } elseif ($arProp['VALUE'] > 0) {
                                    $tmpValue = CFile::MakeFileArray($arProp['VALUE']);
                                    if (is_array($tmpValue)) {
                                        if ($arProp['WITH_DESCRIPTION'] == 'Y') {
                                            $tmpValue = array(
                                                'VALUE' => $tmpValue,
                                                'DESCRIPTION' => $arProp['~DESCRIPTION']
                                            );
                                        }
                                        $arSrc['PROPERTY_VALUES'][$propertyIndex] = $tmpValue;
                                    }
                                }
                            } elseif ($arProp['PROPERTY_TYPE'] == 'L') {
                                if (!empty($arProp['VALUE_ENUM_ID'])) {
                                    if ($intSrcIBlockID == $arSrc['IBLOCK_ID']) {
                                        $arSrc['PROPERTY_VALUES'][$propertyIndex] = $arProp['VALUE_ENUM_ID'];
                                    } else {
                                        if (isset($arPropListCache[$arProp['CODE']]) && isset($arOldPropListCache[$arProp['CODE']])) {
                                            if (is_array($arProp['VALUE_ENUM_ID'])) {
                                                $arSrc['PROPERTY_VALUES'][$arProp['CODE']] = array();
                                                foreach ($arProp['VALUE_ENUM_ID'] as &$intValueID) {
                                                    $strValueXmlID = $arOldPropListCache[$arProp['CODE']][$intValueID];
                                                    if (isset($arPropListCache[$arProp['CODE']][$strValueXmlID])) {
                                                        $arSrc['PROPERTY_VALUES'][$arProp['CODE']][] = $arPropListCache[$arProp['CODE']][$strValueXmlID];
                                                    } else {
                                                        $strValueName = $arOldNamePropListCache[$arProp['CODE']][$intValueID];
                                                        $intValueKey = array_search($strValueName, $arNamePropListCache[$arProp['CODE']]);
                                                        if ($intValueKey !== false) {
                                                            $arSrc['PROPERTY_VALUES'][$arProp['CODE']][] = $intValueKey;
                                                        }
                                                    }
                                                }
                                                if (isset($intValueID)) {
                                                    unset($intValueID);
                                                }
                                                if (empty($arSrc['PROPERTY_VALUES'][$arProp['CODE']])) {
                                                    unset($arSrc['PROPERTY_VALUES'][$arProp['CODE']]);
                                                }
                                            } else {
                                                $strValueXmlID = $arOldPropListCache[$arProp['CODE']][$arProp['VALUE_ENUM_ID']];
                                                if (isset($arPropListCache[$arProp['CODE']][$strValueXmlID])) {
                                                    $arSrc['PROPERTY_VALUES'][$arProp['CODE']] = $arPropListCache[$arProp['CODE']][$strValueXmlID];
                                                } else {
                                                    $strValueName = $arOldNamePropListCache[$arProp['CODE']][$arProp['VALUE_ENUM_ID']];
                                                    $intValueKey = array_search($strValueName, $arNamePropListCache[$arProp['CODE']]);
                                                    if ($intValueKey !== false) {
                                                        $arSrc['PROPERTY_VALUES'][$arProp['CODE']] = $intValueKey;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            } elseif ($arProp['PROPERTY_TYPE'] == 'S' || $arProp['PROPERTY_TYPE'] == 'N') {
                                if ($arProp['MULTIPLE'] == 'Y') {
                                    if (is_array($arProp['~VALUE'])) {
                                        if ($arProp['WITH_DESCRIPTION'] == 'Y') {
                                            $arSrc['PROPERTY_VALUES'][$propertyIndex] = array();
                                            foreach ($arProp['~VALUE'] as $propValueKey => $propValue) {
                                                $arSrc['PROPERTY_VALUES'][$propertyIndex][] = array(
                                                    'VALUE' => $propValue,
                                                    'DESCRIPTION' => $arProp['~DESCRIPTION'][$propValueKey]
                                                );
                                            }
                                            unset($propValue, $propValueKey);
                                        } else {
                                            $arSrc['PROPERTY_VALUES'][$propertyIndex] = $arProp['~VALUE'];
                                        }
                                    }
                                } else {
                                    $arSrc['PROPERTY_VALUES'][$propertyIndex] = (
                                    $arProp['WITH_DESCRIPTION'] == 'Y'
                                        ? array('VALUE' => $arProp['~VALUE'], 'DESCRIPTION' => $arProp['~DESCRIPTION'])
                                        : $arProp['~VALUE']
                                    );
                                }
                            } else {
                                $arSrc['PROPERTY_VALUES'][$propertyIndex] = $arProp['~VALUE'];
                            }
                        }
                        /************************* end props  *********************/
                        if (isset($arProp)) {
                            unset($arProp);
                        }

                        $seoTemplates = getSeoFieldTemplates($intSrcIBlockID, $ID);

                        if (!empty($seoTemplates)) {
                            $arSrc['IPROPERTY_TEMPLATES'] = $seoTemplates;
                        }
                        unset($seoTemplates);

                        $oldSections = array();
                        if ($intSrcIBlockID == $intDestIBlockID) {
                            $rsSections = CIBlockElement::GetElementGroups($ID, true);
                            while ($arSection = $rsSections->Fetch()) {
                                $oldSections[] = $arSection['ID'];
                            }
                            unset($arSection, $rsSections);
                        }

                        $elementError = false;
                        foreach ($elementSections as $newSections) {
                            if (array_key_exists('IBLOCK_SECTION', $arSrc)) {
                                unset($arSrc['IBLOCK_SECTION']);
                            }
                            $iblockSections = array_merge($oldSections, $newSections);
                            if (!empty($iblockSections)) {
                                $iblockSections = array_unique($iblockSections);
                                $arSrc['IBLOCK_SECTION'] = $iblockSections;
                            }
                            unset($iblockSections);

                            //                        echo "<pre>"; print_r($arSrc); echo "</pre>";

                            //                        die();

                            $intNewID = $el->Add($arSrc, true, true, true);
                            var_dump($intNewID);
                            if ($intNewID) {
                                if ($boolCopyCatalog) {
                                    $priceRes = CPrice::GetListEx(
                                        array(),
                                        array('PRODUCT_ID' => $ID),
                                        false,
                                        false,
                                        array('PRODUCT_ID', 'EXTRA_ID', 'CATALOG_GROUP_ID', 'PRICE', 'CURRENCY', 'QUANTITY_FROM', 'QUANTITY_TO')
                                    );
                                    while ($arPrice = $priceRes->Fetch()) {
                                        $arPrice['PRODUCT_ID'] = $intNewID;
                                        if (!empty($_POST["price_settings"])) {
                                            switch ($_POST["price_settings"]) {
                                                case "plus":
                                                    $arPrice["PRICE"] = $arPrice["PRICE"] + floatval($_POST["price_number"]);
                                                    break;
                                                case "minus":
                                                    $arPrice["PRICE"] = $arPrice["PRICE"] - floatval($_POST["price_number"]);
                                                    break;
                                                case "plus_procent":
                                                    $arPrice["PRICE"] = $arPrice["PRICE"] + $arPrice["PRICE"] * (floatval($_POST["price_number"]) / 100);
                                                    break;
                                                case "minus_procent":
                                                    $arPrice["PRICE"] = $arPrice["PRICE"] - $arPrice["PRICE"] * (floatval($_POST["price_number"]) / 100);
                                                    break;
                                            }
                                        }

                                        CPrice::Add($arPrice);
                                    }
                                }
                                    $arProduct = array(
                                        'ID' => $intNewID
                                    );
                                        $productRes = CCatalogProduct::GetList(
                                            array(),
                                            array('ID' => $ID),
                                            false,
                                            false,
                                            array(
                                                'QUANTITY_TRACE_ORIG',
                                                'CAN_BUY_ZERO_ORIG',
                                                'NEGATIVE_AMOUNT_TRACE_ORIG',
                                                'SUBSCRIBE_ORIG',
                                                'WEIGHT',
                                                'PRICE_TYPE',
                                                'RECUR_SCHEME_TYPE',
                                                'RECUR_SCHEME_LENGTH',
                                                'TRIAL_PRICE_ID',
                                                'WITHOUT_ORDER',
                                                'SELECT_BEST_PRICE',
                                                'VAT_ID',
                                                'VAT_INCLUDED',
                                                'WIDTH',
                                                'LENGTH',
                                                'HEIGHT',
                                                'PURCHASING_PRICE',
                                                'PURCHASING_CURRENCY',
                                                'MEASURE',
                                                'QUANTITY'

                                            )
                                        );
                                        if ($arCurProduct = $productRes->Fetch()) {
                                            $arProduct = $arCurProduct;
                                            $arProduct['ID'] = $intNewID;
                                            $arProduct['QUANTITY'] = $arCurProduct['QUANTITY'];
                                            $arProduct['QUANTITY_TRACE'] = $arProduct['QUANTITY_TRACE_ORIG'];
                                            $arProduct['CAN_BUY_ZERO'] = $arProduct['CAN_BUY_ZERO_ORIG'];
                                            $arProduct['NEGATIVE_AMOUNT_TRACE'] = $arProduct['NEGATIVE_AMOUNT_TRACE_ORIG'];
                                            if (isset($arProduct['SUBSCRIBE_ORIG'])) {
                                                $arProduct['SUBSCRIBE'] = $arProduct['SUBSCRIBE_ORIG'];
                                            }
                                            foreach ($arProduct as $productKey => $productValue) {
                                                if ($productValue === null)
                                                    unset($arProduct[$productKey]);
                                            }
                                        }

                                    CCatalogProduct::Add($arProduct, false);



                                /* копируем торговые предложения */

                                $obElement = new CIBlockElement();

                                $resOffers = CCatalogSKU::getOffersList(
                                    $ID,
                                    $iblockID = $IBLOCK_ID,
                                    array(),
                                    array("NAME", "SORT", "PROPERTY_SERTIFIKAT", "PROPERTY_DOBAVKI", "PROPERTY_FIBRA", "PROPERTY_SHCHEBEN", "PROPERTY_PLOTNOST", "PROPERTY_EDINICA_IZMERENIYA", "PROPERTY_CML2_LINK", "PROPERTY_FRAKCIA", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "CATALOG_GROUP_1"),
                                    array()
                                );
                                if (!empty($resOffers)) {
                                    $resOffers = array_shift($resOffers);
                                    foreach ($resOffers as $offer) {
                                        $arProp = [];
                                        $arFields = [];
                                        $arProduct = [];
                                        foreach ($offer as $kodProp => $value) {
                                            if (!empty($value)) {
                                                if (strripos($kodProp, "_VALUE") == true && strripos($kodProp, "_VALUE_ID") === false) {
                                                    $originalPropCode = str_replace(array("PROPERTY_", "_VALUE"), "", $kodProp);
                                                    $arProp[$originalPropCode] = array("VALUE" => $value);
                                                } elseif ($kodProp == "PREVIEW_TEXT" || $kodProp == "DETAIL_TEXT") {
                                                    $arFields[$kodProp] = $value;
                                                } elseif ($kodProp == "PREVIEW_PICTURE" || $kodProp == "DETAIL_PICTURE") {
                                                    $arImage = CFile::MakeFileArray($value);
                                                    $arFields[$kodProp] = $arImage;
                                                }elseif($kodProp == "SORT"){
                                                    $arFields[$kodProp] = $value;
                                                }

                                            }
                                        }


                                        $arProp["CML2_LINK"] = $intNewID;

                                        $arFields = array_merge($arFields, array(
                                            'NAME' => $offer["NAME"],
                                            'IBLOCK_ID' => $IBLOCK_OFFER_ID,
                                            'ACTIVE' => 'Y',
                                            'PROPERTY_VALUES' => $arProp,
                                            'DETAIL_TEXT_TYPE' => "html",
                                            'PREVIEW_TEXT_TYPE' => "html",
                                        ));
                                        $intOfferID = $obElement->Add($arFields);
                                        if ($intOfferID) {
                                            $arProduct['ID'] = $intOfferID;
                                            $arProduct['QUANTITY'] = $offer["CATALOG_QUANTITY"];
                                            $arProduct['MEASURE'] = $offer["CATALOG_MEASURE"];
                                            $arProduct['VAT_ID'] = $offer["CATALOG_VAT_ID"];
                                            $arProduct['VAT_INCLUDED'] = $offer["CATALOG_VAT_INCLUDED"];
                                            $arProduct['TYPE'] = $offer["CATALOG_TYPE"];


                                            if (CCatalogProduct::Add($arProduct)) {

                                                $arFieldsPrice = array(
                                                    "PRODUCT_ID" => $intOfferID,
                                                    "CATALOG_GROUP_ID" => 1,
                                                    "PRICE" => $offer["CATALOG_PRICE_1"],
                                                    "CURRENCY" => $offer["CATALOG_CURRENCY_1"],
                                                );

                                                if (!empty($_POST["price_settings"])) {
                                                    switch ($_POST["price_settings"]) {
                                                        case "plus":
                                                            $arFieldsPrice["PRICE"] = $arFieldsPrice["PRICE"] + floatval($_POST["price_number"]);
                                                            break;
                                                        case "minus":
                                                            $arFieldsPrice["PRICE"] = $arFieldsPrice["PRICE"] - floatval($_POST["price_number"]);
                                                            break;
                                                        case "plus_procent":
                                                            $arFieldsPrice["PRICE"] = $arFieldsPrice["PRICE"] + $arFieldsPrice["PRICE"] * (floatval($_POST["price_number"]) / 100);
                                                            break;
                                                        case "minus_procent":
                                                            $arFieldsPrice["PRICE"] = $arFieldsPrice["PRICE"] - $arFieldsPrice["PRICE"] * (floatval($_POST["price_number"]) / 100);
                                                            break;
                                                    }
                                                }


                                                CPrice::Add($arFieldsPrice);
                                            }
                                        }

                                    }
                                }

                                /*  */


                            }
                        }

                    }
                }


            }
            if(!$cronrun){
                LocalRedirect("/test2.php?MESSAGE=Элемент скопирован");
            }

        }

    }

}


?>


<?
if (empty($argv[1])) {
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
}
?>