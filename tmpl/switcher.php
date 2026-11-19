<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_multiblock
 *
 * @copyright   
 * @license     GNU General Public License version 2 or later;
 */


defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$mod_id=$module->id;
$type = $params->get('switcher_type');
$attrib = explode(',', $params->get('attrib'));
$navtype[0] = ' class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade"';
$navtype[1] = ' uk-tab="animation: uk-animation-fade"';
$i = 1;
//var_dump($module);
?>
<?php // echo HTMLHelper::_('content.prepare', '{loadmoduleid 135}'); ?>
<div id="mbl_<?php echo $mod_id ?>" class="<?php echo $params->get('block_class', 'mbl-wrap'); ?>">
	<ul <?php echo $navtype[$type] ?>>
		<?php foreach ($attrib as $item) : ?>		
			<?php $hide_name = 'hide_block_' . $i;
						$edt_name = 'edt_' . $i; ?>
			<?php  if ($params->get($edt_name) && !$params->get($hide_name)) : ?>
			<li><a href="#"><?php echo trim($item); ?></a></li>
			<?php endif; ?>
			<?php $i++; ?>		
		<?php endforeach; ?>
	</ul>
	
	<div class="uk-switcher">
	<?php if ($params->get('edt_1') && !$params->get('hide_block_1')) : ?>
		<div id="mbl_<?php echo $mod_id ?>_block_1"><?php echo $params->get('edt_1'); ?></div>
	<?php endif; ?>    
	<?php if ($params->get('edt_2') && !$params->get('hide_block_2')) : ?>
		<div id="mbl_<?php echo $mod_id ?>_block_2"><?php echo $params->get('edt_2'); ?></div>
	<?php endif; ?>   
	<?php if ($params->get('edt_3') && !$params->get('hide_block_3')) : ?>
		<div id="mbl_<?php echo $mod_id ?>_block_3"><?php echo $params->get('edt_3'); ?></div>
	<?php endif; ?>    
	<?php if ($params->get('edt_4') && !$params->get('hide_block_4')) : ?>
		<div id="mbl_<?php echo $mod_id ?>_block_4"><?php echo $params->get('edt_4'); ?></div>
	<?php endif; ?>
	</div>	
</div>
