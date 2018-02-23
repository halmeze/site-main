<?php
/*
# ------------------------------------------------------------------------
# Extensions for Joomla 2.5.x - Joomla 3.x
# ------------------------------------------------------------------------
# Copyright (C) 2011-2014 Ext-Joom.com. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: Ext-Joom.com
# Websites:  http://www.ext-joom.com 
# Date modified: 09/03/2014 - 13:00
# ------------------------------------------------------------------------
*/

// No direct access.
defined('_JEXEC') or die;

class plgSystemExtcustomjscss extends JPlugin {
	function onBeforeCompileHead() {
		if (JFactory::getApplication()->isAdmin()){
			return true;
		}
		$doc 	= JFactory::getDocument();
		$ext_css = $this->params->get('ext_css');
		$ext_js	= $this->params->get('ext_js');
		if (strlen($ext_css) > 0) { $doc->addStyleDeclaration($ext_css); }
		if (strlen($ext_js) > 0) { $doc->addScriptDeclaration($ext_js); }
	}
}