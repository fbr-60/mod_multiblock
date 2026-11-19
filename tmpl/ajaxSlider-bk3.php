<?php

use Joomla\Module\Multiblock\Site\Helper\MultiblockHelper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;


$mod_id = $module->id;
$slide_id = "slide" . $mod_id . "__";
?>

<?php
$html_grid = 0;
$slides = Array();
for ($i=1; $i < 5; $i++) {
	$editor[$i] = "edt_" . $i;
	$num = $params->get('include_id_' . $i);

	if($num) {

		$mod_outer = ModuleHelper::getModuleById($num);
		$mod_outer = ModuleHelper::renderModule($mod_outer);
		$slides[$i] = $params->get($editor[$i]);
	//exit();
	
		
		
		if($slides[$i] && $mod_outer) {
			
			$html_grid = 1;  //'<div class="uk-child-width-1-2@s" uk-grid>';
			//$end_tags = '</div></div></div>';
		} else {
			$html_grid = 0; //.= '<div>' . $slides[$i] . '</div>';
			//$end_tags = '</div></div>';	
		}
		
	} else {
		$slides[$i] = $params->get($editor[$i]);
		$mod_outer = "";
		$html = '<div>' . $slides[$i] . '</div>';
		$end_tags = '</div></div>';
	}
?>	

	<div class="section" id="<?php echo "slides__" . $mod_id; ?>">
		<div class="slide <?php echo $params->get("class_block_" . $key); ?>"  id="<?php echo $slide_id . $key; ?>">
		<div class="uk-container intro">
			<?php if ($html_grid) : ?>
			<div class="uk-childe-width-1-2@s">
			<div uk-grid>	
			<?php endif;
			$mod_outer = '<div class="uk-panel">' . $mod_outer . '</div>';
			$html = '<div class="uk-panel">' . $slides[$i] . '</div>';	
			echo $html;
			echo $mod_outer;
			?>
			</div>
			</div>
		</div>
		</div>
	
<?php 
	
}


//$html = MultiblockHelper::getHtmlVars($slides, $modout, 2);
//echo $html;
?>

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

