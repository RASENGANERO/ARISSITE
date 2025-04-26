<span id="nsm-new-styles"></span>
<span id="fit_new_css"></span>

<?
global $sotbit_meta;
global $sotbit_data;

if (strlen($meta['ELEMENT_DESCRIPTION'])>0){
	$APPLICATION->SetPageProperty("description", $meta['ELEMENT_DESCRIPTION']);
}

if (strlen($meta['ELEMENT_TITLE'])>0){
	$APPLICATION->SetPageProperty("title", $meta['ELEMENT_TITLE']);
}

if (strlen($meta['ELEMENT_PAGE_TITLE'])>0){
	$APPLICATION->SetTitle($meta['ELEMENT_PAGE_TITLE']);
}
?>