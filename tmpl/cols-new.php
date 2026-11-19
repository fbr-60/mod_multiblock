<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_multiblock
 *
 * @copyright   
 * @license     GNU General Public License version 2 or later;
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

// print_r(implode(' ', $params->get('grid_class', '')));
$mod_id = $module->id;

$attrib = ' uk-grid';
if ($params->get('match_height',1)) {
	$attrib .= ' uk-height-match="target: > div > div"';
}
$wraptag = $params->get('wrap_tag', 'div'); // внешний контур модуля
// --- wrapclass ---
$child_w = 'uk-child-width-1-';
$columns_class 	= $params->get('c_cols_l', '') ?	($child_w . $params->get('c_cols_l', '')) : '';
$columns_class .= $params->get('c_cols_m', '') ?	($child_w . $params->get('c_cols_m', '')) : '';
$columns_class .= $params->get('c_cols_s', '') ?	($child_w . $params->get('c_cols_s', '')) : '';							
$grid_class = $columns_class . ' ' . implode(' ', $params->get('grid_class', ''));
$flex_class = implode(' ', $params->get('flex_class', ''));
$wrapclass = $params->get('wrap_class', '') . $grid_class . $flex_class;
//--------------- 
$btag 	= $params->get('block_tag', 'div');  // внешний контур блока модуля

//$block_prefix = $btag . ' id="mbl_' . $mod_id . '_block_';
?>

<<?php echo $wraptag; ?> id="multiblock-<?php echo $mod_id; ?>" class="<?php echo $wrapclass; ?>"<?php echo $attrib; ?> >
	<?php for ($i=1; $i<5; $i++) {
		$hide_block_name 	= 'hide_block_' 		. $i; // скрыть блок
		$inner_block_name = 'class_inner_' 		. $i; // класс внутренняя обертка
		$includeId_name 	= 'include_id_' 		. $i; // вставка другого модуля
		if ($params->get($hide_block_name)) continue; 
		$block_id_name 		= 'mbl_' . $mod_id 	. '_block_' . $i; // id внутреннего блока
		$block_class_name = "class_block_" 		. $i; // класс внешней обертки 
		$editor_name 			= "edt_" 						. $i; // поле редактора
	?>			
		<<?php echo $btag; ?> class="<?php echo $params->get($block_class_name); ?>">
			<div id="<?php echo $params->get($block_id_name); ?>" class="<?php echo $params->get($inner_block_name); ?>">
				
				<?php if ($params->get($includeId_name)) : ?>
					<?php 						
						$loadId = $params->get($includeId_name);
						$strId = '{loadmoduleid ' . $loadId . '}';
						echo HTMLHelper::_('content.prepare', "$strId");
					?>
				<?php else : ?>
					<?php echo $params->get($editor_name); ?>
				<?php endif; ?>
				
			</div>
		</<?php echo $btag; ?>>
	<?php } ?>
</<?php echo $wraptag; ?>>
