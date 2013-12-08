/*-----------------------------------------------------------------------------------*/
/*  *Sitewide Background Image (Non-Mobile)
/*-----------------------------------------------------------------------------------*/   
body { 
	<?php 
    if ( $data['of_background_image'] ) {  
        echo 'background-image:url('.$data['of_background_image'].');';  
    } else { 
        if ($data['of_texture_bg'] ) { 
            if($data['of_texture_bg'] != 'none') { 
                echo 'background-image:url('.$data['of_texture_bg'].');'; 
            } 
        } 
    } 
    ?> 
    background-repeat:repeat; 
    background-position:center top; 
    } 
    
/*-----------------------------------------------------------------------------------*/
/*  *Logo Margin
/*-----------------------------------------------------------------------------------*/    
<?php 
// Get Logo Margin
if ( $data['of_logo_padding'] ) { echo '.logo { margin-top:'.$data['of_logo_padding'].'px !important; }'; }
?>	  

/*-----------------------------------------------------------------------------------*/
/*  *Homepage Slideshow Controls
/*-----------------------------------------------------------------------------------*/    

<?php if ( $slidecontrols = $data['of_slide_controls'] ) { 
		if ($slidecontrols != 'block') { 
			echo '.home #controls-wrapper, .home #slide-list { display: none !important; }';
		} 
	  } ?>       

    
/*-----------------------------------------------------------------------------------*/
/*  *Texture Over Images
/*-----------------------------------------------------------------------------------*/   
.lines, .linesmobile {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: url(<?php echo get_template_directory_uri(); ?>/images/skins/textures/dotpattern.png) repeat;
	z-index: 0;
}


/*-----------------------------------------------------------------------------------*/
/*  *Button Color Options
/*-----------------------------------------------------------------------------------*/   

.button:hover, a.button:hover, a.more-link:hover, #footer .button:hover, #footer a.button:hover, #footer a.more-link:hover, .cancel-reply p a:hover, #submit:hover {
		   
<?php 
// Get Button Color
if ( $buttonhover = $data['of_button_hover_color'] ) { echo 'background:'.$buttonhover.'!important;'; }
?>	
color:#fff;
}

.button, a.button, a.more-link, #footer .button, #footer a.button, #footer a.more-link, .cancel-reply p a, .filter li a:hover, .filter li a.active, .categories a:hover, #submit  {
		   
<?php 
// Get Button Color
if ( $buttoncolor = $data['of_button_color'] ) { echo 'background:'.$buttoncolor.';'; }
?>	
color:#fff;
}

/*-----------------------------------------------------------------------------------*/
/*  *Link Color Options
/*-----------------------------------------------------------------------------------*/   

p a, a {
<?php 
// Get Link Color
if ( $linkcolor = $data['of_link_color'] ) { echo 'color:'.$linkcolor.';'; } 
?>	
}

h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, p a:hover, 
#footer h1 a:hover, #footer h2 a:hover, #footer h3 a:hover, #footer h3 a:hover, #footer h4 a:hover, #footer h5 a:hover, a:hover, #footer a:hover, .blogpost h2 a:hover, .blogpost .smalldetails a:hover {
<?php 
// Get Link Hover Color
if ( $linkhover = $data['of_link_hover_color'] ) { echo 'color:'.$linkhover.';'; } 
?>	
}

.recent-project:hover {
<?php 
// Get Link Color
if ( $linkcolor = $data['of_link_color'] ) { echo 'border-color:'.$linkcolor.';'; } 
?>
}

/*-----------------------------------------------------------------------------------*/
/*  *Selection Colors to Match Link Hover Color
/*-----------------------------------------------------------------------------------*/   

::-moz-selection {
<?php 
// Get heading font choices
if ( $linkhover = $data['of_link_hover_color'] ) { echo 'background:'.$linkhover.'; color:#fff;'; } 
?>	
}

::selection {
<?php 
// Get heading font choices
if ( $linkhover = $data['of_link_hover_color'] ) { echo 'background:'.$linkhover.'; color:#fff;'; } 
?>	
}

::selection {
<?php 
// Get heading font choices
if ( $linkhover = $data['of_link_hover_color'] ) { echo 'background:'.$linkhover.'; color:#fff;'; } 
?>	
}

/*-----------------------------------------------------------------------------------*/
/*  Slideshow Fonts Selections
/*-----------------------------------------------------------------------------------*/

/* #Hompage Caption Title Font
======================================================*/

#slidecaption h2, #homevideocaption h2 {
<?php $slide_header = $data['of_slide_header'];
	if ($slide_header) { // Options	
		echo 'font:' . $slide_header['style'] . ' 62px "' . $slide_header['face']. '", arial, sans-serif;';
		echo 'font-family:"' . $slide_header['face']. '", arial, sans-serif;';
		echo 'text-transform:'. $slide_header['style2']. ';'; 
		echo 'font-size: 62px;';
		echo 'line-height: 90%;';
	} else { // Defaults
		echo 'font: bold 62px "PT Sans Narrow", arial, sans-serif;';
		echo 'font-family: "PT Sans Narrow", arial, sans-serif;';
		echo 'text-transform: uppercase;';
		echo 'line-height: 90%;';
	} 
?>
}

/* #Hompage Caption Subititle Font
======================================================*/
#slidecaption span, #homevideocaption span {
<?php $slide_subtitle = $data['of_slide_subtitle'];  
  if ($slide_subtitle) { // Get Options
	  
	if ($slide_subtitle['style'] == 'bold italic') {
		echo 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
	} else if ($slide_subtitle['style'] == 'bold'){
		echo 'font-weight: bold;';
	} else {
		echo 'font-style:'. $slide_subtitle['style']. ';';	
	}
	
	  echo 'font-family:"' . $slide_subtitle['face']. '", arial, sans-serif;';
		if ($slide_subtitle['style2'] == 'uppercase') {
			echo 'letter-spacing: 1px;';	
		}	
	  echo 'text-transform:'. $slide_subtitle['style2']. ';';
	  echo 'font-size: 16px;';
      echo 'line-height: 16px;';
  } else {
	   echo 'font-family: "Droid Serif", georgia, sans-serif;';
	   echo 'font-size: 16px;';
       echo 'line-height: 16px;';
  } 
