<?php

use Joomla\Module\Multiblock\Site\Helper\MultiblockHelper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;

$def_position = 1;
$mod_id = $module->id;
$block_class = $params->get('block_class', '');
$slide_class = "slide uk-cover-container ";
$slide_id = "slide" . $mod_id . "__";
$slides = Array();
$mod_slide_1 = $mod_slide_2 = "";
for ($i=1; $i < 5; $i++) {
	$slides[$i] = $params->get("edt_" . $i);
}
$i = 1;
?>

<div class="section hzscroll" id="<?php echo "slides__" . $mod_id; ?>">
	<div uk-slider="autoplay:false"	>
		
		<div class="uk-position-relative uk-text-center" >
				
				<div class="uk-slider-items uk-child-width-1-1">
					<?php foreach($slides as $key => $slide) :

						if($loadId =  $params->get('include_id_' . $key)) {		
							$modout 		= ModuleHelper::getModuleById($loadId);
							$mod_slide_2 = ModuleHelper::renderModule($modout); //insert-m
							$mod_slide_1 = $slide;//content
						} else {
							$mod_slide_1 = $mod_slide_1 = $slide;//content
							$mod_slide_2 = '';
						}
						$var = $params->get('include_width_' . $key);
						
						$html = MultiblockHelper::getHtmlVars($mod_slide_2, $mod_slide_1, $var);
						
						$adv_class = $params->get('advclass_' . $key, '');
						$is_slide =  !$params->get('hide_block_' . $key);
						if ($is_slide) : ?>
						
						
								<div class="<?php echo $slide_class . $params->get("class_block_" . $key); ?>"  id="<?php echo $slide_id . $key; ?>"> 
								
									<div class="intro uk-container">										
													<?php echo $html; ?>		
									</div>
								
								</div>
						
							
							
						<?php endif; ?>

					<?php $i++; ?>
					<?php endforeach; ?>

				</div>
				
				
					<a class="uk-position-center-left uk-icon-link" href uk-slider-item="previous">〈</a>
					<a class="uk-position-center-right uk-icon-link" href uk-slider-item="next">〉</a>

		</div>
			
			
					<!--form name="mbform" id="mbform_<?php echo $mod_id; ?>">
						<input type="hidden" name="modid" value="<?php echo $module->id; ?>" >
					</form-->
	</div>			
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {
    // Функция для навешивания защиты на слайшоу
    function initSlideshowIsolation() {
        // Ищем все слайшоу по классу (на случай, если ID динамический или их несколько)
        const innerSlides = document.querySelectorAll('.uk-slideshow');

        innerSlides.forEach(inner => {
            // Проверяем, чтобы не вешать обработчики дважды на один и тот же элемент
            if (inner.dataset.isolated) return;
            inner.dataset.isolated = "true";

            ['pointerdown', 'pointerup', 'touchstart', 'touchmove', 'mousedown', 'mouseup', 'click']
              .forEach(type => {
                inner.addEventListener(type, e => e.stopPropagation(), { passive: false });
              });
        });
    }

    // 1. Запускаем сразу
    initSlideshowIsolation();

    // 2. Страховка для Joomla: запускаем повторно через небольшой интервал 
    // на случай, если модуль подгружается асинхронно или через AJAX
    setTimeout(initSlideshowIsolation, 500);
    setTimeout(initSlideshowIsolation, 1500);
});
</script>
<!--script>
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
</script-->


