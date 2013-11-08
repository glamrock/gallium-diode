<?php
// FuckFlickr theme: header.php
// page header, included on every page

// record how long this takes
$time = explode(' ', microtime());
$time = $time[1] + $time[0];
$begintime = $time;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
  ##############################################################
  ##    ___              __     ___ __ __        __           ##
  ##  .'  _|.--.--.----.|  |--.'  _|  |__|.----.|  |--.----.  ##
  ##  |   _||  |  |  __||    <|   _|  |  ||  __||    <|   _|  ##
  ##  |__|  |_____|____||__|__|__| |__|__||____||__|__|__|    ##
  ##############################################################
-->
<head>
	<title><?php $this->pageTitle(); ?></title>

	<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php print $this->urlFor('rss', $this->dir); ?>" />

	<link href="<?php echo $this->dir_tmpl ?>css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
	<link href="<?php echo $this->dir_tmpl ?>css/thickbox.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
	<!--[if lt IE 7]><style type="text/css">.preview a { border-color: #000000; }</style><![endif]-->
	
  <script type="text/javascript" charset="utf-8">var tb_pathToImage = "<?php echo $this->dir_tmpl ?>images/loading.gif";</script>
	<script src="<?php echo $this->dir_tmpl ?>js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $this->dir_tmpl ?>js/jquery.thickbox.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $this->dir_tmpl ?>js/jquery.preload-min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $this->dir_tmpl ?>js/application.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div id="container">
	<div id="navigation">
		<!-- rss -->
		<a href="<?php print $this->urlFor('rss', $this->dir); ?>" title="RSS feed of new adds" class="rss"><img src="<?php echo $this->dir_tmpl ?>images/feed-icon32x32.png" border="0" /></a>		
		
		<!-- have it your way -->
		<div id="settings"><form>
		<label for="ff_sort">sort by: </label><select id="ff_sort" name="sort">
				<option value="<?php echo $this->urlFor('dir', $this->dir, '', '', 'sort') ?>"<?php if ($this->reqs['sort'] == 'date') echo ' selected' ?>>Recently Added</option>
				<option value="<?php echo $this->urlFor('dir', $this->dir, '', 'sort=name', 'sort') ?>"<?php if ($this->reqs['sort'] == 'name') echo ' selected' ?>>Name</option>
			</select><noscript><input type="submit" value="Sort" /></noscript></form>
		</div> <!-- /#settings -->

		<!-- regular title -->
		<a href="<?php echo $this->dir_root ?>"><?php echo FF_NAME ?></a>
		<?php 
		// TODO clean this up. could use a directory(), parent(), breadcrumbs(), navigation() etc.
		if ($this->dir != FF_DATA_DIR)
			$parent = str_replace(FF_DATA_DIR, '', $this->dir);
			$built = '';
			foreach(explode('/', str_replace(FF_DATA_DIR, '', $this->dir)) as $dir) {
				if(empty($dir)) continue;
				$path = FF_DATA_DIR . $built . $dir .'/';
				if (empty($this->dir_info[$path . $dir])) $this->readDirInfo($path, $path);
				$url = preg_replace('/\/$/','',$this->urlFor( 'dir', $built . cleanDirname($dir)) ).'/'; // strip possible trailing slash (?) and add again
				echo ' / <a href="'.$url.'">'. ((!empty($this->dir_info[$path]['directory']['title'])) ? $this->dir_info[$path]['directory']['title'] : $dir) .'</a>'; 
				$built .= $dir .'/';
			}

		?>
	</div>

	<div id="main">
