<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_multiblock
 *
 * @copyright   
 * @license     GNU General Public License version 2 or later;
 */


defined('_JEXEC') or die;

//use Joomla\CMS\Factory;
//use Joomla\CMS\HTML\HTMLHelper;
//use Joomla\CMS\Uri\Uri;
$flag_container = 1;
$flag_panel = 1;
$bclass  	= "uk-flex uk-flex-wrap uk-child-width-1-2@s uk-child-width-1-1 uk-grid-collapsee";
$bcont 		= " uk-container ";
if ($flag_container) $bclass .= $bcont;
//if ($flag_panel) $bclass .= " child-baord ";
$btag 	= $params->get('block_tag', 'div');
//$bclass = $params->get('block_class', '');

$mod_id=$module->id;
$attr = 'uk-grid uk-height-match="target: > div .mh"'; //$params->get('attrib', '');
$block_prefix = $btag . ' id="mbl_' . $mod_id . '_block_';
?>
<div id="mbl_<?php echo $mod_id ?>" class="section <?php echo $params->get('block_class', 'mbl-wrap'); ?>">
<div class="<?php echo $bcont; ?>">
<div class="m_wrap <?php echo $bclass; ?>"  <?php echo $attr; ?>>

	<?php if ($params->get('edt_1') && !$params->get('hide_block_1')) : ?>
		<<?php echo $block_prefix; ?>1" class="uk-panel">
			<div class="<?php echo $params->get('class_block_1', ''); ?> mh">
				<?php echo $params->get('edt_1'); ?>
			</div>
		</<?php echo $btag; ?>>
	<?php endif; ?>

	<?php if ($params->get('edt_2') && !$params->get('hide_block_2')) : ?>
		<<?php echo $block_prefix; ?>2" class="uk-panel">
			<div class="<?php echo $params->get('class_block_2', ''); ?> mh">
				<?php echo $params->get('edt_2'); ?>
			</div>
		</<?php echo $btag; ?>>
	<?php endif; ?>

	<?php if ($params->get('edt_3') && !$params->get('hide_block_1')) : ?>
		<<?php echo $block_prefix; ?>3" class="uk-panel">
			<div class="<?php echo $params->get('class_block_3', ''); ?> mh">
				<?php echo $params->get('edt_3'); ?>
			</div>
		</<?php echo $btag; ?>>
	<?php endif; ?>

	<?php if ($params->get('edt_4') && !$params->get('hide_block_4')) : ?>
		<<?php echo $block_prefix; ?>4" class="uk-panel">
			<div class="<?php echo $params->get('class_block_4', ''); ?> mh">
				<?php echo $params->get('edt_4'); ?>
			</div>
		</<?php echo $btag; ?>>
	<?php endif; ?>

</div>
</div>
</div>