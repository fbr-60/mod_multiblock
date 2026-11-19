<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$btag = $params->get('block_tag');
$adv_class = $params->get('class_block_4', '');//$moduleclass_sfx
$attr 	= $params->get('attrib', '');
$mod_id = 'multiblock' . $module->id;
?>
<div class="uk-flex uk-flex-wrap uk-flex-around <?php echo $params->get('block_class'); ?>"  <?php  echo $attr; ?>>
	<?php if ($params->get('edt_1') && !$params->get('hide_block_1')) : ?>
		<div id="<?php echo $mod_id . '__block1__' . $params->get('id_block_1', 'x'); ?>" class="<?php echo $params->get('class_block_1', 'mbl_1'); ?>">
			<?php echo $params->get('edt_1'); ?>
		</div>
	<?php endif; ?>

	<?php if ($params->get('edt_2') && !$params->get('hide_block_2')) : ?>
		<div id="<?php echo $mod_id . '__block2__' . $params->get('id_block_2', 'x'); ?>" class="<?php echo $params->get('class_block_2', 'mbl_2'); ?>">
			<?php echo $params->get('edt_2'); ?>
		</div>
	<?php endif; ?>

	<?php if ($params->get('edt_3') && !$params->get('hide_block_3')) : ?>
		<div id="<?php echo $mod_id . '__block3__' . $params->get('id_block_3', 'x'); ?>" class="<?php echo $params->get('class_block_3', 'mbl_3'); ?>">
			<?php echo $params->get('edt_3'); ?>
		</div>
	<?php endif; ?>

	<?php if ($params->get('edt_4') && !$params->get('hide_block_4')) : ?>
		<div id="<?php echo $mod_id . '__block4__' . $params->get('id_block_4', 'x'); ?>" class="<?php echo $params->get('class_block_4', 'mbl_4'); ?>">
			<?php echo $params->get('edt_4'); ?>
		</div>
	<?php endif; ?>
</div>