?>
}

/*-----------------------------------------------------------------------------------*/
/*  Menu Font
/*-----------------------------------------------------------------------------------*/

.sf-menu a {

<?php $typography = $data['of_sf_font']; 
  if ($typography) { // Get Options
	  
	if ($typography['style'] == 'bold italic') {
		echo 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
	} else if ($typography['style'] == 'bold'){
		echo 'font-weight: bold;';
	} else {
		echo 'font-style:'. $typography['style']. ';';	
	}
	
	  echo 'font-family:"' . $typography['face']. '", arial, sans-serif;';
		if ($typography['style2'] == 'uppercase') {
			echo 'letter-spacing: 1px;';	
		}	
	  echo 'text-transform:'. $typography['style2']. ';';
	  echo 'font-size: 13px;';
      echo 'line-height: 18px;';
  } else {
	   echo 'font: normal 13px "PT Sans Narrow", arial, sans-serif;';
	   echo 'font-family: "PT Sans Narrow", arial, sans-serif;';
	   echo 'text-transform: uppercase;';
	   echo 'letter-spacing: 1px;';	
  } 
?>
}

/*-----------------------------------------------------------------------------------*/
/*  Site Wide Heading Font
/*-----------------------------------------------------------------------------------*/

/* #Primary Heading Option
======================================================*/

h1, h1 a,
h2, h2 a {
<?php $headingfont = $data['of_heading_font'];
  if ($headingfont) { // Get Options
	  
	if ($headingfont['style'] == 'bold italic') {
		echo 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
	} else if ($headingfont['style'] == 'bold'){
		echo 'font-weight: bold;';
	} else {
		echo 'font-style:'. $headingfont['style']. ';';	
	}
	
	  echo 'text-transform:'. $headingfont['style2']. ';';
	  	if ($headingfont['style2'] == 'uppercase') {
			echo 'letter-spacing: 1px;';	
		}	
	  echo 'font-family:"' . $headingfont['face']. '", arial, sans-serif;';
      echo 'line-height: 100%;';
  } else {
	  echo 'font-family: "PT Sans Narrow", arial, sans-serif;';
	  echo 'text-transform: uppercase;';		
  } 
?>
} 

/* #Secondary Heading Option
======================================================*/
h3, h3 a,
h4, h4 a,
h5, h5 a {
<?php $headingfont2 = $data['of_heading_font2'];
  if ($headingfont2) { // Get Options
	  
	if ($headingfont2['style'] == 'bold italic') {
		echo 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
	} else if ($headingfont2['style'] == 'bold'){
		echo 'font-weight: bold;';
	} else {
		echo 'font-style:'. $headingfont2['style']. ';';	
	}
	
	  echo 'text-transform:'. $headingfont2['style2']. ';';
	  if ($headingfont2['style2'] == 'uppercase') {
			echo 'letter-spacing: 1px;';	
		}	
	  echo 'font-family:"' . $headingfont2['face']. '", arial, sans-serif;';
      echo 'line-height: 100%;';
  } else {
	  echo 'font-family: "PT Sans Narrow", arial, sans-serif;';
	  echo 'text-transform: uppercase;';		
  } 
?>
} 

/* #Tiny Details Font
======================================================*/

h5, h5 a, .widget h3, .widget h2, .widget h4  {
<?php 

// Get tiny font option
if ( $tinyfont = $data['of_tiny_font'] ) { echo 'font-family:"'.$tinyfont['face'].'", arial, sans-serif;'; } ?>
}


/* #Body Font Option
======================================================*/

body, input, p, ul, ol, .button, .ui-tabs-vertical .ui-tabs-nav li a span.text,
.footer p, .footer ul, .footer ol, .footer.button, .credits p,
.credits ul, .credits ol, .credits.button, textarea, .footer input, .testimonial p, 
.contactsubmit label, .contactsubmit input[type=text], .contactsubmit textarea {


<?php $pfont = $data['of_p_font'];
	if ($pfont) {
		
		if ($pfont['style'] == 'bold italic') {
			echo 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
		} else if ($pfont['style'] == 'bold'){
			echo 'font-weight: bold;';
		} else {
			echo 'font-style:'. $pfont['style']. ';';	
		}
		
		echo 'font-size:12px;';
		echo 'font-family:"'. $pfont['face']. '", arial, sans-serif !important;';
		echo 'text-transform:'. $pfont['style2']. ';';	
		echo 'line-height: 150%;';
    } ?>
}


/* #Slide Controls Option
======================================================*/
.page-template-template-home-php #controls-wrapper, .page-template-template-home-php ul#slide-list {
	<?php if ($slidecontrols = $data['of_slide_controls']) : ?>
        display: <?php echo $slidecontrols;  else: echo 'block' ?>
    <?php endif; ?>;
}

/* #Slide Progress Bar Option
======================================================*/
<?php if ( $progressbar = $data['of_progress_bar'] ) :
		if ($progressbar == 0) : ?>
        	.home #progress-back {
            	display:none !important;
            }
  <?php endif; 
     endif; 
?>

<?php if ( $portprogressbar = $data['of_portfolio_progress_bar'] ) :
		if ($portprogressbar == 0) : ?>
        	.single-portfolio #progress-back {
            	display:none !important;
            }
  <?php endif; 
     endif; 
?>