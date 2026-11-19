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
$btag 	= $params->get('block_tag', 'div');
$bclass = $params->get('block_class', '');
//$attr 	= $params->get('attrib', ' uk-grid');

$mod_id = $module->id;
$attr = $params->get('attrib', ' uk-grid');
$block_prefix = $btag . ' id="mbl_' . $mod_id . '_block_';

$c_cols  = $params->get('c_cols_l', '') ? ' uk-child-width-1-' . $params->get('c_cols_l', '') . "@l" : "";
$c_cols .= $params->get('c_cols_m', '') ? ' uk-child-width-1-' . $params->get('c_cols_m', '') . "@m" : "";
$c_cols .= $params->get('c_cols_s', '') ? ' uk-child-width-1-' . $params->get('c_cols_s', '') . "@s" : "";

$dd_cols = ' uk-child-width-expand' . '@m';


//attr[] = ''; // uk-grid,
$item_width_class = " ";
$grid_class_list = $params->get('grid_class', ''); // uk-child-width-1-*@* , uk-grid-match, uk-grid-small, uk-grid-match
$flex_class_list = $params->get('flex_class', '');
$grid_attr = !empty($grid_class_list) ? " uk-grid" : "";
$flexList = '';
$gridList = '';
foreach ($flex_class_list as $item) {
	$flexList .= ' ' . $item;
}
foreach ($grid_class_list as $item) {
	$gridList .= ' ' . $item;
}
$gridList .= $c_cols;
?>
<div id="mbl_<?php echo $mod_id ?>" class="<?php echo $gridList . $flexList; ?>" <?php echo $grid_attr; ?>>
	
	<?php 
	for ($i=1; $i < 5; $i++) {
		$edt = 'edt_' . $i;
		$hide_block = 'hide-block_' . $i;
		$class_inner = 'class_inner_' . $i;
		$width_class = 'class_block_' . $i;
		$item_width_class = $params->get($width_class, '');
		if ($params->get($edt) && !$params->get($hide_block)) : ?>
		<div class="<?php echo $item_width_class; ?>">
			<<?php echo $block_prefix; ?>1" class="<?php echo $params->get($class_inner, 'fd'); ?>">
					<?php echo $params->get($edt); ?>
			</<?php echo $btag; ?>>
		</div>
		<?php endif; 	
		}
		?>
		
		
	
	
</div>
