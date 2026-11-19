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
$bcont = "";
$attr = '';
if($flag_container = $params->get("add_container")) $bcont = " uk-container ";
$wrap_class = $params->get("wrap_class", "");
$flag_fullHeight = $params->get('full_height');
$flag_panel = 1;
$bclass  	=  $flag_fullHeight . " uk-flex uk-flex-wrap uk-child-width-1-2@s uk-child-width-1-1 uk-grid-collapsee ";
//$bclass .= $flag_fullHeight;
$bclass .= $flag_container;
$btag 	= $params->get('block_tag', 'div');
//$bclass = $params->get('block_class', '');

$bg1_class = $params->get("sq1_bg", '');
$bg2_class = $params->get("sq2_bg", '');
$bg3_class = $params->get("sq3_bg", '');
$bg4_class = $params->get("sq4_bg", '');
$text_size = $params->get("text_size", '');

$mod_id=$module->id;
if($params->get('match_height')) $attr = 'uk-grid uk-height-match="target: > div .mh"';
$block_prefix = $btag . ' id="mbl_' . $mod_id . '_block_';

?>


<div id="mbl_<?php echo $mod_id ?>" class="section sq4 <?php echo $params->get('block_class', ''); ?>">
<div class="<?php echo $bcont; ?>">
<div class="m_wrap <?php echo $bclass; ?>"  <?php echo $attr; ?> >
	
	<?php for($i = 1; $i < 5; $i++) : ?>
		<?php $advclass = $params->get('advclass_' . $i) . " uk-margin-remove"; ?>
		<?php if ($params->get('edt_' . $i) && !$params->get('hide_block_' . $i)) : ?>
			<<?php echo $block_prefix . $i; ?>" class="<?php echo $advclass; ?> <?php echo ${'bg' . $i . '_class'}; ?> uk-panel">
				<div class="mh <?php echo $params->get('class_block_' . $i, ''); ?> ">
					<div class="<?php echo $params->get('text_size'); ?>">
						<?php echo $params->get('edt_' . $i); ?>
					</div>
				</div>
			</<?php echo $btag; ?>>
		<?php endif; ?>
	<?php endfor; ?>

</div>
</div>
</div>