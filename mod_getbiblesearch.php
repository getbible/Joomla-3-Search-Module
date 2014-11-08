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

// Include the functions only once
require_once __DIR__ . '/getbiblesearch.php';

// load the module class
$module = new getSearch($params);

require JModuleHelper::getLayoutPath('mod_getbiblesearch', $params->get('layout', 'default'));