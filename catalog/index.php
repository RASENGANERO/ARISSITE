<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Каталог продукции и услуг бетонного завода «#SELECT_3#» в #REGION_NAME_DECLINE_PP#. Большой выбор монолитных строительных материалов оптом и в розницу.");
$APPLICATION->SetPageProperty("title", "Каталог товаров и услуг бетонного завода «#SELECT_3#» в #REGION_NAME_DECLINE_PP#");
$APPLICATION->SetPageProperty("tags", "Каталог, Ассортимент ");
$APPLICATION->SetTitle("Каталог товаров и услуг бетонного завода «#SELECT_3#» в #REGION_NAME_DECLINE_PP#");
?>
<?CMax::AddMeta(
	[
		'og:type' => 'article',
		'og:locale' => 'ru_RU',
		'og:site_name' => '#ZAVOD_NAME#',
	]
);?>
<?
$GLOBALS['MAX_SMART_FILTER'] = $GLOBALS["arRegionLink"];

$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"main", 
	array(
		"REGION" => $GLOBALS["arRegionLink"]["PROPERTY_LINK_REGION"],
		"ACTION_VARIABLE" => "action",
		"ADDITIONAL_GALLERY_OFFERS_PROPERTY_CODE" => "-",
		"ADDITIONAL_GALLERY_PROPERTY_CODE" => "-",
		"ADDITIONAL_GALLERY_TYPE" => "BIG",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_CONTROLS" => "Y",
		"AJAX_FILTER_CATALOG" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"ALSO_BUY_ELEMENT_COUNT" => "5",
		"ALSO_BUY_MIN_BUYES" => "2",
		"ALT_TITLE_GET" => "NORMAL",
		"ASK_FORM_ID" => "2",
		"ASK_TAB" => "Задать вопрос инженеру",
		"BASKET_URL" => "/basket/",
		"BIGDATA_EXT" => "bigdata_1",
		"BIGDATA_SHOW_FROM_SECTION" => "N",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"BLOCK_ADDITIONAL_GALLERY_NAME" => "",
		"BLOCK_BLOG_NAME" => "",
		"BLOCK_DOCS_NAME" => "",
		"BLOCK_LANDINGS_NAME" => "",
		"BLOCK_SERVICES_NAME" => "Услуги",
		"BLOG_IBLOCK_ID" => "17",
		"BLOG_URL" => "catalog_comments",
		"BUNDLE_ITEMS_COUNT" => "3",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"CHEAPER_FORM_NAME" => "Скидка 100₽ с куба на цену конкурента",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"COMPARE_ELEMENT_SORT_FIELD" => "shows",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"COMPARE_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "EDINICA_IZMERENIYA",
			1 => "PLOTNOST",
			2 => "DOBAVKI",
			3 => "FIBRA",
			4 => "FRAKCIA",
			5 => "SHCHEBEN",
			6 => "SERTIFIKAT",
			7 => "NAPOLNITEL",
			8 => "PROPORCII",
			9 => "608",
			10 => "612",
			11 => "621",
			12 => "ARTICLE",
			13 => "COLOR_REF",
			14 => "SIZES",
			15 => "VOLUME",
			16 => "",
		),
		"COMPARE_POSITION" => "top left",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPARE_PROPERTY_CODE" => array(
			0 => "909",
			1 => "910",
			2 => "911",
			3 => "912",
			4 => "913",
			5 => "BRAND",
			6 => "CLASSES",
			7 => "FILLER",
			8 => "STRENGTH",
			9 => "WATER_RESISTANT",
			10 => "BOOM_LENGTH",
			11 => "STIFFNESS",
			12 => "VYSOTA_PODACHI",
			13 => "MAX_FEED_RANGE",
			14 => "FROST",
			15 => "DENSITY",
			16 => "FLUIDITY",
			17 => "PRODUCTIVITY",
			18 => "PROPORCII",
			19 => "PAD_SIZE",
			20 => "FRAKCIYA",
			21 => "845",
			22 => "849",
			23 => "",
		),
		"COMPATIBLE_MODE" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"DEFAULT_COUNT" => "1",
		"DEFAULT_LIST_TEMPLATE" => "block",
		"DELIVERY_CALC" => "Y",
		"DELIVERY_CALC_NAME" => "",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "BUY",
		),
		"DETAIL_ASSOCIATED_TITLE" => "Вас также может заинтересовать",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BLOCKS_ALL_ORDER" => "complect,goods,nabor,offers,desc,char,buy,payment,delivery,video,stores,custom_tab,services,news,blog,reviews,staff,vacancy,gifts",
		"DETAIL_BLOCKS_ORDER" => "complect,nabor,offers,tabs,services,goods,news,blog,staff,vacancy,gifts",
		"DETAIL_BLOCKS_TAB_ORDER" => "desc,char,stores,video,reviews,buy,payment,delivery,custom_tab",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "Y",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_DOCS_PROP" => "INSTRUCTIONS",
		"DETAIL_EXPANDABLES_TITLE" => "Для работы вам потребуется",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"DETAIL_LINKED_GOODS_TABS" => "Y",
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => "",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => "",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "DETAIL_PAGE_URL",
			4 => "",
		),
		"DETAIL_OFFERS_LIMIT" => "0",
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "EDINICA_IZMERENIYA",
			1 => "PLOTNOST",
			2 => "DOBAVKI",
			3 => "FIBRA",
			4 => "FRAKCIA",
			5 => "SHCHEBEN",
			6 => "SERTIFIKAT",
			7 => "NAPOLNITEL",
			8 => "PROPORCII",
			9 => "FRAROMA",
			10 => "ARTICLE",
			11 => "WEIGHT",
			12 => "SPORT",
			13 => "VLAGOOTVOD",
			14 => "AGE",
			15 => "SIZES2",
			16 => "RUKAV",
			17 => "KAPUSHON",
			18 => "FRCOLLECTION",
			19 => "FRLINE",
			20 => "FRFITIL",
			21 => "VOLUME",
			22 => "FRMADEIN",
			23 => "FRELITE",
			24 => "SIZES",
			25 => "SIZES5",
			26 => "SIZES4",
			27 => "SIZES3",
			28 => "TALL",
			29 => "FRFAMILY",
			30 => "FRSOSTAVCANDLE",
			31 => "FRTYPE",
			32 => "FRFORM",
			33 => "COLOR_REF",
			34 => "",
		),
		"DETAIL_PICTURE_MODE" => "MAGNIFIER",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "909",
			1 => "910",
			2 => "911",
			3 => "912",
			4 => "913",
			5 => "BRAND",
			6 => "LINK_SALE",
			7 => "CLASSES",
			8 => "FILLER",
			9 => "STRENGTH",
			10 => "CML2_ARTICLE",
			11 => "WATER_RESISTANT",
			12 => "BOOM_LENGTH",
			13 => "STIFFNESS",
			14 => "VYSOTA_PODACHI",
			15 => "MAX_FEED_RANGE",
			16 => "FROST",
			17 => "LINK_NEWS",
			18 => "VOLUME",
			19 => "DENSITY",
			20 => "FLUIDITY",
			21 => "PRODUCTIVITY",
			22 => "PROPORCII",
			23 => "PAD_SIZE",
			24 => "LINK_STAFF",
			25 => "LINK_BLOG",
			26 => "SERVICES",
			27 => "FRAKCIYA",
			28 => "CVET",
			29 => "845",
			30 => "849",
			31 => "619",
			32 => "620",
			33 => "623",
			34 => "631",
			35 => "618",
			36 => "EXPANDABLES",
			37 => "PROP_2104",
			38 => "PROP_2033",
			39 => "CML2_ATTRIBUTES",
			40 => "COLOR_REF2",
			41 => "PROP_305",
			42 => "PROP_352",
			43 => "PROP_317",
			44 => "PROP_357",
			45 => "PROP_2102",
			46 => "PROP_318",
			47 => "PROP_159",
			48 => "PROP_349",
			49 => "PROP_327",
			50 => "PROP_2052",
			51 => "PROP_370",
			52 => "PROP_336",
			53 => "PROP_2115",
			54 => "PROP_346",
			55 => "PROP_2120",
			56 => "PROP_2053",
			57 => "PROP_363",
			58 => "PROP_320",
			59 => "PROP_2089",
			60 => "PROP_325",
			61 => "PROP_2103",
			62 => "PROP_2085",
			63 => "PROP_300",
			64 => "PROP_322",
			65 => "PROP_362",
			66 => "PROP_365",
			67 => "PROP_359",
			68 => "PROP_284",
			69 => "PROP_364",
			70 => "PROP_356",
			71 => "PROP_343",
			72 => "PROP_2083",
			73 => "PROP_314",
			74 => "PROP_348",
			75 => "PROP_316",
			76 => "PROP_350",
			77 => "PROP_333",
			78 => "PROP_332",
			79 => "PROP_360",
			80 => "PROP_353",
			81 => "PROP_347",
			82 => "PROP_25",
			83 => "PROP_2114",
			84 => "PROP_301",
			85 => "PROP_2101",
			86 => "PROP_2067",
			87 => "PROP_323",
			88 => "PROP_324",
			89 => "PROP_355",
			90 => "PROP_304",
			91 => "PROP_358",
			92 => "PROP_319",
			93 => "PROP_344",
			94 => "PROP_328",
			95 => "PROP_338",
			96 => "PROP_2113",
			97 => "PROP_2065",
			98 => "PROP_366",
			99 => "PROP_302",
			100 => "PROP_303",
			101 => "PROP_2054",
			102 => "PROP_341",
			103 => "PROP_223",
			104 => "PROP_283",
			105 => "PROP_354",
			106 => "PROP_313",
			107 => "PROP_2066",
			108 => "PROP_329",
			109 => "PROP_342",
			110 => "PROP_367",
			111 => "PROP_2084",
			112 => "PROP_340",
			113 => "PROP_351",
			114 => "PROP_368",
			115 => "PROP_369",
			116 => "PROP_331",
			117 => "PROP_337",
			118 => "PROP_345",
			119 => "PROP_339",
			120 => "PROP_310",
			121 => "PROP_309",
			122 => "PROP_330",
			123 => "PROP_2017",
			124 => "PROP_335",
			125 => "PROP_321",
			126 => "PROP_308",
			127 => "PROP_206",
			128 => "PROP_334",
			129 => "PROP_2100",
			130 => "PROP_311",
			131 => "PROP_2132",
			132 => "SHUM",
			133 => "PROP_361",
			134 => "PROP_326",
			135 => "PROP_315",
			136 => "PROP_2091",
			137 => "PROP_2026",
			138 => "PROP_307",
			139 => "PROP_2090",
			140 => "PROP_2027",
			141 => "PROP_2098",
			142 => "PROP_2112",
			143 => "PROP_2122",
			144 => "PROP_221",
			145 => "PROP_24",
			146 => "PROP_2134",
			147 => "PROP_23",
			148 => "PROP_2049",
			149 => "PROP_22",
			150 => "PROP_2095",
			151 => "PROP_2044",
			152 => "PROP_162",
			153 => "PROP_207",
			154 => "PROP_220",
			155 => "PROP_2094",
			156 => "PROP_2092",
			157 => "PROP_2111",
			158 => "PROP_2133",
			159 => "PROP_2096",
			160 => "PROP_2086",
			161 => "PROP_285",
			162 => "PROP_2130",
			163 => "PROP_286",
			164 => "PROP_222",
			165 => "PROP_2121",
			166 => "PROP_2123",
			167 => "PROP_2124",
			168 => "PROP_2093",
			169 => "LINK_REVIEWS",
			170 => "PROP_312",
			171 => "PROP_3083",
			172 => "PROP_2055",
			173 => "PROP_2069",
			174 => "PROP_2062",
			175 => "PROP_2061",
			176 => "RECOMMEND",
			177 => "NEW",
			178 => "STOCK",
			179 => "VIDEO",
			180 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DIR_PARAMS" => CMax::GetDirMenuParametrs(__DIR__),
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_ELEMENT_COUNT" => "N",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"DISPLAY_ELEMENT_SLIDER" => "10",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_WISH_BUTTONS" => "Y",
		"ELEMENT_DETAIL_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "shows",
		"ELEMENT_SORT_FIELD_BOX" => "name",
		"ELEMENT_SORT_FIELD_BOX2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "asc",
		"ELEMENT_SORT_ORDER_BOX" => "asc",
		"ELEMENT_SORT_ORDER_BOX2" => "desc",
		"ELEMENT_TYPE_VIEW" => "FROM_MODULE",
		"FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILE_404" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_NAME" => "MAX_SMART_FILTER",
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "608",
			2 => "612",
			3 => "COLOR",
			4 => "CML2_LINK",
			5 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "BASE",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "IN_STOCK",
			1 => "CML2_ARTICLE",
			2 => "",
		),
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FORUM_ID" => "1",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "8",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "26",
		"IBLOCK_LINK_NEWS_ID" => "20",
		"IBLOCK_LINK_REVIEWS_ID" => "19",
		"IBLOCK_SERVICES_ID" => "34",
		"IBLOCK_STOCK_ID" => "24",
		"IBLOCK_TIZERS_ID" => "10",
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"INSTANT_RELOAD" => "N",
		"LABEL_PROP" => "",
		"LANDING_IBLOCK_ID" => "29",
		"LANDING_POSITION" => "BEFORE_PRODUCTS",
		"LANDING_SEARCH_COUNT" => "7",
		"LANDING_SEARCH_COUNT_MOBILE" => "3",
		"LANDING_SEARCH_TITLE" => "Похожие запросы",
		"LANDING_SECTION_COUNT" => "10",
		"LANDING_SECTION_COUNT_MOBILE" => "3",
		"LANDING_TITLE" => "Популярные категории",
		"LANDING_TYPE_VIEW" => "FROM_MODULE",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "4",
		"LINKED_ELEMENT_TAB_SORT_FIELD" => "sort",
		"LINKED_ELEMENT_TAB_SORT_FIELD2" => "id",
		"LINKED_ELEMENT_TAB_SORT_ORDER" => "asc",
		"LINKED_ELEMENT_TAB_SORT_ORDER2" => "desc",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_DISPLAY_POPUP_IMAGE" => "Y",
		"LIST_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "CML2_LINK",
			2 => "DOBAVKI",
			3 => "FIBRA",
			4 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "EDINICA_IZMERENIYA",
			1 => "PLOTNOST",
			2 => "DOBAVKI",
			3 => "FIBRA",
			4 => "FRAKCIA",
			5 => "SHCHEBEN",
			6 => "SERTIFIKAT",
			7 => "",
		),
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"LIST_PROPERTY_CODE" => array(
			0 => "909",
			1 => "910",
			2 => "911",
			3 => "912",
			4 => "913",
			5 => "BRAND",
			6 => "CLASSES",
			7 => "FILLER",
			8 => "STRENGTH",
			9 => "CML2_ARTICLE",
			10 => "WATER_RESISTANT",
			11 => "BOOM_LENGTH",
			12 => "VYSOTA_PODACHI",
			13 => "MAX_FEED_RANGE",
			14 => "FROST",
			15 => "PODBORKI",
			16 => "FLUIDITY",
			17 => "PRODUCTIVITY",
			18 => "PROPORCII",
			19 => "PAD_SIZE",
			20 => "FRAKCIYA",
			21 => "845",
			22 => "849",
			23 => "619",
			24 => "620",
			25 => "631",
			26 => "618",
			27 => "623",
			28 => "",
		),
		"LIST_PROPERTY_CODE_MOBILE" => "",
		"LIST_SECTIONS_TYPE_VIEW" => "sections_1",
		"LIST_SHOW_SLIDER" => "Y",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MAIN_TITLE" => "Наличие на складах",
		"MAX_AMOUNT" => "20",
		"MAX_GALLERY_ITEMS" => "5",
		"MAX_IMAGE_SIZE" => "5",
		"MESSAGES_PER_PAGE" => "5",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MIN_AMOUNT" => "10",
		"NO_WORD_LOGIC" => "Y",
		"OFFERS_CART_PROPERTIES" => array(
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "asc",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_HIDE_NAME_PROPS" => "N",
		"OFFER_SHOW_PREVIEW_PICTURE_PROPS" => array(
		),
		"OFFER_TREE_PROPS" => array(
			0 => "EDINICA_IZMERENIYA",
			1 => "DOBAVKI",
			2 => "FIBRA",
			3 => "FRAKCIA",
			4 => "SHCHEBEN",
		),
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "16",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"POST_FIRST_MESSAGE" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTIES_DISPLAY_LOCATION" => "TAB",
		"PROPERTIES_DISPLAY_TYPE" => "TABLE",
		"RECOMEND_COUNT" => "5",
		"RESTART" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"SALE_STIKER" => "SALE_TEXT",
		"SECTIONS_LIST_PREVIEW_DESCRIPTION" => "Y",
		"SECTIONS_LIST_PREVIEW_PROPERTY" => "UF_SECTION_DESCR",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_TYPE_VIEW" => "FROM_MODULE",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_BG" => "UF_SECTION_BG_IMG",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_DISPLAY_PROPERTY" => "UF_SECTION_TEMPLATE",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SECTION_PREVIEW_PROPERTY" => "DESCRIPTION",
		"SECTION_TOP_BLOCK_TITLE" => "Лучшие предложения",
		"SECTION_TOP_DEPTH" => "2",
		"SECTION_TYPE_VIEW" => "FROM_MODULE",
		"SEF_FOLDER" => "/catalog/",
		"SEF_MODE" => "Y",
		"SEND_GIFT_FORM_NAME" => "",
		"SET_LAST_MODIFIED" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SHOW_ADDITIONAL_TAB" => "N",
		"SHOW_ARTICLE_SKU" => "Y",
		"SHOW_ASK_BLOCK" => "Y",
		"SHOW_BRAND_PICTURE" => "Y",
		"SHOW_BUY_DELIVERY" => "Y",
		"SHOW_CHEAPER_FORM" => "Y",
		"SHOW_COUNTER_LIST" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DELIVERY" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "Y",
		"SHOW_DISCOUNT_TIME" => "Y",
		"SHOW_DISCOUNT_TIME_EACH_SKU" => "Y",
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GALLERY" => "N",
		"SHOW_GARANTY" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"SHOW_HINTS" => "Y",
		"SHOW_HOW_BUY" => "Y",
		"SHOW_KIT_PARTS" => "Y",
		"SHOW_KIT_PARTS_PRICES" => "Y",
		"SHOW_LANDINGS" => "Y",
		"SHOW_LANDINGS_SEARCH" => "Y",
		"SHOW_LINK_TO_FORUM" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_MEASURE" => "Y",
		"SHOW_MEASURE_WITH_RATIO" => "Y",
		"SHOW_MORE_SUBSECTIONS" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_ONE_CLICK_BUY" => "Y",
		"SHOW_PAYMENT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_PROPS" => "Y",
		"SHOW_QUANTITY" => "Y",
		"SHOW_QUANTITY_COUNT" => "Y",
		"SHOW_RATING" => "N",
		"SHOW_SECTION_DESC" => "Y",
		"SHOW_SECTION_LIST_PICTURES" => "Y",
		"SHOW_SECTION_PICTURES" => "Y",
		"SHOW_SECTION_SIBLINGS" => "Y",
		"SHOW_SEND_GIFT" => "N",
		"SHOW_SIDE_BLOCK_LAST_LEVEL" => "N",
		"SHOW_SKU_DESCRIPTION" => "N",
		"SHOW_SMARTSEO_TAGS" => "Y",
		"SHOW_SORT_IN_FILTER" => "Y",
		"SHOW_SUBSECTION_DESC" => "Y",
		"SHOW_TOP_ELEMENTS" => "Y",
		"SHOW_UNABLE_SKU_PROPS" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SKU_DETAIL_ID" => "",
		"SMARTSEO_TAGS_COUNT" => "10",
		"SMARTSEO_TAGS_COUNT_MOBILE" => "3",
		"SORT_BUTTONS" => array(
			0 => "PRICE",
			1 => "CUSTOM",
			2 => "STRENGTH",
		),
		"SORT_PRICES" => "REGION_PRICE",
		"SORT_REGION_PRICE" => "BASE",
		"STAFF_IBLOCK_ID" => "16",
		"STAFF_VIEW_TYPE" => "staff_block",
		"STIKERS_PROP" => "HIT",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"STORES_FILTER" => "TITLE",
		"STORES_FILTER_ORDER" => "SORT_ASC",
		"STORE_PATH" => "/contacts/stores/#store_id#/",
		"SUBSECTION_PREVIEW_PROPERTY" => "DESCRIPTION",
		"TAB_CHAR_NAME" => "",
		"TAB_DESCR_NAME" => "",
		"TAB_DOPS_NAME" => "",
		"TAB_FAQ_NAME" => "",
		"TAB_KOMPLECT_NAME" => "",
		"TAB_NABOR_NAME" => "",
		"TAB_NEWS_NAME" => "",
		"TAB_OFFERS_NAME" => "",
		"TAB_REVIEW_NAME" => "",
		"TAB_STAFF_NAME" => "Сотрудники бетонного завода в #REGION_NAME_DECLINE_PP#",
		"TAB_STOCK_NAME" => "",
		"TAB_VACANCY_NAME" => "",
		"TAB_VIDEO_NAME" => "",
		"TEMPLATE_THEME" => "blue",
		"TITLE_BUY_DELIVERY" => "Оплата и доставка",
		"TITLE_DELIVERY" => "Доставка",
		"TITLE_GARANTY" => "Условия гарантии",
		"TITLE_HOW_BUY" => "Как купить",
		"TITLE_PAYMENT" => "Оплата",
		"TITLE_SLIDER" => "Рекомендуем",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ELEMENT_COUNT" => "8",
		"TOP_ELEMENT_SORT_FIELD" => "shows",
		"TOP_ELEMENT_SORT_FIELD2" => "sort",
		"TOP_ELEMENT_SORT_ORDER" => "desc",
		"TOP_ELEMENT_SORT_ORDER2" => "asc",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_LINE_ELEMENT_COUNT" => "4",
		"TOP_OFFERS_FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"TOP_OFFERS_LIMIT" => "0",
		"TOP_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_PROPERTY_CODE_MOBILE" => "",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"TOP_VIEW_MODE" => "SECTION",
		"URL_TEMPLATES_READ" => "",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USER_FIELDS" => array(
			0 => "",
			1 => "UF_CATALOG_ICON",
			2 => "",
		),
		"USE_ADDITIONAL_GALLERY" => "Y",
		"USE_ALSO_BUY" => "Y",
		"USE_BIG_DATA" => "Y",
		"USE_BIG_DATA_IN_SEARCH" => "N",
		"USE_CAPTCHA" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "Y",
		"USE_CUSTOM_RESIZE" => "N",
		"USE_DETAIL_PREDICTION" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "Y",
		"USE_FILTER_PRICE" => "N",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"USE_MIN_AMOUNT" => "N",
		"USE_ONLY_MAX_AMOUNT" => "Y",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_RATING" => "N",
		"USE_RATIO_IN_RANGES" => "Y",
		"USE_REVIEW" => "N",
		"USE_SALE_BESTSELLERS" => "Y",
		"USE_SHARE" => "Y",
		"USE_STORE" => "Y",
		"USE_STORE_PHONE" => "Y",
		"USE_STORE_SCHEDULE" => "Y",
		"VACANCY_IBLOCK_ID" => "2",
		"VIEWED_BLOCK_TITLE" => "Ранее вы смотрели",
		"VIEWED_ELEMENT_COUNT" => "20",
		"VIEW_BLOCK_TYPE" => "N",
		"VISIBLE_PROP_COUNT" => "6",
		"COMPONENT_TEMPLATE" => "main",
		"MODULES_ELEMENT_COUNT" => "10",
		"DETAIL_SET_PRODUCT_TITLE" => "Собрать комплект",
		"DISPLAY_LINKED_PAGER" => "Y",
		"TAB_BUY_SERVICES_NAME" => "",
		"COUNT_SERVICES_IN_ANNOUNCE" => "2",
		"SHOW_ALL_SERVICES_IN_SLIDE" => "N",
		"BIGDATA_EXT_BOTTOM" => "bigdata_bottom_1",
		"BIGDATA_COUNT" => "5",
		"BIGDATA_TYPE_VIEW" => "FROM_MODULE",
		"MAX_IMAGE_COUNT" => "10",
		"NO_USE_IMAGE" => "N",
		"REVIEW_COMMENT_REQUIRED" => "Y",
		"REVIEW_FILTER_BUTTONS" => array(
		),
		"REAL_CUSTOMER_TEXT" => "",
		"USE_COMPARE_GROUP" => "N",
		"SHOW_SORT_RANK_BUTTON" => "Y",
		"HIDE_SUBSECTIONS_LIST" => "N",
		"USE_LANDINGS_GROUP" => "N",
		"LANDINGS_GROUP_FROM_SEO" => "N",
		"SMARTSEO_TAGS_BY_GROUPS" => "N",
		"SMARTSEO_TAGS_SHOW_DEACTIVATED" => "N",
		"SMARTSEO_TAGS_SORT" => "SORT",
		"SMARTSEO_TAGS_LIMIT" => "",
		"DISPLAY_LINKED_ELEMENT_SLIDER_CROSSLINK" => "",
		"SHOW_KIT_ALL" => "N",
		"VISIBLE_PROP_WITH_OFFER" => "N",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><?$APPLICATION->IncludeComponent(
	"intervolga:tips.activator",
	"popover",
	Array(
		"CACHE_TIME" => "2592000",
		"CACHE_TYPE" => "A",
		"HINT_STYLE" => "DASHED",
		"POSITION" => "TOP_LEFT"
	)
);?>

    </div>
    </div>
    </div>
    </div>
    </div>
