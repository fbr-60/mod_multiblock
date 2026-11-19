<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_multiblock
 *
 * @copyright   
 * @license     GNU General Public License version 2 or later;
 */

namespace Joomla\Module\Multiblock\Site\Helper;

use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Database\DatabaseAwareInterface;
use Joomla\Database\DatabaseAwareTrait;
use Joomla\Database\ParameterType;
use Joomla\Registry\Registry;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Helper for mod_multiblock
 *
 * @since  1.5
 */
class MultiblockHelper implements DatabaseAwareInterface
{
    use DatabaseAwareTrait;

    /**
     * Returns a list from an array
     *
     * @param   Registry         $moduleParams  The module parameters.
     * @param   SiteApplication  $app           The current application.
     *
     * @return  \stdClass[]
     *
     * @since   4.4.0
     */
    public function getModuleData(Registry $moduleParams, SiteApplication $app): array
    {
        $lists = array();
        return $lists;
    }
			
		public static function getHtmlVars($block2, $block1, $var = 2)
		{	
			/* $var:
			* 1 - module 60%
			* 2 - module 40%
			* 2 - module 40%
			* 3 - module 100% (singl)
			*/
			$code = $var;
			if ($var < 0) {
				$code = $var * -1;				
			}
			$html = '';
			$colw = "1-2";
			switch($code) {
				case 2:
					$colw = "1-2";
					break;
				case 3:
					$colw = "3-5";
					break;
				case 4:
					$colw = "2-5";
					break;
				case 1:
					$colw = "";
					break;
			}
			
			if ($block1 && $block2 && $colw) {
				$start = '<div class="uk-width-1-1@m" uk-grid>'; 
				$insert = '<div class="insert-m uk-width-' . $colw . '@m" ><div>' . $block2 . '</div></div>' ;
				$content = '<div class="content-m uk-width-expand@m"><div>' . $block1 . '</div></div>';
				$end = '</div>';
				$intro_content = ($var > 0) ? ($insert . $content) : ($content . $insert);
				$html = $start . $intro_content . $end;
			} elseif (!$colw) {
					$html = '<div>' . $block2 . '</div>';
			} else {
				$html = '<div>' . $block1 . '</div>';
			}
			return $html;
		}
		
		function getAjax()
		{
			$language = Factory::getApplication()->getLanguage();
			$language->load('mod_multiblock', JPATH_BASE . '/modules/mod_multiblock');
			//self::testMailer();
			//return 232;
			$bot = '';
			$app = Factory::getApplication();			
			$input = $app->input;				
			$data = $input->getArray();
			$input = new Registry($data);
			//if(!Session::checkToken()) {
				//throw new \Exception(Text::_('JINVALID_TOKEN_NOTICE'), 403);
			//}
		
			$mod_id = $input->get('modid');
			//return '123';		
			$module = ModuleHelper::getModuleById($mod_id);
			$params = new Registry();
			$params->loadString($module->params);

			//$table = new \stdClass();
			//$table->block1 = $params->get("edt_1");
			
			$result['mid'] = $mod_id;
			$result['prm'] = $params->get("edt_1","dsd");
			return $result;
		}
		
		public static function schemaGrid($scheme)
		{
			 $width_suffx = "@m";
			 $all = '';
			
			switch ($scheme) {
				case "4":
					$all = 4;
					$bw[0] = $bw[1] = $bw[2] = $bw[3] = "uk-width-1-4" . $width_suffx; 
					break;
				case "3":
					$all = 3;
					$bw[0] = $bw[1] = $bw[2] = "uk-width-1-3" . $width_suffx; 
					break;
				case "2":
					$all = 2;
					$bw[0] = $bw[1] = "uk-width-1-2" . $width_suffx; 
					break;
				case "2-2":
					$bw[0] = "uk-width-1-2" . $width_suffx;
					$bw[1] = "uk-width-1-2" . $width_suffx;
					$bw[2] = "uk-width-1-2" . $width_suffx;
					$bw[3] = "uk-width-1-2" . $width_suffx;
					$all = '';
					break;
				case "1-3":
					$bw[0] = "uk-width-1-1" . $width_suffx;
					$bw[1] = "uk-width-1-3" . $width_suffx;
					$bw[2] = "uk-width-1-3" . $width_suffx;
					$bw[3] = "uk-width-1-3" . $width_suffx;
					$all = '';
					break;
				case "3-1":
					$bw[0] = "uk-width-1-3" . $width_suffx;
					$bw[1] = "uk-width-1-3" . $width_suffx;
					$bw[2] = "uk-width-1-3" . $width_suffx;
					$bw[3] = "uk-width-1-1" . $width_suffx;
					$all = '';
					break;
				case "1-2":
					$bw[0] = "uk-width-1-1" . $width_suffx;
					$bw[1] = "uk-width-1-2" . $width_suffx;
					$bw[2] = "uk-width-1-2" . $width_suffx;
					$bw[3] = "";
					$all = '';
					break;
				case "2-1":
					$bw[0] = "uk-width-1-2" . $width_suffx;
					$bw[1] = "uk-width-1-2" . $width_suffx;
					$bw[2] = "uk-width-1-1" . $width_suffx;
					$bw[3] = "";
					$all = '';
					break;
				default:
					$bw = [];
			}
			
			
			return $bw;						
		}
		
		public static function getStyle($schema) 
		{
			$stl="";
			$count = $schema;
			if ($count < 4) $stl = " uk-card-default ";
			
			switch($count) {
				case 1:
					$stl .= " uk-card uk-card-body uk-card-hover ";
					break;			
				case 2:
					$stl .= " uk-card uk-card-body ";
					break;			
				case 3:
					$stl .= " uk-card ";
					break;			
				case 4:
					$stl = "fbr";
					break;			
				case 5:
					$stl = " fbr-b ";
					break;					
			}
		
			return $stl;
		}
}
