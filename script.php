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

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Added for Joomla 3.0
if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
};

class mod_getbiblesearchInstallerScript
{
	public function preflight($type, $parent) {
		if ($type == 'uninstall') {
			return true;
		}
		
		$app = JFactory::getApplication();
		
		if (!file_exists(JPATH_ROOT.DS.'components'.DS.'com_getbible'.DS.'helpers'.DS.'script_checker.php')) {
			$app->enqueueMessage('Please install the <a href="https://getbible.net/downloads" target="_blank">GetBible component</a> before continuing.', 'error');
			return false;
		}
		
		$jversion = new JVersion();
		if (!$jversion->isCompatible('3.0.0')) {
			$app->enqueueMessage('Please upgrade to at least Joomla! 3.0.0 before continuing!', 'error');
			return false;
		}
		
		return true;
	}
}