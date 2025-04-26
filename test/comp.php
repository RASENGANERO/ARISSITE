<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("title");?>
<?
global $BLOG_DATA;
$BLOG_DATA=[];
$BLOG_DATA['BLOG_DATA']['BLOG_ID']=1;
$BLOG_DATA['COMMENT_ID']=64;
?>
test123



<?Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("area");?>
		<?ob_start()?>
			
			<?=\Aspro\Functions\CAsproMax::showComments()?>
			<?$html=ob_get_clean();?>
			<?if($html && strpos($html, 'error') === false):?>
				<div class="ordered-block comments-block">
					<?=$html;?>
				</div>
				<div class="line-after"></div>
			<?endif;?>

<?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("area", "");?>
test123

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>