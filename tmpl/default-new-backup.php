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

$mod_id=$module->id;
$attrib = $params->get('attrib', '');
$wraptag = $params->get('wrap_tag', 'div');
$wrapclass = $params->get('wrap_class', 'mbl');
$btag 	= $params->get('block_tag', 'div');
$block_class = $params->get('block_class', '');

?>

<<?php echo $wraptag; ?> id="multiblock-<?php echo $mod_id; ?>" class="<?php echo $wrapclass; ?>" <?php echo $attrib; ?> >
	<?php for ($i=1; $i<5; $i++) {
		$hide_block_name = 'hide_block_' . $i;
		if ($params->get($hide_block_name)) continue;
		$block_id_name = 'mbl_' . $mod_id . '_block_' . $i;
		$block_class_name = "class_block_" . $i; 
		$editor_name = "edt_" . $i;
	?>			
		<<?php echo $btag; ?> class="<?php echo $params->get($block_class_name); ?>">
			<div id="<?php echo $params->get($block_id_name); ?>" class="<?php echo $block_class; ?>">
				<?php echo $params->get($editor_name); ?>
			</div>
		</<?php echo $btag; ?>>
	<?php } ?>
</<?php echo $wraptag; ?>>