<?php
/*------------------------------------------------------------------------
# mod_globalnews - Global News Module
# ------------------------------------------------------------------------
# author    Jesús Vargas Garita
# copyright Copyright (C) 2010 joomlahill.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomlahill.com
# Technical Support:  Forum - http://www.joomlahill.com/forum
-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die;

$i = $j = 0;

foreach ($cat as $group) :

	$listCondition = $group->cond;
	$list  = modGlobalNewsHelper::getGN_List($params,$listCondition);

	if (count($list) || $empty != 0) :

		$more  = $params->get('more', 1);

		$i++; $j++; ?>

<div style="float:left;width:<?php echo $width; ?>;">
  <div class="globalnews" style="margin:<?php echo $params->get('margin', '2px'); ?>">
    <?php 
  		if ( $show_cat != 0 ) : ?>
    <div class="gn_header_<?php echo $globalnews_id; ?>"> <span class="gn_header"><?php echo $group->image . $group->title; ?></span>
      <div class="gn_clear"></div>
    </div>
    <?php endif;
		if ( count ( $list) > 0 ) :
        	require(JModuleHelper::getLayoutPath('mod_globalnews', $layout));
        endif; ?>
  </div>
</div>
<?php 
		if ( $i == $cols && $j != $total ) : ?>
<div class="gn_clear"></div>
<?php
			$i=0; 
		endif;
	endif;
endforeach; ?>
<div class="gn_clear"></div>
