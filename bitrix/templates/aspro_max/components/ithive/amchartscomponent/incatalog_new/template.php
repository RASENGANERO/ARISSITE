<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/modules/ithive.amchartscomponent/lib/template.php'))
    include ($_SERVER['DOCUMENT_ROOT'].'/local/modules/ithive.amchartscomponent/lib/template.php');
elseif(file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/ithive.amchartscomponent/lib/template.php'))
    include ($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/ithive.amchartscomponent/lib/template.php');
?>