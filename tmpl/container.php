<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$btag = "section";//$params->get('block_tag');
$bclass = $params->get('block_class', '');
$mod_id = 'multiblock' . $module->id;
?>

<?php if ($params->get('edt_1') && !$params->get('hide_block_1')) : ?>
	<<?php echo $btag; ?> id="<?php echo $mod_id . '__block1__' . $params->get('id_block_1', 'x'); ?>" class="<?php echo $params->get('class_block_1', 'mbl_1'); ?>">
		<div class="uk-container">
		<?php echo $params->get('edt_1'); ?>
		</div>
	</<?php echo $btag; ?>>
<?php endif; ?>

<?php if ($params->get('edt_2') && !$params->get('hide_block_2')) : ?>
	<<?php echo $btag; ?> id="<?php echo $mod_id . '__block2__' . $params->get('id_block_2', 'x'); ?>" class="<?php echo $params->get('class_block_2', 'mbl_2'); ?>">
		<div class="uk-container">
		<?php echo $params->get('edt_2'); ?>
		</div>
	</<?php echo $btag; ?>>
<?php endif; ?>

<?php if ($params->get('edt_3') && !$params->get('hide_block_3')) : ?>
	<<?php echo $btag; ?> id="<?php echo $mod_id . '__block3__' . $params->get('id_block_3', 'x'); ?>" class="<?php echo $params->get('class_block_3', 'mbl_3'); ?>">
		<div class="uk-container">
		<?php echo $params->get('edt_3'); ?>
		</div>
	</<?php echo $btag; ?>>
<?php endif; ?>

<?php if ($params->get('edt_4') && !$params->get('hide_block_4')) : ?>
	<<?php echo $btag; ?> id="<?php echo $mod_id . '__block4__' . $params->get('id_block_4', 'x'); ?>" class="<?php echo $params->get('class_block_4', 'mbl_4'); ?>">
		<div class="uk-container">
		<?php echo $params->get('edt_4'); ?>
		</div>
	</<?php echo $btag; ?>>
<?php endif; ?>
