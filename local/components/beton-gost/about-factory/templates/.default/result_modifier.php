<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php

$arPhotos = [];
if(!empty($arResult['PHOTO']['VALUE'])) {
    foreach($arResult['PHOTO']['VALUE'] as $index => $photoID){
        $arPhotos[] = array(
            'ID' => $photoID,
            'ORIGINAL' => \CFile::GetPath($photoID),
            'PREVIEW' => \CFile::ResizeImageGet($photoID, array('width' => 600, 'height' => 600), BX_RESIZE_IMAGE_PROPORTIONAL ),
            'DESCRIPTION' => $arResult['PHOTO']['DESCRIPTION'][$index],
        );
    }
    
}

$cp = $this->__component;

if (is_object($cp)) {
   $cp->arResult['PHOTO_RESIZE'] = $arPhotos;
   $cp->SetResultCacheKeys(['PHOTO_RESIZE', 'TIZERS']);
   
}
?>