<?php

use Joomla\Module\Multiblock\Site\Helper\MultiblockHelper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;



$loadId = $params->get('include_id_3');
$mod_id = $module->id;
$slides = Array();
for ($i=1; $i < 5; $i++) {
	$paramedit[$i] = "edt_" . $i;
	if($loadId =  $params->get('include_id_' . $i)) {		
		$module 		= ModuleHelper::getModuleById($loadId);
		$slides[$i] = $params->get($paramedit[$i]);
		$slides[$i] = '<div class="uk-width-1-2@m">' . $slides[$i] . '</div><div class="uk-width-1-2@m">' . ModuleHelper::renderModule($module) . '</div>';
		$box1 = ModuleHelper::renderModule($module);
		$box2 = $slides[$i];
	} else {
		$slides[$i] = $params->get($paramedit[$i]);
	}
}

	$slide_id = "slide" . $mod_id . "__";
// $config->getHtmlBox($num_slide, $type); сделать метод различных вариантов верстки.
//$box1 = 
$html = MultiblockHelper::getHtmlVars($box1, $box2, 1);
?>

<div class="section" id="<?php echo "slides__" . $mod_id; ?>">
<?php foreach($slides as $key => $slide) :
	$is_slide =  !$params->get('hide_block_' . $key);
	if ($loadId =  $params->get("'include_id_' . $key")) {
		//echo $loadid;
		$module = ModuleHelper::getModuleById($loadId);
		$box1 = ModuleHelper::renderModule($module);
		$box2 = $slide;
		$html = MultiblockHelper::getHtmlVars($box1, $box2, 1);
	} else {
		$html = $slide;
	}
	
	if ($is_slide) : ?>
		<div class="slide <?php echo $params->get("class_block_" . $key); ?>"  id="<?php echo $slide_id . $key; ?>">
			<div class="intro uk-container">		
				<?php echo $html; ?>
			</div>
		</div>
	<?php endif; ?>


<?php endforeach; ?>
</div>

