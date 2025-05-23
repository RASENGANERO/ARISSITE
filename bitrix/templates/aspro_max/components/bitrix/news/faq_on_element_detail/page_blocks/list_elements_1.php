<?// section elements?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"faq-items-list",
	Array(
		"COUNT_IN_LINE" => $arParams["COUNT_IN_LINE"],
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => $arParams["SHOW_SECTION_PREVIEW_DESCRIPTION"],
		"SHOW_SECTION_NAME" => $arParams["SHOW_SECTION_NAME"],
		"VIEW_TYPE" => $arParams["VIEW_TYPE"],
		"SHOW_TABS" => $arParams["SHOW_TABS"],
		"IMAGE_POSITION" => $arParams["IMAGE_POSITION"],
		"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
		"NEWS_COUNT"	=>	$arParams["NEWS_COUNT"],
		"SORT_BY1"	=>	$arParams["SORT_BY1"],
		"SORT_ORDER1"	=>	$arParams["SORT_ORDER1"],
		"SORT_BY2"	=>	$arParams["SORT_BY2"],
		"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
		"FIELD_CODE"	=>	$arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE"	=>	$arParams["LIST_PROPERTY_CODE"],
		"DISPLAY_PANEL"	=>	$arParams["DISPLAY_PANEL"],
		"SET_TITLE"	=>	$arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN"	=>	$arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN"	=>	$arParams["ADD_SECTIONS_CHAIN"],
		"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
		"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
		"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER"	=>	$arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER"	=>	$arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
		"DISPLAY_NAME"	=>	$arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME"	=>	$arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
		"PARENT_SECTION"	=>	$arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE"	=>	$arResult["VARIABLES"]["SECTION_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_DETAIL_LINK" => $arParams["SHOW_DETAIL_LINK"],
		"CATALOG_SECTION_ID" => (!empty($arParams["CATALOG_SECTION_ID"])) ? $arParams['CATALOG_SECTION_ID'] : '',
		"FAQ_SECTIONS" => (!empty($arParams["FAQ_SECTIONS"])) ? $arParams['FAQ_SECTIONS'] : [],
		"CLASS" => (!empty($arParams['CLASS'])) ? $arParams['CLASS'] : '',
		"SHOW_TITLE_FAQ" => (!empty($arParams['SHOW_TITLE_FAQ'])) ? $arParams['SHOW_TITLE_FAQ'] : '',
		"T_TITLE_FAQ" => (!empty($arParams['T_TITLE_FAQ'])) ? $arParams['T_TITLE_FAQ'] : '',
	),
	$component
);?>
<?if($arParams['SHOW_ASK_QUESTION_BLOCK'] !== 'N'):?>
	<table data-tid="b8" class="order-block bordered mb-3">
		<tbody>
			<tr>
				<td class="col-md-9 col-sm-8 col-xs-7 valign">
					<div class="block-item">
						<div class="flexbox flexbox--row">
							<div class="block-item__image icon_sendmessage"><?=CMax::showIconSvg("sendmessage", SITE_TEMPLATE_PATH."/images/svg/sendmessage.svg", "", "colored_theme_svg", true, false);?></div>
							<div class="text darken">
								<?$APPLICATION->IncludeComponent(
									 'bitrix:main.include',
									 '',
									 Array(
										  'AREA_FILE_SHOW' => 'page',
										  'AREA_FILE_SUFFIX' => 'ask',
										  'EDIT_TEMPLATE' => ''
									 )
								);?>
							</div>
						</div>
					</div>
				</td>
				<td class="col-md-3 col-sm-4 col-xs-5 valign btns-col">
					<div class="btns">
						<span><span class="btn btn-default animate-load" data-event="jqm" data-param-form_id="ASK" data-name="question"><span><?=(strlen($arParams['S_ASK_QUESTION']) ? $arParams['S_ASK_QUESTION'] : GetMessage('S_ASK_QUESTION'))?></span></span></span>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
<?endif;?>