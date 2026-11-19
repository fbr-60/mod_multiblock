<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;

$mod_id = $module->id;

?>

<div class="section" id="<?php echo "slides__" . $mod_id; ?>">

<?php if ($params->get('edt_1') && !$params->get('hide_block_1')) : ?>
	<div class="slide <?php echo $params->get('class_block_1', ''); ?>"  id="slide<?php echo $mod_id; ?>__1">
		<div class="intro uk-container">		
		<?php echo $params->get('edt_1'); ?>
		</div>
		
	</div>
<?php endif; ?>
<?php if ($params->get('edt_2') && !$params->get('hide_block_2')) : ?>
	<div class="slide <?php echo $params->get('class_block_2', ''); ?>" id="slide<?php echo $mod_id; ?>__2">
		<div class="intro uk-container">		
		<?php echo $params->get('edt_2'); ?>
		</div>
	</div>
	
<?php endif; ?>

	<div class="slide <?php echo $params->get('class_block_3', ''); ?>" id="slide<?php echo $mod_id; ?>__3">
		<div class="intro uk-container">
			<div uk-grid>
				<div class="uk-width-1-2@m">	
				<?php 
					// Получаем объект модуля по его ID
					$module = ModuleHelper::getModuleById($loadId); //Ошибка, исправить!!! loadId - не определена
					// Выводим модуль на экран
					echo ModuleHelper::renderModule($module);
				?>
				</div>
				<div class="uk-width-1-2@m">
					<?php echo $params->get('edt_3'); ?>
				</div>
			</div>
		</div>
	</div>

<?php if ($params->get('edt_4') && !$params->get('hide_block_4')) : ?>
	<div class="slide <?php echo $params->get('class_block_4', ''); ?>" id="slide<?php echo $mod_id; ?>__4">
		<div class="intro uk-container">		
		<?php echo $params->get('edt_4'); ?>	
		</div>
	</div>
<?php endif; ?>


</div>

