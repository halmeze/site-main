<?php 
/* Joomla Template by byjoomla.com 
BJ! Venus (Free version) for Joomla 1.5 - http://byjoomla.com
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/* === Get Template parameters ================================== */
$template_color = $this->params->get("templateColor","blue");
$moduleheading = $this->params->get("moduleheading","h3");

$pathway_text = $this->params->get("pathway_text","");
$backtotop = $this->params->get("backtotop","");
/* === End parameters =========================================== */
$template_name = 'bj_venus';
global $template_font;

define( '_TEMPLATE_PATH', JPATH_BASE . DS . 'templates' . DS .$template_name);
define('_TEMPLATE_URL',JURI::base().'templates/'.$template_name);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<?php
	$user_count = 0;
	$header = 0;
	if($this->countModules('user1')) { $user1 = 1;$user_count++;}
	if($this->countModules('user2')) { $user2 = 1;$user_count++;}
	if($this->countModules('user3')) { $user3 = 1;$user_count++;}
	if($this->countModules('user4')) { $user4 = 1;$user_count++;}
	if($this->countModules('user5')) { $user5 = 1;$user_count++;}
	if($this->countModules('user6')) { $user6 = 1;}
	if($this->countModules('left')) { $left = 1;}
	if($this->countModules('right')) { $right = 1;}
	if($this->countModules('advert1')) { $advert1 = 1;}	
	if($this->countModules('header')){$header=1;}
	if($this->countModules('toolbar')){$toolbar=1;}
	if($this->countModules('bottom')){$bottom=1;}
	if($this->countModules('top')){$top=1;}
	if($this->countModules('banner')){$banner=1;}	
	if($this->countModules('headline')){$headline=1;}
