<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>


<?php if (!empty($arResult['data'])) : ?>
<div class="landings-list landings_list_group with-normal">
	<div class="landings-list__info landings-list__info--mobiled">
		<?php foreach ($arResult['data'] as $key => $values) : ?>
			<div class="tag-group-name-filter"><?php echo $key;?></div>
			<div class="d-inline landings-list__info-wrapper last flexbox flexbox--row flexbox--wrap">
				<?php foreach ($values as $value) : ?>
				<div class="landings-list__item font_xs">
					<div>
						<a class="landings-list__name landings-list__item--hover-bg rounded3" href="<?php echo $arResult['pageUrl'] . $value['link'];?>"><span><?php echo $value['name'];?></span></a>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		<?php endforeach;?>
	</div>
</div>
<?php endif;?>