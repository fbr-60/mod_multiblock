<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$bclass = $params->get('block_class', '');
$mod_id = 'multiblock' . $module->id;
$mod_id_sl = 'sl_' . $module->id;

?>
<div class="section" id="<?php echo $mod_id; ?>">

<?php if ($params->get('edt_1') && !$params->get('hide_block_1')) : "";
 ?>
	<div class="slide"  id="<?php echo $params->get('id_block_1', $mod_id_sl); ?>)>
		<div class="sl_wrap">
		<div class="intro">
		<?php echo $params->get('edt_1'); ?>
		</div>
		</div>
	</div>
<?php endif; ?>
<?php if ($params->get('edt_2') && !$params->get('hide_block_2')) : ?>
	<div class="slide" id="<?php echo $params->get('id_block_2', $mod_id_sl); ?>">
		<div class="sl_wrap">
		<div class="intro">
		<?php echo $params->get('edt_2'); ?>
	</div>
	</div>
<?php endif; ?>
<?php if ($params->get('edt_3') && !$params->get('hide_block_3')) : ?>
	<div class="slide " id="<?php echo  $params->get('id_block_3', $mod_id_sl); ?>">
		<div class="sl_wrap">
		<div class="intro">
		<?php echo $params->get('edt_3'); ?>
		</div>
<?php endif; ?>
<?php if ($params->get('edt_4') && !$params->get('hide_block_4')) : ?>
	<div class="slide" id="<?php echo $params->get('id_block_4', $mod_id_sl); ?>" >
		<div class="sl_wrap">
		<div class="intro">
		<?php echo $params->get('edt_4'); ?>
	</div>
	</div>
<?php endif; ?>


</div>