?>
<?php 
$load_theme_result = false;
if(!$load_theme_result){
?>
<script type="text/javascript" src="<?php echo _TEMPLATE_URL?>/func/jquery-1.4.2.js"></script>
<script type="text/javascript">
		jQuery.noConflict();
		var _TEMPLATE_URL = '<?php echo _TEMPLATE_URL ?>';
</script>
<script type="text/javascript" src="/media/system/js/mootools.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo _TEMPLATE_URL ?>/css/template_css.css" />
<link rel="stylesheet" type="text/css" href="<?php echo _TEMPLATE_URL?>/css/bj_dropdownmenu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo _TEMPLATE_URL?>/css/typo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo _TEMPLATE_URL?>/css/<?php echo $template_color; ?>.css" />
</style>
<!--[if IE]>
<style type="text/css">
div.componentheading .left{margin-top:-7px}

/* FIX COLOR IN IE */
.venus-textbox-2 div.blue{background:#002545;}
.venus-textbox-2 div.green{background:#173100}
.venus-textbox-2 div.purple{background:#321039}
.venus-textbox-2 div.orange{background:#D16500}
.venus-textbox-2 div.brown{background:#2F261B}
.venus-textbox-2 div.red{background:#610004}
</style>
<![endif]-->
<!--[if IE 7]>
<style type="text/css">
#BJ_Search .typo-search{margin:-26px -25px 0 0}
div.bjmod-style-2 h3 .bjmod-head-r,div.bjmod-style-3 h3 .bjmod-head-r,div.bjmod-style-2 h4 .bjmod-head-r,div.bjmod-style-3 h4 .bjmod-head-r,div.bjmod-style-2 h5 .bjmod-head-r,div.bjmod-style-3 h5 .bjmod-head-r{margin:-19px -7px 0 0;}
div.componentheading .left{margin-top:-7px}
div.componentheading .right{margin-top:-49px}

.button-1-,.button-1-blue{padding:0;}
.button-2-,.button-2-blue{padding:9px 0}
a.button-2 .front{top:10px}
</style>
<![endif]-->
<?php }?>
</head>
<body>
<center>
<div id="BJ_Wrapper">
<div id="BJ_MainPage">
	<div class="inner">
		<div id="BJ_Logo_Search">
			<div id="BJ_Logo">
			<?php if(!$header) {?>
				<div style="height:50px;padding:20px 0 0 0" title="<?php if (isset($GLOBALS['mosConfig_sitename'])) echo $GLOBALS['mosConfig_sitename']; ?>">
					<a href="<?php if (isset($GLOBALS['mosConfig_live_site'])) echo $GLOBALS['mosConfig_live_site']; ?>" title="<?php if (isset($GLOBALS['mosConfig_sitename'])) echo $GLOBALS['mosConfig_sitename']; ?>">
						<?php $src = _TEMPLATE_URL . '/images/bjvenus-logo.png'; 
						if($template_color == "orange") $src = _TEMPLATE_URL . '/images/orange/bjvenus-logo.png'; 
						?>
						<img src="<?php echo  $src; ?>" alt=""/>
					</a>
				</div>
			<?php } else {?>
			<jdoc:include type="modules" name="header" style="raw" />
			<?php }?>
			</div>
			<?php if($user5){?>
			<div id="BJ_Search">
				<jdoc:include type="modules" name="user5" style="raw" /><span class="typo-search"><!-- --></span>
			</div>
			<?php }?>
		</div>
	</div>
	<?php if($toolbar){?>
	<div class="inner2">
		<div class="clearer"><!-- --></div>
		<div id="BJ_MainMenu" class="dropdown">
			<div class="bg">
				<div class="bg">
					<jdoc:include type="modules" name="toolbar" style="raw" />
				</div>
				<div class="clearer"><!-- --></div>
			</div>
			<div class="clearer"><!-- --></div>
		</div>
	</div>
	<?php }?>
	<div class="inner">
		<?php if($advert1){?>
		<div class="clearer"><!-- --></div>
		<div id="BJ_Venus_SlideShow">
			<jdoc:include type="modules" name="advert1" style="raw" />
		</div>
		<?php }?>
		<div class="clearer"><!-- --></div>
		<?php if($headline){?>
			<div id="BJ_Headline">
				<jdoc:include type="modules" name="headline" style="raw" />
			</div>
			<div class="clearer"><!-- --></div>
		<?php }?>
		<div id="BJ_MainBody">
			<div id="BJ_Left_Col">
				<jdoc:include type="modules" name="left" heading="<?php echo $moduleheading;?>" style="venus" />
			</div>
			<div id="BJ_Right_Col">
				<div id="BJ_Main_Top_Round"><div class="left"></div><div class="right"></div></div>
				<div class="clearer"><!-- --></div>
				<div id="BJ_Main">
					<?php if($top){?>
					<div id="BJ_Top">
						<jdoc:include type="modules" name="top" style="raw" />
					</div>
					<div class="clearer"><!-- --></div>
					<?php }?>
					<div id="BJ_Component">
						<jdoc:include type="component" />
					</div>
					<div class="clearer"><!-- --></div>
					<div id="BJ_Bottom">
						<jdoc:include type="modules" name="bottom" heading="<?php echo $moduleheading;?>" style="venus" />
					</div>
					<div class="clearer"><!-- --></div>
					<?php if($banner){?>
					<div id="BJ_Banner">
						<jdoc:include type="modules" name="banner" style="raw" />
					</div>
					<div class="clearer"><!-- --></div>
					<?php }?>
				</div>
				<?php if($right){?>
				<div id="BJ_Right">
					<jdoc:include type="modules" name="right" heading="<?php echo $moduleheading;?>" style="venus" />
				</div>
				<?php }?>
				<div class="clearer"><!-- --></div>
				<div id="BJ_Main_Bottom_Round"><div class="left"></div><div class="right"></div></div>
			</div>
			<div class="clearer"><!-- --></div>
		</div>
	</div>
</div>
<div class="clearer"><!-- --></div>
<div id="BJ_BottomPage">
	<div id="BJ_Pathway">
		<div class="inner">
			<span class="path"><?php echo $pathway_text;?> <jdoc:include type="modules" name="breadcrumbs"/></span>
			<?php if($backtotop){?>
			<div id="BJ_Gotop"><a href="javascript:void(0)" onclick="window.scrollTo(0,0)"><?php echo $backtotop;?></a></div><?php }?>
		</div>
	</div>
	<div class="clearer"><!-- --></div>
	<div id="BJ_Bottoms">
<?php if($user1 || $user2 || $user3 || $user4){?>
		<div class="inner">
		<div class="column">
			<jdoc:include type="modules" name="user1" heading="<?php echo $moduleheading;?>" style="venus" />
		</div>
		<div class="column">
			<jdoc:include type="modules" name="user2" heading="<?php echo $moduleheading;?>" style="venus" />
		</div>
		<div class="column">
			<jdoc:include type="modules" name="user3" heading="<?php echo $moduleheading;?>" style="venus" />
		</div>
		<div class="column">
			<jdoc:include type="modules" name="user4" heading="<?php echo $moduleheading;?>" style="venus" />
		</div>
		<div class="clearer"><!-- --></div>
		</div>
<?php }?>
		<div class="inner">
			<div class="clearer"><!-- --></div>
			<div id="BJ_Footer">
				<div id="BJ_Foot">
					<?php if($this->countModules('legals')) {?>
						<jdoc:include type="modules" name="legals" style="raw" />
					<?php } else {
					  include_once(_TEMPLATE_PATH.'/css/bottom.css.php'); }
					?>
				</div>
				<div id="BJ_Foot_Menu">
					<jdoc:include type="modules" name="footer" style="raw" />
				</div>
				<div class="clearer"><!-- --></div>
			</div>
			<div class="clearer"><!-- --></div>
		</div>
	</div>
	<div class="clearer"><!-- --></div>
</div>
<?php include_once(_TEMPLATE_PATH . DS . 'css' . DS . 'footer.css.php') ?>
</div>
</center>
<noscript>
<h6>Warning</h6>
<p>This website uses <a href="http://byjoomla.com/by-joomla-templates/bj-venus.html" title="ByJoomla's BJ! Venus Joomla 1.5 Template"><em>ByJoomla's BJ! Venus Joomla 1.5 Template, a Joomla template developed by ByJoomla.com</em></a></p>
<p>Visit <em><a href="http://byjoomla.com/" title="Download ByJoomla.com's BJ! Venus Pro">ByJoomla.com to download BJ! Venus PRO</a></em>.</p>
</noscript>
<script language="javascript" type="text/javascript" src="<?php echo _TEMPLATE_URL?>/func/venus.js">
</script>
</body>
</html><!-- Joomla Template by ByJoomla.com -->