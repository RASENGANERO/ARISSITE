<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Присоединяйтесь к выгодным условиям поставки строительных материалов от завода «#SELECT_3#».");
$APPLICATION->SetPageProperty("title", "Партнерская программа бетонного завода «#SELECT_3#»");
$APPLICATION->SetTitle("Партнерская программа бетонного завода «#SELECT_3#»");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"faq",
	Array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "100000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "faq",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COUNT_IN_LINE" => "3",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(0=>"",1=>"",),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(0=>"TITLE_BUTTON",1=>"LINK_BUTTON",2=>"",),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"IBLOCK_ID" => "39",
		"IBLOCK_TYPE" => "aspro_max_content",
		"IMAGE_POSITION" => "left",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(0=>"PREVIEW_TEXT",1=>"PREVIEW_PICTURE",2=>"",),
		"LIST_PROPERTY_CODE" => array(0=>"TITLE_BUTTON",1=>"LINK_BUTTON",2=>"",),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"SEF_FOLDER" => "/info/partner/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("news"=>"","section"=>"","detail"=>"",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ASK_QUESTION_BLOCK" => "Y",
		"SHOW_DETAIL_LINK" => "Y",
		"SHOW_SECTION_NAME" => "N",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SHOW_TABS" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N",
		"S_ASK_QUESTION" => "",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"VIEW_TYPE" => "accordion"
	)
);?>

