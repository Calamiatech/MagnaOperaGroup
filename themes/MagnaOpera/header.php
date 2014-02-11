<?php
/**
 * The Theme Header
 * @package WordPress
 * @subpackage BigFormat
 * @since BigFormat 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php
global $browser;
$browser = $_SERVER['HTTP_USER_AGENT'];
?>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if ( $favicon = of_get_option('of_custom_favicon') ) { echo '<link rel="shortcut icon" href="'. $favicon.'"/>'; } ?>
<title>
<?php 
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'ellipsis' ), max( $paged, $page ) );

	?>
</title>
<!-- Embed Typekit Web Fonts -->
<script type="text/javascript" src="//use.typekit.net/uwh4uys.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!-- FontAwesome is Awesome! -->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!-- Skin-->
<link href="<?php echo get_template_directory_uri(); ?>/css/light.css" rel="stylesheet" type="text/css" media="all" />
<!--Skin -->
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" media="all" />
<!--Site Layout -->
<?php wp_head(); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.js"></script>
<?php if ( $customcss = of_get_option('of_custom_css') ) { 
echo '<style type="text/css">
' . $customcss . '
</style>'; } ?>

<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
</head>

<?php if ($hidenavbar = of_get_option('of_hide_nav')) :

		if ($hidenavbar == 'yes' && (is_singular('portfolio') || is_page_template('template-home.php') || is_page_template('template-home-video.php') ) ) : ?>
		<body <?php body_class('hidenavbar'); ?>> <?php 
		else : ?>
		<body <?php body_class(); ?>>
		<?php endif; 
		
else : ?>
    <body <?php body_class(); ?>>
<?php endif; ?>

<noscript>
<div class="alert">
    <p>
        <?php _e('Please enable javascript to view this site.', 'framework'); ?>
    </p>
</div>
</noscript>
<!-- Preload Images
	================================================== -->
<div id="preloaded-images"><img src="<?php echo get_template_directory_uri();?>/images/downarrow.png" width="1" height="1" alt="Image" /> 
<img src="<?php echo get_template_directory_uri();?>/images/loading.gif" width="1" height="1" alt="Image" /> 
<img src="<?php echo get_template_directory_uri();?>/images/uparrow.png" width="1" height="1" alt="Image" />
<img src="<?php echo get_template_directory_uri();?>/images/loading-dark.gif" width="1" height="1" alt="Image" /> 
<img src="<?php echo get_template_directory_uri();?>/images/minus.png" width="1" height="1" alt="Image" /> </div>
<!-- Primary Page Layout
	================================================== -->
<div class="navcontainer" id="navscroll">
    <div class="logo">
        <h1> <a href="<?php echo home_url(); ?>" class="fulllogo"><img src="<?php echo content_url(); ?>/themes/MagnaOpera/images/logo_magnaoperagroup.png" alt=""></a> </h1>
    </div>
    <div class="navigation">
        <!--Start Navigation-->
        <div class="nav">
            <?php if ( has_nav_menu( 'top_nav_menu' ) ) { /* if menu location 'Top Navigation Menu' exists then use custom menu */ ?>
                <?php wp_nav_menu( array('menu' => 'Top Navigation Menu', 'theme_location' => 'top_nav_menu', 'menu_class' => 'sf-menu sf-vertical')); ?>
            <?php } else { /* else use wp_list_pages */?>
                <ul class="sf-menu sf-vertical">
                    <?php wp_list_pages( array('title_li' => '','sort_column' => 'menu_order')); ?>
                </ul>
            <?php } ?>
        </div>
        <!-- <div class="menuarrow"><span class="arrow"><i class="fa fa-chevron-down"></i></span></div> -->
    </div>
    <div class="clear"></div>
    
    <?php 
	/* #If Full Projects Page
	======================================================*/
	if( is_page_template('template-home.php') || is_singular('portfolio') || is_page_template('template-home-video.php')) :     	
	   
       $video_url = get_post_meta(get_the_ID(), 'ag_video_url', true);	
	   $video_home_url = get_post_meta(get_the_ID(), 'ag_video_url_home', true);
	
    	/* #If there's no video URL
    	======================================================*/
    	if (!$video_url) : 
	?>
     
    <!--Control Bar-->
    <div id="controls-wrapper" class="load-item full">
        <div id="controls">
            <!--Slide counter-->
            <div id="slidecounter"> <span class="slidenumber"></span> / <span class="totalslides"></span> </div>
            <div class="clear"></div>
            <!--Arrow Navigation-->
            
            <div class="clear"></div>
            <!--Thumb Tray button-->
            <a id="tray-button" class="tooltip-top" title="<?php _e('See All Slides', 'framework'); ?>"><img id="tray-arrow" src="<?php echo get_template_directory_uri();?>/images/thumbsbutton.png"/></a>
            <div class="clear"></div>
            <!--Navigation-->
            <!-- <ul id="slide-list"></ul>-->
        </div>
    </div>
    
            <?php if (!is_singular('portfolio')) : ?>
    <!--Slide Buttons in Upper Right Corner-->
    <?/*<ul id="slide-list"></ul>*/?>
    
    <div id="prevthumb"></div>
	<div id="nextthumb"></div>
            <?php endif; ?>
    
        <?php 
    	/* #If There is a Video
    	======================================================*/
    	else: ?>
    
    <!-- Video Controls-->
    <div class="playvideocontrols"><a href="#" id="play-video" class="tooltip-top play" title="<?php _e('Play/Pause Video', 'framework'); ?>"><?php _e('Play/Pause Video', 'framework'); ?></a> </div>
	
    	<?php endif; ?>
    
        <?php 
    	/* #If There is a Homepage Video
    	======================================================*/
    	if ($video_home_url && is_page_template('template-home-video.php')): ?>
    <div class="playvideocontrols"><a href="#" id="play-video" class="tooltip-top play" title="<?php _e('Play/Pause Video', 'framework'); ?>"><?php _e('Play/Pause Video', 'framework'); ?></a> </div>
        <?php endif; ?>
        
        <!-- Navigation Panel Open/Close Button -->
    <a href="#" class="navhandle"></a>
    <?php endif;?>
</div>
<div class="playcontrols"> <a id="prevslide" class="load-item"></a> <a id="play-button" class="tooltip-top" title="<?php _e('Play/Pause Slideshow', 'framework'); ?>"><img id="pauseplay" src="<?php echo get_template_directory_uri();?>/images/pause-button.png"/></a> <a id="nextslide" class="load-item"></a> </div>


<?php if(is_front_page() || is_singular('portfolio')) : ?>
	<?php 
	/* #If there's no Video URL
	======================================================*/
    if (!$video_url) : 
    ?>
        <div id="thumb-tray" class="load-item">
            <div id="thumb-back"></div>
            <div id="thumb-forward"></div>
        </div>
        
        <!--Time Bar-->
        <div id="progress-back" class="load-item">
            <div id="progress-bar"></div>
        </div>
        
<?php endif; endif; ?>

<!-- Scroll to Top Function -->
<div class="top"> <a href="#"><img src="<?php echo get_template_directory_uri();?>/images/scroll-top.gif" alt="Scroll to Top"/></a>
    <div class="scroll">
        <p><?php _e('To Top', 'framework'); ?></p>
    </div>
</div>
<!-- Scroll to Top Function -->




<!-- Start Mainbody
  ================================================== -->
<div class="mainbody" id="wrapper">