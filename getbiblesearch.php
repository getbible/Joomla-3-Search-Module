<?php
/**
* 
* 	@version 	1.0.1  November 7, 2014
* 	@package 	Get Bible - Search Module
* 	@author  	Llewellyn van der Merwe <llewellyn@vdm.io>
* 	@copyright	Copyright (C) 2013 Vast Development Method <http://www.vdm.io>
* 	@license	GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
*
**/
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.helper');
jimport('joomla.application.router');

class getSearch
{
	public $action;
	public $uniqueId;
	public $document;
	public $params;
	public $books;
	public $versions;
	
	protected $component;
	
	public function __construct(&$params)
	{
		// get the document
		$this->document		= &JFactory::getDocument();
		// set the getBible component defaults
        $this->component	= &JComponentHelper::getComponent('com_getbible');
		// set the getBible component params
        $this->params		= &JComponentHelper::getParams('com_getbible');
		// make sure all scripts are loaded
		if (!$this->css_loaded('uikit')) {
			$this->document->addStyleSheet(JURI::base( true ) .'/media/com_getbible/css/uikit.min.css');
		}
		if (!$this->js_loaded('jquery')) {			
			if($params->get('search_options') == 1){
				JHtml::_('jquery.framework');
			}
		}
		if (!$this->js_loaded('uikit')) {
			$this->document->addScript(JURI::base( true ) .'/media/com_getbible/js/uikit.min.js');
		}
		// load the correct form action
		$itemid = $this->getMenuItemId('app');
		if($itemid){
			$this->action = $this->getRouteUrl('index.php?Itemid='.$itemid);
		} else {
			$this->action = $this->getRouteUrl('index.php?option=com_getbible&view=app');
		}
		
		$this->uniqueId = $this->randomkey(8);
		
		// get the versions list
		$this->versions = $this->getVersions();
	}
	
	protected function getMenuItemId($view) {

        $menu 		= JFactory::getApplication()->getMenu();
        //get only com_getbible menu items
        $items  	= $menu->getItems('component_id', $this->component->id);
		
        foreach ($items as $item) {
            if (isset($item->query['view']) && $item->query['view'] === $view) {
				return $item->id;
			}
        }
        return false;
    }
	
	protected function getRouteUrl($route) {

		// Get the global site router.
		$config = &JFactory::getConfig();
		$router = JRouter::getInstance('site');
		$router->setMode( $config->get('sef', 1) );
	
		$uri    = &$router->build($route);
		$path   = $uri->toString(array('path', 'query', 'fragment'));
	
		return $path;
	}
	
	protected function randomkey($size) {
		$bag = "abcefghijknop1234567890qrstuwxyzABCDDEFGHIJKLLMMNOPQRSTUVVWXYZabcddefghijkllmmnopqrs0987654321tuvvwxyzABCEFGHIJKNOPQRSTUWXYZ";
		$key = array();
		$bagsize = strlen($bag) - 1;
		for ($i = 0; $i < $size; $i++) {
			$get = rand(0, $bagsize);
			$key[] = $bag[$get];
		}
		return implode($key);
	}
	
	public function getVersions()
	{	
		if ($this->params->get('jsonQueryOptions') == 1){
			
			$path 		= JPATH_SITE.'/media/com_getbible/json/cpanel.json';
			$cpanel 	= @file_get_contents($path);
			
			if($cpanel === FALSE){
				return false;
			}
			
			return json_decode($cpanel);
			
		} elseif ($this->params->get('jsonQueryOptions') == 2) {
			
			$path 		= 'https://getbible.net/media/com_getbible/json/cpanel.json';
			$cpanel 	= @file_get_contents($path);
			
			if($cpanel === FALSE){
				return false;
			}
			
			return json_decode($cpanel);
			
		} else {
			
			$path 		= 'https://getbible.net/media/com_getbible/json/cpanel.json';
			$cpanel 	= @file_get_contents($path);
			
			if($cpanel === FALSE){
				return false;
			}
			
			return json_decode($cpanel);
			
		}

	}
	
	protected function js_loaded($script_name)
	{
		// UIkit check point
		if($script_name == 'uikit'){
			$getTemplateName  	= JFactory::getApplication()->getTemplate('template')->template;
			
			if (strpos($getTemplateName,'yoo') !== false) {
				return true;
			}
		}
		
		$head_data 	= $this->document->getHeadData();
		foreach (array_keys($head_data['scripts']) as $script) {
			if (stristr($script, $script_name)) {
				return true;
			}
		}

		return false;
	}
	
	protected function css_loaded($script_name)
	{
		// UIkit check point
		if($script_name == 'uikit'){
			$getTemplateName  	= JFactory::getApplication()->getTemplate('template')->template;
			
			if (strpos($getTemplateName,'yoo') !== false) {
				return true;
			}
		}
		
		$head_data 	= $this->document->getHeadData();
		
		foreach (array_keys($head_data['styleSheets']) as $script) {
			if (stristr($script, $script_name)) {
				return true;
			}
		}
		return false;
	}
}