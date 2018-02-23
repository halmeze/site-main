<?php 
  function modChrome_venus( $module, &$params, &$attribs ) 
  {
    $suffix = $params->get( 'moduleclass_sfx' );
	if(!strpos($suffix,'nostyle')){
		echo '<div class="module ' . $suffix .'" ><div class="i"><div class="i"><div class="i">';
	 
		if ($module->showtitle) 
		{
		  $title = $module->title;
		  
		  $icon = '';
		  $pos = strpos($suffix,'typo-');
		  if($pos >= 0){
			$i = 0;
			for($i = $pos + 5; $i < strlen($suffix); $i++){
				if($suffix[$i] == ' '){
					break;
				}
			}
			$icon = '<span class="bjmod-icon '.substr($suffix,$pos,$i - $pos).'"></span>';
		  }
		  echo '<' . strtolower($attribs['heading']) . '><span class="bjmod-head-l"></span>'. $icon . str_replace(" ","&nbsp;",$title) .'<span class="bjmod-head-r"></span><span class="clearer"></span></' . strtolower($attribs['heading']) . '><div class="clearer"></div>';
		}
		
		// find any image in content
		$mod_content = $module->content;
		preg_match_all('@<img.+src="(.*)".*>@Uims', $mod_content, $matches);
		for($i = 0; $i < count($matches[1]); $i++) {
			$img_old = $matches[0][$i]; // image tag
			// check if image has width and height attributes
			if(!strpos(strtolower($img_old),"height")){
				$link = $matches[1][$i];
				try{
					list($width, $height) = @getimagesize($link);
					// now add width and height attribute to <img/> tag
					$img_new = str_replace("<img","<img height=\"".$height."px\" width=\"".$width."px\"",$img_old);
					// now replace the old content
					$mod_content = str_replace($img_old,$img_new,$mod_content);
				}
				catch(Exception $e){
					// so image is not valid, do nothing
				}
			}
		}
		
		echo '<div class="bjmod-content">'.$mod_content.'</div>';
	 
		echo '</div></div></div><div class="bjmod-corner"></div></div>';
	} else {
		$mod_content = $module->content;
		$title = '';
		if ($module->showtitle) 
		{
		  $title = '<' . strtolower($attribs['heading']) . '>'.$module->title.'</' . strtolower($attribs['heading']) . '>';
		}
		echo '<div class="nostyle">'.$title.$mod_content.'</div>';
	}
  }
?>
