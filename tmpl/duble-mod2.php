<?php

use Joomla\Module\Multiblock\Site\Helper\MultiblockHelper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;

$def_position = 1;

//$loadId = $params->get('include_id_3');
$mod_id = $module->id;
$slides = Array();
for ($i=1; $i < 5; $i++) {
	$paramedit[$i] = "edt_" . $i;
	if($loadId =  $params->get('include_id_' . $i)) {		
		$modout 		= ModuleHelper::getModuleById($loadId);
		$slides[$i] = $params->get($paramedit[$i]);
		$mod_slide_1 = '<div class="uk-width-1-2@m">' . $slides[$i] . '</div>';
		$mod_slide_2 = '<div class="uk-width-1-2@m">' . ModuleHelper::renderModule($modout) . '</div>';
		if($def_position) {
			$slides[$i] = $mod_slide_1 .$mod_slide_2;
		} else {
			$slides[$i] = $mod_slide_2 .$mod_slide_1;		
		}
		//$box1 = ModuleHelper::renderModule($modout);
		//$box2 = $slides[$i];
	} else {
		$slides[$i] = $params->get($paramedit[$i]);
	}
}

	$slide_id = "slide" . $mod_id . "__";

$html = MultiblockHelper::getHtmlVars($mod_slide_2, $mod_slide_1, 1);
?>

<div class="section" id="<?php echo "slides__" . $mod_id; ?>">
<?php foreach($slides as $key => $slide) :
//echo $slide . 'rrr';

	$is_slide =  !$params->get('hide_block_' . $key);
	if ($loadId =  $params->get("'include_id_' . $key")) {
		//echo $loadid;
		$modout = ModuleHelper::getModuleById($loadId);
		$mod_slide_2 = ModuleHelper::renderModule($modout);
		$mod_slide_1 = $slide;
		$html = MultiblockHelper::getHtmlVars($mod_slide_1, $mod_slide_2, 1);
	} else {
		$html = $slide;
		$mod_slide_2 = "";
	}
	
	if ($is_slide) : ?>
		<div class="slide <?php echo $params->get("class_block_" . $key); ?>"  id="<?php echo $slide_id . $key; ?>">
			<div class="intro uk-container">
				<?php if($params->get('include_id_' . $key)) : ?>
					<div uk-grid>
				<?php endif; ?>
				<?php echo $html; ?>
				<?php if($loadId) : ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>


<?php endforeach; ?>
<form name="mbform" id="mbform_<?php echo $mod_id; ?>">
	<input type="hidden" name="modid" value="<?php echo $module->id; ?>" >
</form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
	let modid = "mbform_" + <?php echo $mod_id; ?>;
	let mbForm = document.getElementById(modid);
	if (!mbForm) return; // Защита от ошибок, если формы нет на странице
	
	console.log ('before submit');
	mbForm.addEventListener('submit', function (event) {
		event.preventDefault();		
		let modaldata = new FormData(mbForm);
		let requestUrl = "/index.php?option=com_ajax&module=multiblock&format=json&itemid=101";
	console.log ('on submin');
		Joomla.request({
			url: window.location.origin + requestUrl,
			method:  "POST",
			option: "com_ajax",
			format : 'json',
			data: modaldata,
			onBefore: function (xhr){
				console.log ('onBefore');
			},		
			onSuccess: function (response, xhr){
				if (response !== ""){		
					let result = JSON.parse(response);
					console.log(result.data);
					
					
					console.log('success');
				}	
			},
			error: function (jqXhr) {
				console.log("Error: " + jqXhr.statusText + " (" + jqXhr.readyState + ", " + jqXhr.status + ", " + jqXhr.responseText + ")");
			},
			onComplete: function (xhr){
				return false;
				//
			}
		});	
	});
	
	mbForm.dispatchEvent(new Event('submit', { cancelable: true }));

	
});
</script>

