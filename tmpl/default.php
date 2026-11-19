<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_multiblock
 *
 * @copyright   
 * @license     GNU General Public License version 2 or later;
 */
use Joomla\Module\Multiblock\Site\Helper\MultiblockHelper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;


$config = new MultiblockHelper();

$attr = '';
$flag_container = "uk-container";
$flag_fullHeight = 'uk-height-match="target: > div .mh"';
//$flag_fullHeight = $params->get('full_height');

$wrap_class = $params->get('wrap_class');
$schema = $params->get('grid_schema');

$num = $params->get('style_schema');
$bclass  	= ''; 
$grid_class = implode(" ", $params->get('grid_class', ''));
$block_width = Array();



$bclass = $flag_container . $flag_fullHeight;
$btag 	= "div"; //$params->get('block_tag', 'div');

$bg1_class = $params->get("sq1_bg", '');
$bg2_class = $params->get("sq2_bg", '');
$bg3_class = $params->get("sq3_bg", '');
$bg4_class = $params->get("sq4_bg", '');
$text_size = $params->get("text_size", '');

$mod_id=$module->id;
if($params->get('match_height')) $attr = 'uk-grid uk-height-match="target: > div .mh"';
$attr = ' uk-grid';// 'uk-grid uk-height-match="target: > div .mh"'; //$params->get('attrib', '');
$block_prefix = $btag . ' id="mbl_' . $mod_id . '_block_';
$block_width = $config->schemaGrid($schema);
$block_style = $config->getStyle($num);


//$block_class = $params->get('class_block_') . $i;
?>

<div class="section univerasl <?php echo $wrap_class; ?>">
	<div class="<?php echo $flag_container; ?>">
		<div class="<?php echo $grid_class; ?>" <?php echo $attr; ?> <?php echo $flag_fullHeight; ?>>
	
		<?php
			for ($i = 1; $i <= 4; $i++) :
					$block_class = $params->get('class_block_' . $i);
					$bg_class = ${"bg" . $i . "_class"};
					if (!$params->get('edt_' . $i) || $params->get('hide_block_' . $i))   continue ; ?>
					<<?php echo $block_prefix . $i; ?>" class="<?php echo $block_width[$i - 1]; ?>" >
					<div class='uk-clearfix mh <?php echo ${"bg" . $i . "_class"}; ?> <?php echo $block_style; ?>				                      
						<?php echo $params->get("block_class"); ?>' >
						<div class="edt_<?php echo $i . ' ' . $params->get('text_size'); ?> ">
						<?php echo $params->get('edt_' . $i); ?>
						</div>
					</div>
				</<?php echo $btag; ?>>
			
		<?php endfor; ?>	
	
		</div>
	</div>
</div>