<?
global $arRegion;
$curDir = $APPLICATION->GetCurDir();
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PAGE_URL", "PROPERTY_REVIEWS_CHECK", "PROPERTY_TIZERS_CHECK", "PROPERTY_TIZERS", "PROPERTY_SALE_CHECK", "PROPERTY_SALE_ID", "PROPERTY_CATALOG_CHECK", "PROPERTY_CLIENTS_CHECK", "PROPERTY_CLIENTS", "PROPERTY_STAFF_CHECK", "PROPERTY_STAFF", "PROPERTY_GALLERY_CHECK", "PROPERTY_GALLERY", "PROPERTY_GET_SALE_CHECK", "PROPERTY_SERTIFICATE_CHECK", "PROPERTY_USLUGI_CHECK", "PROPERTY_VOPROS_CHECK", "PROPERTY_OUR_PROJECTS_CHECK", "PROPERTY_OUR_PROJECTS_TITLE", "PROPERTY_OUR_PROJECTS", "PROPERTY_ABOUT_FACTORY_CHECK", "PROPERTY_REVIEWS");
$arFilter = Array("IBLOCK_ID" => 40, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PAGE_URL" => $curDir, "PROPERTY_REGION" => $arRegion["ID"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNextElement();

if (!$ob) {
    $ob = $APPLICATION->IncludeFile("/include/extends_page.php", array(
        'curDir' => $curDir,
        'arFilter' => $arFilter,
        'arSelect' => $arSelect,
    ));
}

if($ob){
    $arFields = $ob->GetFields();

    if($arFields["PROPERTY_TIZERS_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_TIZERS_VALUE"])){?>
        <div class="drag-block container TIZERS  grey_block" data-class="tizers_drag" >
            <?
            global $arRegionLinkFront;
            $arRegionLinkFront["ID"] = $arFields["PROPERTY_TIZERS_VALUE"];
            if(empty($arRegionLinkFront["ID"])){
                $arRegionLinkFront["ID"] = [82, 72, 74, 75];
            }

            ?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "front_tizers",
                array(
                    "IBLOCK_TYPE" => "aspro_max_content",
                    "IBLOCK_ID" => "10",
                    "NEWS_COUNT" => "4",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "FILTER_NAME" => "arRegionLinkFront",
                    "FIELD_CODE" => array(
                        0 => "PREVIEW_PICTURE",
                        1 => "PREVIEW_TEXT",
                        2 => "DETAIL_PICTURE",
                        3 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "ICON",
                        1 => "URL",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "N",
                    "PREVIEW_TRUNCATE_LEN" => "250",
                    "ACTIVE_DATE_FORMAT" => "d F Y",
                    "SET_TITLE" => "N",
                    "SHOW_DETAIL_LINK" => "N",
                    "SET_STATUS_404" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "ajax",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
                    "PAGER_SHOW_ALL" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => "front_tizers",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "STRICT_SECTION_CHECK" => "N",
                    "TYPE_IMG" => "top",
                    "CENTERED" => "Y",
                    "SIZE_IN_ROW" => "4",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "MOBILE_TEMPLATE" => $GLOBALS['arTheme']['MOBILE_TIZERS']['VALUE'],
                    "MESSAGE_404" => ""
                ),
                false
            );?>
        </div>
    <?}

    if($arFields["PROPERTY_SALE_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_SALE_ID_VALUE"])){?>
        <div class="drag-block container grey SALE grey_block" data-class="sale_drag" >
            <?//=CMax::ShowPageType('mainpage', "sale", "block_3_lg_img", true);?>
            <?
            global $arRegionLinkFront;
            $arRegionLinkFront["ID"] = $arFields["PROPERTY_SALE_ID_VALUE"];
            ?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "front_sale2",
                array(
                    "IBLOCK_TYPE" => "aspro_max_content",
                    "IBLOCK_ID" => "24",
                    "NEWS_COUNT" => "3",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FILTER_NAME" => "arRegionLinkFront",
                    "FIELD_CODE" => array(
                        0 => "PREVIEW_PICTURE",
                        1 => "ACTIVE_TO",
                        2 => "DATE_ACTIVE_FROM",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "PERIOD",
                        1 => "SALE_NUMBER",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "N",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "N",
                    "SET_STATUS_404" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "ajax",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
                    "PAGER_SHOW_ALL" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => "front_sale2",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "STRICT_SECTION_CHECK" => "N",
                    "TITLE_BLOCK" => "Выгодные предложения",
                    "TITLE_BLOCK_ALL" => "Все акции",
                    "ALL_URL" => "sale/",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "MOBILE_TEMPLATE" => $GLOBALS['arTheme']['MOBILE_SALE']['VALUE'],
                    "CHECK_REQUEST_BLOCK" => CMax::checkRequestBlock('sale'),
                    "NO_MARGIN" => "N",
                    "TRANSPARENT" => "Y",
                    "FILLED" => "N",
                    "SIZE_IN_ROW" => "3",
                    "TYPE_IMG" => "lg",
                    "IS_AJAX" => CMax::checkAjaxRequest(),
                    "MESSAGE_404" => ""
                ),
                false
            );?>
        </div>
    <?}

    if($arFields["PROPERTY_CATALOG_CHECK_VALUE"] == "Y"){?>
        <div class="drag-block container grey CATALOG_TAB  grey_block js-load-block" data-class="catalog_tab_drag"  data-file="<?=SITE_DIR;?>include/mainpage/components/catalog_tab/type_1.php">
            <?=CMax::ShowPageType('mainpage', "catalog_tab", "type_1", true);?>
        </div>
    <?}

    if($arFields["PROPERTY_SERTIFICATE_CHECK_VALUE"] == "Y"){?>
        <div class="drag-block container sertificate-index" >
            <div class="maxwidth-theme ">
                <h3>Сертификаты ГОСТ</h3>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "slider_sertificate",
                    array(
                        "IBLOCK_TYPE" => "aspro_max_content",
                        "IBLOCK_ID" => "3",
                        "NEWS_COUNT" => "20",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "SET_TITLE" => "N",
                        "SET_BROWSER_TITLE" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "STRICT_SECTION_CHECK" => "N",
                        "SHOW_DATE" => "N",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                        "PAGER_TEMPLATE" => ".default",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "PAGER_TITLE" => "Новости",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "SET_STATUS_404" => "N",
                        "SHOW_404" => "N",
                        "MESSAGE_404" => ""
                    ),
                    false
                );
                ?>
            </div>
        </div>
    <?}?>

    <?php if ($arFields["PROPERTY_OUR_PROJECTS_CHECK_VALUE"] == "Y"):?>
        <?
        if (!empty($arFields['PROPERTY_OUR_PROJECTS_VALUE'])) {
            global $arProjectFilter;
            $arProjectFilter = array(
               'SECTION_ID' => $arFields['PROPERTY_OUR_PROJECTS_VALUE'],
            );
        }
        ?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list", 
            "front_news_slider", 
            array(
                'IBLOCK_TYPE' => 'aspro_max_content',
                'IBLOCK_ID' => '15',
                'NEWS_COUNT' => '2000000',
                'SORT_BY1' => 'SORT',
                'SORT_ORDER1' => 'ASC',
                'SORT_BY2' => 'ID',
                'SORT_ORDER2' => 'DESC',
                'FILTER_NAME' => 'arProjectFilter',
                'FIELD_CODE' => array
                    (
                        0 => 'NAME',
                        1 => 'PREVIEW_TEXT',
                        2 => 'PREVIEW_PICTURE',
                        3 => ''
                    ),
                'PROPERTY_CODE' => array
                    (
                        0 => '',
                        1 => ''
                    ),
                'CHECK_DATES' => 'Y',
                'DETAIL_URL' => '/projects/#SECTION_CODE_PATH#/#ELEMENT_CODE#/',
                'SECTION_URL' => '/projects/#SECTION_CODE_PATH#/',
                'IBLOCK_URL' => '/projects/',
                'AJAX_MODE' => 'N',
                'AJAX_OPTION_JUMP' => 'N',
                'AJAX_OPTION_STYLE' => 'Y',
                'AJAX_OPTION_HISTORY' => 'N',
                'CACHE_TYPE' => 'A',
                'CACHE_TIME' => '100000',
                'CACHE_FILTER' => 'Y',
                'CACHE_GROUPS' => 'N',
                'PREVIEW_TRUNCATE_LEN' => '',
                'ACTIVE_DATE_FORMAT' => 'j F Y',
                'SET_TITLE' => 'N',
                'SET_STATUS_404' => 'N',
                'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
                'ADD_SECTIONS_CHAIN' => 'Y',
                'HIDE_LINK_WHEN_NO_DETAIL' => 'N',
                'PARENT_SECTION' => '',
                'PARENT_SECTION_CODE' => '',
                'DISPLAY_TOP_PAGER' => 'N',
                'DISPLAY_BOTTOM_PAGER' => 'N',
                'PAGER_TITLE' => 'Новости',
                'PAGER_SHOW_ALWAYS' => 'N',
                'PAGER_TEMPLATE' => '.default',
                'PAGER_DESC_NUMBERING' => 'N',
                'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',
                'PAGER_SHOW_ALL' => 'N',
                'DISPLAY_DATE' => '',
                'DISPLAY_NAME' => 'N',
                'IMG_POSITION' => 'right',
                'DISPLAY_PICTURE' => '',
                'DISPLAY_PREVIEW_TEXT' => '',
                'AJAX_OPTION_ADDITIONAL' => '',
                'COMPONENT_TEMPLATE' => 'front_news',
                'SET_META_KEYWORDS' => 'Y',
                'SET_META_DESCRIPTION' => 'Y',
                'INCLUDE_SUBSECTIONS' => 'Y',
                'STRICT_SECTION_CHECK' => 'N',
                'TITLE_BLOCK' => (!empty($arFields['PROPERTY_OUR_PROJECTS_TITLE_VALUE'])) ? $arFields['PROPERTY_OUR_PROJECTS_TITLE_VALUE'] : 'Наши проекты',
                'TITLE_BLOCK_ALL' => '',
                'ALL_URL' => '',
                'SIZE_IN_ROW' => '4',
                'TYPE_IMG' => 'lg',
                'SHOW_SECTION_NAME' => 'Y',
                'BORDERED' => 'Y',
                'FON_BLOCK_2_COLS' => 'N',
                'BG_POSITION' => 'center',
                'INCLUDE_FILE' => '',
                'SHOW_SUBSCRIBE' => 'N',
                'TITLE_SHOW_FON' => 'N',
                'TITLE_SUBSCRIBE' => '',
                'PAGER_BASE_LINK_ENABLE' => 'N',
                'SHOW_404' => 'N',
                'IS_AJAX' => '',
                'MESSAGE_404' => '',
                'USE_PERMISSIONS' => 'N',
                'GROUP_PERMISSIONS' => '',
                'USE_BG_IMAGE_ALTERNATE' => 'N',
                'ALL_BLOCK_BG' => 'Y',
                'USE_SECTIONS_TABS' => 'N',
                'USE_DATE_MIX_TABS' => 'N',
                'BG_GRAY' => 'Y',
            ),
            false
        );?>
    <?php endif;?>



    <?if($arFields["PROPERTY_CLIENTS_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_CLIENTS_VALUE"])){?>
        <div class="container">
            <div class="maxwidth-theme">
                <div class="ordered-block partners with-title">
                    <div class="ordered-block__title option-font-bold font_lg ">Клиенты</div>
                    <?$GLOBALS['arrPartnersFilter'] = array('ID' => $arFields["PROPERTY_CLIENTS_VALUE"]);?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "news-list",
                        array(
                            "IBLOCK_TYPE" => "aspro_max_content",
                            "IBLOCK_ID" => "23",
                            "NEWS_COUNT" => "20",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "ID",
                            "SORT_ORDER2" => "DESC",
                            "FILTER_NAME" => "arrPartnersFilter",
                            "FIELD_CODE" => array(
                                0 => "NAME",
                                1 => "DETAIL_PAGE_URL",
                                2 => "PREVIEW_TEXT",
                                3 => "PREVIEW_PICTURE",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "SITE",
                                1 => "PHONE",
                            ),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_FILTER" => "Y",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                            "CACHE_GROUPS" => "N",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_STATUS_404" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "PAGER_TEMPLATE" => ".default",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "VIEW_TYPE" => "list",
                            "IMAGE_POSITION" => "left",
                            "COUNT_IN_LINE" => "3",
                            "SHOW_TITLE" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "BORDERED" => "Y",
                            "LINKED_MODE" => "Y",
                            "HIDE_SECTION_NAME" => "Y",
                        ),
                        false, array("HIDE_ICONS" => "Y")
                    );?>
                </div></div> </div>
    <?}

    if($arFields["PROPERTY_REVIEWS_CHECK_VALUE"] == "Y"){?>
        <div class="drag-block container grey REVIEWS  grey_block" data-class="reviews_drag" style="padding-top: 50px !important;">
            <?$GLOBALS['arrReviewsFilter'] = !empty($arFields["PROPERTY_REVIEWS_VALUE"]) ? ['ID' => $arFields["PROPERTY_REVIEWS_VALUE"]] : [];?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "front_review",
                array(
                    "IBLOCK_TYPE" => "aspro_max_content",
                    "IBLOCK_ID" => "19",
                    "NEWS_COUNT" => "5",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "FILTER_NAME" => "arrReviewsFilter",
                    "FIELD_CODE" => array(
                        0 => "PREVIEW_TEXT",
                        1 => "PREVIEW_PICTURE",
                        2 => "DETAIL_PICTURE",
                        3 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "",
                        1 => "RATING",
                        2 => "",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "N",
                    "PREVIEW_TRUNCATE_LEN" => "250",
                    "ACTIVE_DATE_FORMAT" => "d F Y",
                    "SET_TITLE" => "N",
                    "SHOW_DETAIL_LINK" => "N",
                    "SET_STATUS_404" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "ajax",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
                    "PAGER_SHOW_ALL" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => "front_review",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "STRICT_SECTION_CHECK" => "N",
                    "TITLE_BLOCK" => "О нас пишут",
                    "TITLE_BLOCK_ALL" => "Все отзывы",
                    "SHOW_ADD_REVIEW" => "Y",
                    "TITLE_ADD_REVIEW" => "Оставить отзыв",
                    "ALL_URL" => "company/reviews/",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "COMPACT" => "Y",
                    "SIZE_IN_ROW" => "3",
                    "MESSAGE_404" => "",
                    "INCLUDE_FILE" => "",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO"
                ),
                false
            );?>
        </div>
    <?}?>

    <?php if ($arFields["PROPERTY_ABOUT_FACTORY_CHECK_VALUE"] == "Y"):?>
        <div class="content_wrapper_block">
            <div class="maxwidth-theme fast-order-box">
                <?php $APPLICATION->IncludeFile("/include/about-factory.php");?>
            </div>
        </div>
    <?php endif;?>

    <?php if($arFields["PROPERTY_GET_SALE_CHECK_VALUE"] == "Y"){?>
        <div class="content_wrapper_block">
            <div class="maxwidth-theme fast-order-box">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    "",
                    Array(
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "CHAIN_ITEM_LINK" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                        "EDIT_URL" => "",
                        "IGNORE_CUSTOM_TEMPLATE" => "N",
                        "LIST_URL" => "",
                        "SEF_MODE" => "N",
                        "SUCCESS_URL" => "",
                        "USE_EXTENDED_ERRORS" => "N",
                        "VARIABLE_ALIASES" => Array("RESULT_ID"=>"RESULT_ID","WEB_FORM_ID"=>"WEB_FORM_ID"),
                        "WEB_FORM_ID" => "13",
                        "SEF_MODE" => "N",
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                    )
                );?>
            </div>
        </div>
    <?}


    if($arFields["PROPERTY_USLUGI_CHECK_VALUE"] == "Y"){?>
        <div class="content_wrapper_block">
            <div class="maxwidth-theme fast-order-box">
                <div class="ordered-block__title option-font-bold font_lg ">Услуги</div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "content-sections",
                    Array(
                        "IMAGE_CATALOG_POSITION" => "left",
                        "SHOW_CHILD_SECTIONS" => "Y",
                        "DEPTH_LEVEL" => 1,
                        "SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
                        "IBLOCK_TYPE"	=>	"aspro_max_content",
                        "IBLOCK_ID"	=>	"34",
                        "NEWS_COUNT"	=>	"20",
                        "SORT_BY1"	=>	"SORT",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "SORT_ORDER1"	=>	"ASC",
                        "SORT_BY2"	=>	"ID",
                        "SORT_ORDER2"	=>	"DESC",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "DETAIL_TEXT",
                            4 => "",
                        ),
                        "PROPERTY_CODE" => array(
                            0 => "PRICE_OLD",
                            1 => "PRICE",
                            2 => "PROP_1",
                            3 => "PROP_2",
                            4 => "",
                        ),
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                    ),
                    $component
                );?>
            </div>
        </div>
    <?}

    if($arFields["PROPERTY_STAFF_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_STAFF_VALUE"])){?>
        <div class="container">
            <div class="maxwidth-theme">
                <div class="ordered-block partners with-title">
                    <div class="ordered-block__title option-font-bold font_lg ">Сотрудники бетонного завода</div>
                    <?$GLOBALS['arrStaffFilter'] = array('ID' => $arFields["PROPERTY_STAFF_VALUE"]);?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "staff_block",
                        array(
                            "IBLOCK_TYPE" => "aspro_max_content",
                            "IBLOCK_ID" => "16",
                            "NEWS_COUNT" => "20",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "ID",
                            "SORT_ORDER2" => "DESC",
                            "FILTER_NAME" => "arrStaffFilter",
                            "FIELD_CODE" => array(
                                0 => "NAME",
                                1 => "DETAIL_PAGE_URL",
                                2 => "PREVIEW_TEXT",
                                3 => "PREVIEW_PICTURE",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "POST",
                                1 => "PHONE",
                                2 => "EMAIL",
                                3 => "SEND_MESSAGE_BUTTON",
                            ),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_FILTER" => "Y",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                            "CACHE_GROUPS" => "N",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_STATUS_404" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "PAGER_TEMPLATE" => ".default",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "VIEW_TYPE" => "list",
                            "IMAGE_POSITION" => "left",
                            "COUNT_IN_LINE" => "3",
                            "SHOW_TITLE" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "BORDERED" => "Y",
                            "LINKED_MODE" => "Y",
                        ),
                        false, array("HIDE_ICONS" => "Y")
                    );?>
                </div></div> </div>
    <?}



    if($arFields["PROPERTY_VOPROS_CHECK_VALUE"] == "Y"){?>
        <div class="content_wrapper_block">
            <div class="maxwidth-theme fast-order-box">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    "inline",
                    Array(
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "CHAIN_ITEM_LINK" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                        "EDIT_URL" => "result_edit.php",
                        "IGNORE_CUSTOM_TEMPLATE" => "N",
                        "LIST_URL" => "result_list.php",
                        "SEF_MODE" => "N",
                        "SUCCESS_URL" => "",
                        "USE_EXTENDED_ERRORS" => "Y",
                        "VARIABLE_ALIASES" => Array("RESULT_ID"=>"RESULT_ID","WEB_FORM_ID"=>"WEB_FORM_ID"),
                        "WEB_FORM_ID" => "1"
                    )
                );?>
            </div>
        </div>
    <?}

    if($arFields["PROPERTY_GALLERY_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_GALLERY_VALUE"])){?>
        <?
//
        foreach ($arFields["PROPERTY_GALLERY_VALUE"] as $fileID){
            $arResult['GALLERY_BIG'][] = array(
                'DETAIL' => ($arPhoto = CFile::GetFileArray($fileID)),
                'PREVIEW' => CFile::ResizeImageGet($fileID, array('width' => 330, 'height' => 350), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true),
                'THUMB' => CFile::ResizeImageGet($fileID , array('width' => 60, 'height' => 60), BX_RESIZE_IMAGE_EXACT, true),
                'TITLE' => (strlen($arPhoto['DESCRIPTION']) ? $arPhoto['DESCRIPTION'] : (strlen($arResult['DETAIL_PICTURE']['TITLE']) ? $arResult['DETAIL_PICTURE']['TITLE']  :(strlen($arPhoto['TITLE']) ? $arPhoto['TITLE'] : $arResult['NAME']))),
                'ALT' => (strlen($arPhoto['DESCRIPTION']) ? $arPhoto['DESCRIPTION'] : (strlen($arResult['DETAIL_PICTURE']['ALT']) ? $arResult['DETAIL_PICTURE']['ALT']  : (strlen($arPhoto['ALT']) ? $arPhoto['ALT'] : $arResult['NAME']))),
            );
        }

        $bShowSmallGallery = "active";

//            echo "<pre>"; print_r($arResult['GALLERY_BIG']); echo "</pre>";
        ?>
        <div class="container">
            <div class="maxwidth-theme">

                <?/*<div class="wraps galerys-block swipeignore  muted777 ordered-block with-title" style="position: relative;">
            <div class="ordered-block__title option-font-bold font_lg">
                Фотогалерея
            </div>
            <?//switch gallery?>
            <div class="switch-item-block">
                <div class="flexbox flexbox--row">
                    <div class="switch-item-block__count muted777 font_xs">
                        <div class="switch-item-block__count-wrapper switch-item-block__count-wrapper--small" <?=($bShowSmallGallery ? "" : "style='display:none;'");?>>
                            <span class="switch-item-block__count-value"><?=count($arResult['GALLERY_BIG']);?></span>
                            <?=GetMessage('T_GALLERY_TITLE');?>
                            <span class="switch-item-block__count-separate">&mdash;</span>
                        </div>
                        <div class="switch-item-block__count-wrapper switch-item-block__count-wrapper--big" <?=($bShowSmallGallery ? "style='display:none;'" : "");?>>
                            <span class="switch-item-block__count-value">1/<?=count($arResult['GALLERY_BIG']);?></span>
                            <?=GetMessage('T_GALLERY_TITLE');?>
                            <span class="switch-item-block__count-separate">&mdash;</span>
                        </div>
                    </div>
                    <div class="switch-item-block__icons-wrapper">
                        <span class="switch-item-block__icons<?=(!$bShowSmallGallery ? ' active' : '');?> switch-item-block__icons--big" title="<?=GetMessage("BIG_GALLERY");?>"><?=CMax::showIconSvg("gallery", SITE_TEMPLATE_PATH."/images/svg/gallery_alone.svg", "", "colored_theme_hover_bg-el-svg", true, false);?></span>
                        <span class="switch-item-block__icons<?=($bShowSmallGallery ? ' active' : '');?> switch-item-block__icons--small" title="<?=GetMessage("SMALL_GALLERY");?>"><?=CMax::showIconSvg("gallery", SITE_TEMPLATE_PATH."/images/svg/gallery_list.svg", "", "colored_theme_hover_bg-el-svg", true, false);?></span>
                    </div>
                </div>
            </div>

            <?//big gallery?>
            <div class="big-gallery-block "<?=($bShowSmallGallery ? ' style="display:none;"' : '');?> >
                <div class="owl-carousel owl-theme owl-bg-nav short-nav" data-slider="content-detail-gallery__slider" data-plugin-options='{"items": "1", "autoplay" : false, "autoplayTimeout" : "3000", "smartSpeed":1000, "dots": true, "nav": true, "loop": false, "rewind":true, "index": true, "margin": 10}'>
                    <?foreach($arResult['GALLERY_BIG'] as $i => $arPhoto):?>
                        <div class="item">
                            <a href="<?=$arPhoto['DETAIL']['SRC']?>" class="fancy" data-fancybox="big-gallery" target="_blank" title="<?=$arPhoto['TITLE']?>">
                                <img data-src="<?=$arPhoto['PREVIEW']['src']?>" src="<?=\Aspro\Functions\CAsproMax::showBlankImg($arPhoto['PREVIEW']['src']);?>" class="img-responsive inline lazy" title="<?=$arPhoto['TITLE']?>" alt="<?=$arPhoto['ALT']?>" />
                            </a>
                        </div>
                    <?endforeach;?>
                </div>
            </div>

            <?//small gallery?>
            <div class="small-gallery-block"<?=($bShowSmallGallery ? '' : ' style="display:none;"');?>>
                <div class="front bigs">
                    <div class="items row">
                        <?foreach($arResult['GALLERY_BIG'] as $i => $arPhoto):?>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="item">
                                    <div class="wrap"><a href="<?=$arPhoto['DETAIL']['SRC']?>" class="fancy" data-fancybox="small-gallery" target="_blank" title="<?=$arPhoto['TITLE']?>">
                                            <img data-src="<?=$arPhoto['PREVIEW']['src']?>" src="<?=\Aspro\Functions\CAsproMax::showBlankImg($arPhoto['PREVIEW']['src']);?>" class="lazy img-responsive inline" title="<?=$arPhoto['TITLE']?>" alt="<?=$arPhoto['ALT']?>" /></a>
                                    </div>
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>

        </div>
        <div class="line-after"></div>
        */?>

                <div class="swipeignore slider_dostavka" style="max-width: 100%; position: relative;">
                    <div class="owl-carousel owl-theme owl-bg-nav sertificate-slider" data-plugin-options='{"dots": true, "nav": true, "loop": false, "rewind":true, "index": true, "margin": 10, "responsive": {"0":{"items": 1, "autoWidth": false, "nav": false, "margin": 0, "autoHeight": true},"601":{"items": 1, "autoWidth": false, "autoHeight": true},"768":{"items": 2, "autoWidth": true, "autoHeight": true},"992":{"items": 4, "autoWidth": true, "autoHeight": true}, "1200":{"items":4, "autoWidth": true, "autoHeight": true}}}'>
                        <?foreach($arResult['GALLERY_BIG'] as $i => $arPhoto){?>
                            <?
                            if(!empty($arPhoto['PREVIEW']['src'])){?>
                                <?
                                $height = $arPhoto['PREVIEW']["height"];
                                $width = $arPhoto['PREVIEW']["width"];
                                $newHeight = 350;
                                $newWidth = floor(($newHeight*$width)/$height);

                                ?>
                                <div class="item" style="width: <?=$newWidth?>px">
                                    <a href="<?=$arPhoto["DETAIL"]["SRC"];?>" data-fancybox="gallery" class="fancy" >
                                        <img src="<?=$arPhoto['PREVIEW']['src'];?>" style="width: 100%;" title="<?=$arPhoto['TITLE']?>" alt="<?=$arPhoto['TITLE']?>"  />
                                    </a>
                                </div>
                            <?}
                            ?>
                        <?}?>
                    </div>
                </div>


            </div></div>
        <?
        $libs = ['fancybox'];
        if ($templateData['USE_SLIDER']) {
            $libs[] = 'owl_carousel';
        }?>
        <?\Aspro\Max\Functions\Extensions::init($libs);?>
    <?}



}
?>
<?php $APPLICATION->IncludeFile("/include/seo_meta.php");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>