<div class="middle  ">

<?

if (empty($_GET['PAGEN_1'])): 

global $arRegion;
$curDir = $APPLICATION->GetCurDir();


if($_SERVER["SCRIPT_URL"] == "/catalog/compare.php"){
    $curDir = $_SERVER["REQUEST_URI"];
}
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PAGE_URL", "PROPERTY_REVIEWS_CHECK", "PROPERTY_TIZERS_CHECK", "PROPERTY_TIZERS", "PROPERTY_SALE_CHECK", "PROPERTY_SALE_ID", "PROPERTY_CATALOG_CHECK", "PROPERTY_CLIENTS_CHECK", "PROPERTY_CLIENTS", "PROPERTY_STAFF_CHECK", "PROPERTY_STAFF", "PROPERTY_GALLERY_CHECK", "PROPERTY_GALLERY", "PROPERTY_GET_SALE_CHECK", "PROPERTY_SERTIFICATE_CHECK", "PROPERTY_USLUGI_CHECK", "PROPERTY_VOPROS_CHECK", "PROPERTY_OUR_PROJECTS_CHECK", "PROPERTY_OUR_PROJECTS_TITLE", "PROPERTY_OUR_PROJECTS", "PROPERTY_ABOUT_FACTORY_CHECK", "PROPERTY_FAQ_CHECK", "PROPERTY_REVIEWS", "PROPERTY_PRICE", "PROPERTY_CONCRETE_GRADES_CHECK");
$arFilter = Array("IBLOCK_ID" => 40, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PAGE_URL" => $curDir, "PROPERTY_REGION" => $arRegion["ID"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

$ob = $res->GetNextElement();

$not_extends_parent = $APPLICATION->GetPageProperty("not_extends_parent");

if (!$ob && !isset($_GET['ajax_get']) && !$not_extends_parent && !isset($_GET['FAST_VIEW'])) {
	$ob = $APPLICATION->IncludeFile("/include/extends_page.php", array(
		'curDir' => $curDir,
		'arFilter' => $arFilter,
		'arSelect' => $arSelect,
	));
}

if($ob){
    $arFields = $ob->GetFields();

    if($arFields["PROPERTY_TIZERS_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_TIZERS_VALUE"])){?>
        <div class="drag-block container TIZERS  grey_block" data-class="tizers_drag" style="padding-top: 50px!important;">
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

    <?php if ($arFields["PROPERTY_ABOUT_FACTORY_CHECK_VALUE"] == "Y"):?>
	    <div class="content_wrapper_block">
	        <div class="maxwidth-theme fast-order-box">
	            <?php $APPLICATION->IncludeFile("/include/about-factory.php");?>
	        </div>
	    </div>
	<?php endif?>

    <?php if($arFields["PROPERTY_USLUGI_CHECK_VALUE"] == "Y"){?>
        <div class="content_wrapper_block">
            <div class="maxwidth-theme uslugi-box">
                <h2 class="uslugi-title">Услуги</h2>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "front_news_slider",
                    Array(
                        "IMAGE_CATALOG_POSITION" => "left",
                        "SHOW_CHILD_SECTIONS" => "Y",
                        "DEPTH_LEVEL" => 1,
                        "SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
                        "IBLOCK_TYPE"	=>	"aspro_max_content",
                        "IBLOCK_ID"	=>	"34",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "NEWS_COUNT"	=>	"20",
                        "SORT_BY1"	=>	"SORT",
                        "SORT_ORDER1"	=>	"ASC",
                        "SORT_BY2"	=>	"ID",
                        "SORT_ORDER2"	=>	"DESC",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_PICTURE",
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
                    "CENTERED" => "Y",
                    "SIZE_IN_ROW" => "4",
                    "PAGER_BASE_LINK_ENABLE" => "N",
					'ALL_BLOCK_BG' => 'Y',
					'TITLE_SHOW_FON' => 'N',
          ),
                    $component
                );?>
            </div>
        </div>
    <?}?>

    <?php if(isset($GLOBALS['SECTION_VIDEO_CODE']['ID'])) {?>
<div class="container"><div class="maxwidth-theme section-video-gallery-block" >
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:highloadblock.list",
                    "gallery",
                    array(
					"BLOCK_ID" => 13, 
					"PAGEN_ID" => "", 
					"FILTER_NAME" => "SECTION_VIDEO_CODE",
                    ),
                    false
                );
                ?>
</div></div>
	<?}?>

    <?php if ($arFields["PROPERTY_CONCRETE_GRADES_CHECK_VALUE"] == "Y"):?>
	    <?php $APPLICATION->IncludeFile("/include/concrete-grades-for-catalog.php");?>

	    <div class="drag-block container CATALOG_SECTIONS <?=$bCatalogSectionsIndexClass;?> js-load-block loader_circle" data-class="catalog_sections_drag" data-order="0" data-file="<?=SITE_DIR;?>include/mainpage/components/catalog_sections/front_sections_only.php">
            <?=CMax::ShowPageType('mainpage', 'catalog_sections', 'front_sections_only');?>
        </div>
	<?php endif?>
	
    <?php if(!empty($arFields["PROPERTY_PRICE_VALUE"])) {?>
       <?
      	global $arrFilterPrice;
      	$priceID = null;
      	$priceNotProductLink = false;
      	$priceTitle = '';
		$arrFilterPrice["PROPERTY_LINK_REGION"] = $arRegion["ID"];

		$arSelect = ["ID", "IBLOCK_ID", "PROPERTY_CATALOG_SECTION", "PROPERTY_PRICE_TITLE", "PROPERTY_NOT_PRODUCT_LINK"];
		$arFilter = ["IBLOCK_ID" => 44, "ACTIVE"=>"Y", "ID" => $arFields["PROPERTY_PRICE_VALUE"]];
		$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
		if ($ob = $res->GetNextElement()){ 
		 	$arProps = $ob->GetProperties();
		 	
			if (!empty($arProps['CATALOG_SECTION']['VALUE'])) {
				$priceID = $arProps['CATALOG_SECTION']['VALUE'];
			}

			if (!empty($arProps['PRICE_TITLE']['VALUE'])) {
				$priceTitle = $arProps['PRICE_TITLE']['VALUE'];
			}

			if (!empty($arProps['NOT_PRODUCT_LINK']['VALUE'])) {
				$priceNotProductLink = boolval($arProps['NOT_PRODUCT_LINK']['VALUE']);
			}
		}

		if (!empty($priceID)):

		$APPLICATION->IncludeComponent(
		    "beton-gost:quick.basket",
		    "main_page",
		    Array(
		        "ACTION_VARIABLE" => "action",
		        "ADD_PICT_PROP" => "-",
		        "ADD_PROPERTIES_TO_BASKET" => "Y",
		        "ADD_SECTIONS_CHAIN" => "N",
		        "ADD_TO_BASKET_ACTION" => "ADD",
		        "AJAX_MODE" => "N",
		        "AJAX_OPTION_ADDITIONAL" => "",
		        "AJAX_OPTION_HISTORY" => "N",
		        "AJAX_OPTION_JUMP" => "N",
		        "AJAX_OPTION_STYLE" => "Y",
		        "BACKGROUND_IMAGE" => "-",
		        "BASKET_URL" => "/personal/basket.php",
		        "BROWSER_TITLE" => "-",
		        "CACHE_FILTER" => "Y",
		        "CACHE_GROUPS" => "N",
		        "CACHE_TIME" => "36000000",
		        "CACHE_TYPE" => "A",
		        "COMPATIBLE_MODE" => "Y",
		        "CONVERT_CURRENCY" => "N",
		        "CUSTOM_FILTER" => "",
		        "DETAIL_URL" => "",
		        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
		        "DISPLAY_BOTTOM_PAGER" => "N",
		        "DISPLAY_COMPARE" => "N",
		        "DISPLAY_TOP_PAGER" => "N",
		        "ELEMENT_SORT_FIELD" => "sort",
		        "ELEMENT_SORT_FIELD2" => "id",
		        "ELEMENT_SORT_ORDER" => "asc",
		        "ELEMENT_SORT_ORDER2" => "desc",
		        "ENLARGE_PRODUCT" => "STRICT",
		        "FILTER_NAME" => "arrFilterPrice",
		        "HIDE_NOT_AVAILABLE" => "Y",
		        "HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		        "IBLOCK_ID" => "26",
		        "IBLOCK_TYPE" => "aspro_max_catalog",
		        "INCLUDE_SUBSECTIONS" => "Y",
		        "LABEL_PROP" => array(),
		        "LAZY_LOAD" => "N",
		        "LINE_ELEMENT_COUNT" => "3",
		        "LOAD_ON_SCROLL" => "N",
		        "MESSAGE_404" => "",
		        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
		        "MESS_BTN_BUY" => "Купить",
		        "MESS_BTN_DETAIL" => "Подробнее",
		        "MESS_BTN_SUBSCRIBE" => "Подписаться",
		        "MESS_NOT_AVAILABLE" => "Нет в наличии",
		        "META_DESCRIPTION" => "-",
		        "META_KEYWORDS" => "-",
		        "OFFERS_CART_PROPERTIES" => array(),
		        "OFFERS_FIELD_CODE" => array("", ""),
		        "OFFERS_LIMIT" => "5",
		        "OFFERS_PROPERTY_CODE" => array("", ""),
		        "OFFERS_SORT_FIELD" => "SCALED_PRICE_1",
		        "OFFERS_SORT_FIELD2" => "id",
		        "OFFERS_SORT_ORDER" => "asc",
		        "OFFERS_SORT_ORDER2" => "desc",
		        "PAGER_BASE_LINK_ENABLE" => "N",
		        "PAGER_DESC_NUMBERING" => "N",
		        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		        "PAGER_SHOW_ALL" => "N",
		        "PAGER_SHOW_ALWAYS" => "N",
		        "PAGER_TEMPLATE" => ".default",
		        "PAGER_TITLE" => "Товары",
		        "PAGE_ELEMENT_COUNT" => "100000",
		        "PARTIAL_PRODUCT_PROPERTIES" => "N",
		        "PRICE_CODE" => array("BASE"),
		        "PRICE_VAT_INCLUDE" => "Y",
		        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		        "PRODUCT_DISPLAY_MODE" => "N",
		        "PRODUCT_ID_VARIABLE" => "id",
		        "PRODUCT_PROPERTIES" => array("BRAND", "CLASSES"),
		        "PRODUCT_PROPS_VARIABLE" => "prop",
		        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
		        "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		        "PRODUCT_SUBSCRIPTION" => "Y",
		        "PROPERTY_CODE" => array("", ""),
		        "PROPERTY_CODE_MOBILE" => array(),
		        "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		        "RCM_TYPE" => "personal",
		        "SECTION_CODE" => "",
		        "SECTION_CODE_PATH" => "",
		        "SECTION_ID" => $_REQUEST["SECTION_ID"],
		        "SECTION_ID_VARIABLE" => "SECTION_ID",
		        "SECTION_URL" => "",
		        "SECTION_USER_FIELDS" => array("", ""),
		        "SEF_MODE" => "N",
		        "SEF_RULE" => "",
		        "SET_BROWSER_TITLE" => "N",
		        "SET_LAST_MODIFIED" => "N",
		        "SET_META_DESCRIPTION" => "N",
		        "SET_META_KEYWORDS" => "N",
		        "SET_STATUS_404" => "N",
		        "SET_TITLE" => "N",
		        "SHOW_404" => "N",
		        "SHOW_ALL_WO_SECTION" => "N",
		        "SHOW_CLOSE_POPUP" => "N",
		        "SHOW_DISCOUNT_PERCENT" => "N",
		        "SHOW_FROM_SECTION" => "N",
		        "SHOW_MAX_QUANTITY" => "N",
		        "SHOW_OLD_PRICE" => "N",
		        "SHOW_PRICE_COUNT" => "1",
		        "SHOW_SLIDER" => "Y",
		        "SLIDER_INTERVAL" => "3000",
		        "SLIDER_PROGRESS" => "N",
		        "TEMPLATE_THEME" => "blue",
		        "USE_ENHANCED_ECOMMERCE" => "N",
		        "USE_MAIN_ELEMENT_SECTION" => "N",
		        "USE_PRICE_COUNT" => "N",
		        "USE_PRODUCT_QUANTITY" => "N",
		        "CATALOG_SECTION_ID" => $priceID,
		        "PRICE_TITLE" => $priceTitle,
		        "NOT_PRODUCT_LINK" => $priceNotProductLink,
		        "ON_MAIN" => "Y"
		    )
		);

		endif;
	}?>

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

    <?php if($arFields["PROPERTY_CLIENTS_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_CLIENTS_VALUE"])){?>
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
    	<?php
    		if (!empty($arFields["PROPERTY_REVIEWS_VALUE"])) {
    			$GLOBALS['arrReviewsFilter'] = !empty($arFields["PROPERTY_REVIEWS_VALUE"]) ? ['ID' => $arFields["PROPERTY_REVIEWS_VALUE"]] : [];
    		} else {
				$arReviewsFilter = array('IBLOCK_ID' => '19', 'ACTIVE' => 'Y');
				$arReviewsIds = CMaxCache::CIBLockElement_GetList(
						array(
						'CACHE' => array(
								'TAG' => CMaxCache::GetIBlockCacheTag($arReviewsFilter["IBLOCK_ID"]),
								'RESULT' => array('ID'),
								'MULTI' => 'Y',
							)
						),
						array_merge($arReviewsFilter, $GLOBALS['arRegionLink']),
						false,
						false,
						array('ID')
					);
				$arReviewsIds = is_array($arReviewsIds) && count($arReviewsIds) > 0 ? $arReviewsIds : [];
				$arReviews2Ids = CMaxCache::CIBLockElement_GetList(
						array(
							'CACHE' => array(
								'TAG' => CMaxCache::GetIBlockCacheTag($arReviewsFilter["IBLOCK_ID"]),
								'RESULT' => array('ID'),
								'MULTI' => 'Y',
							)
						),
						array_merge($arReviewsFilter, ["PROPERTY_LINK_REGION" => false]),
						false,
						false,
						array('ID')
					);
				if(is_array($arReviews2Ids) && count($arReviews2Ids) > 0) {
					$arReviewsIds = array_merge($arReviewsIds, $arReviews2Ids);
				}
				if(count($arReviewsIds) > 0) {
					$GLOBALS['arrReviewsFilter'] = ['ID' => $arReviewsIds];
				}
    		}
    	?>
        <div class="drag-block container grey REVIEWS  grey_block" data-class="reviews_drag" style="padding-top: 50px !important;">
        	<?//$GLOBALS['arrReviewsFilter'] = !empty($arFields["PROPERTY_REVIEWS_VALUE"]) ? ['ID' => $arFields["PROPERTY_REVIEWS_VALUE"]] : [];?>
            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	empty($arFields["PROPERTY_REVIEWS_VALUE"]) ? "front_review_catalog" : "front_review", 
	array(
		"IBLOCK_TYPE" => "aspro_max_content",
		"IBLOCK_ID" => "19",
		"NEWS_COUNT" => "200",
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
			0 => "RATING",
			1 => "",
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
		"TITLE_BLOCK" => "Отзывы клиентов",
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
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CATALOG_SECTION_ID" => $APPLICATION->GetPageProperty("CATALOG_SECTION_ID"),
	),
	false
);?>
        </div>
    <?}?>
    
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
    <?}?>

	<?php if($arFields["PROPERTY_FAQ_CHECK_VALUE"] == "Y"): ?>
    <div class="maxwidth-theme fast-order-box">
	    <?$APPLICATION->IncludeComponent(
		"bitrix:news", 
		"faq", 
		array(
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
			"DETAIL_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"DETAIL_PAGER_SHOW_ALL" => "Y",
			"DETAIL_PAGER_TEMPLATE" => "",
			"DETAIL_PAGER_TITLE" => "Страница",
			"DETAIL_PROPERTY_CODE" => array(
				0 => "TITLE_BUTTON",
				1 => "LINK_BUTTON",
				2 => "",
			),
			"DETAIL_SET_CANONICAL_URL" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
			"IBLOCK_ID" => "5",
			"IBLOCK_TYPE" => "aspro_max_content",
			"IMAGE_POSITION" => "left",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"LIST_FIELD_CODE" => array(
				0 => "PREVIEW_TEXT",
				1 => "PREVIEW_PICTURE",
				2 => "",
			),
			"LIST_PROPERTY_CODE" => array(
				0 => "TITLE_BUTTON",
				1 => "LINK_BUTTON",
				2 => "",
			),
			"MESSAGE_404" => "",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"NEWS_COUNT" => "20000",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PREVIEW_TRUNCATE_LEN" => "",
			"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
			"SEF_FOLDER" => "/info/faq/",
			"SEF_MODE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
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
			"VIEW_TYPE" => "accordion",
			"SEF_URL_TEMPLATES" => array(
				"news" => "",
				"section" => "",
				"detail" => "",
			),
			"CATALOG_SECTION_ID" => $APPLICATION->GetPageProperty("CATALOG_SECTION_ID"),
			"CLASS" => "mb-3",
			"SHOW_TITLE_FAQ" => "Y",
			"T_TITLE_FAQ" => "Вопросы и ответы",
		),
		false
		);?>
	</div>
	<?php endif;?>

    <?if($arFields["PROPERTY_STAFF_CHECK_VALUE"] == "Y" && !empty($arFields["PROPERTY_STAFF_VALUE"])){?>
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
                                    <a itemscope itemtype="https://schema.org/ImageObject" href="<?=$arPhoto["DETAIL"]["SRC"];?>" data-fancybox="gallery" class="fancy" >
                                        <img  class="lazy" data-replace="<?=$arPhoto["DETAIL"]["SRC"];?>" src="<?=$arPhoto["DETAIL"]["SRC"];?>" <?=\Helper\CHelperCommon::getSrcSet($arPhoto['DETAIL']['ID'], 537, 350);?> style="width: 100%;" title="<?=$arPhoto['TITLE']?>" alt="<?=$arPhoto['TITLE']?>" decoding="async" itemprop="contentUrl" />
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

endif;
?>

</div>


<script>
	try {
		fetch('/sotbit_seometa_ajax.php')
		.then((response) => {
		   return response.json();
		})
		.then((data) => {
			if (Object.keys(data).length) {
				window.onpopstate = function(event) {
				    var url = new URL(document.location.href);
				    var pathname = url.pathname;
				    if (data.hasOwnProperty(pathname)) {
				    	window.location = data[pathname];
				    }
				}
			}
		});
	} catch (e) {
		console.log(e.message);
	}
</script>

<?
	$metaData = [];
	if (!$APPLICATION->GetPageProperty("twitter:description")) {
		$metaData['twitter:description'] = $metaData['og:description'] = $APPLICATION->GetPageProperty("description");
	}

	if (!$APPLICATION->GetPageProperty("twitter:title")) {
		$metaData['twitter:title'] = $metaData['og:title'] = $APPLICATION->GetPageProperty("title");
	}

	if ($metaData) {
		CMax::AddMeta(
			$metaData
		);
	}
?>
<?\Aspro\Max\Functions\Extensions::init(['fancybox']);?>
    <div class="container">
        <div class="maxwidth-theme">
<?php $APPLICATION->IncludeFile("/include/seo_meta.php");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>