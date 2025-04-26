<?php
	$APPLICATION->IncludeComponent(
		"beton-gost:concrete-grades-for-catalog",
		"",
		array(
	        "IBLOCK_ID" => "45",
	        "IBLOCK_TYPE" => "aspro_max_content",
	        "REGION_ID" => $GLOBALS["arRegionLink"]["PROPERTY_LINK_REGION"],
	        "AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "N",
			"COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "ITEM_ID" => !empty($itemId) ? $itemId : null,
	    ),
		false
	);
?>