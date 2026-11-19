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

$mod_id=$module->id;
if ($params->get('match_height',1)) {
	$attrib .= ' uk-height-match="target: > div > div"';
}
$wraptag = $params->get('wrap_tag', 'div'); // внешний контур модуля
$wrapclass = $params->get('wrap_class', 'mbl');
$btag 	= $params->get('block_tag', 'div');  // внешний контур блока модуля

$block_class = $params->get('block_class', '');// класс внутреннего блока !!! def-new не используется
$block_outer_class = $params->get('block_outer_class', '');// внешний класс внутреннего блока !!! def-new не используется

?>

<<?php echo $wraptag; ?> id="multiblock-<?php echo $mod_id; ?>" class="<?php echo $wrapclass; ?>" >
	<?php for ($i=1; $i<5; $i++) {
		$hide_block_name 	= 'hide_block_' 		. $i; // скрыть блок
		$inner_block_name = 'class_inner_' 		. $i; // класс внутренняя обертка
		$includeId_name 	= 'include_id_' 		. $i; // вставка другого модуля
		if ($params->get($hide_block_name)) continue; 
		$block_id_name 		= 'id_block_' . $i; // id внутреннего блока
		if ($params->get($block_id_name, '')) {
			$blockID = $params->get($block_id_name, '');
		} else {
			$blockID = 'mbl_' . $mod_id . '_block_' . $i; // id внутреннего блока
		}
		$block_class_name = "class_block_" 		. $i; // класс внешней обертки 
		$editor_name 			= "edt_" 						. $i; // поле редактора
	?>			
		<<?php echo $btag; ?> class="<?php echo $params->get($block_class_name); ?>">
			<div id="<?php echo $blockID; ?>" class="<?php echo $params->get($inner_block_name); ?> <?php echo $block_class; ?>">
				
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
