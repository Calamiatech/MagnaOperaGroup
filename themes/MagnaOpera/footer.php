
<!-- Close Mainbody and start footer
  ================================================== -->

<!-- Theme Hook -->
<?php wp_footer(); ?>
</div>
<!-- Close Site Container
  ================================================== -->
  <?php echo of_get_option('of_google_analytics'); ?>
  
<!-- basic javascripts -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/main.js"; ?>"></script>
<!-- MOBILE NAV -->

<div class="mobilenavcontainer mobile">
   <div class="mobile-logo logo">
        <h1> <a href="#about" class="mobile">
            <?php include(get_stylesheet_directory() . "/images/m-logo.svg"); ?>
            </a> 
        </h1>
    </div>
</div> 
<div class="mobile about-contact-page hidden">
    <div class="mobilenav">
        <div class="mobile logo"><a href="<?php echo home_url(); ?>" class="mobile">
            <?php include(get_stylesheet_directory() . "/images/m-logo.svg"); ?>
            </a>
        </div>
        <div class="mobile close">
            <a href="#close" >
            </a>
        </div>
        <div class="mobile menu">
            <ul>
                <li><a id="MobiMenuLink" href="#work"><h2>See Our Work</h2></a></li>
            </ul>
        </div>
    </div>
    <div id="about" class="mobile content about">
        <?php
            $about_page_id = 2;
            $about_page = get_post($about_page_id);
            $content = $about_page->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            echo $content;
        ?>
    </div>
    <div id="contact" class="mobile content contact">
        <?php
            $about_page_id = 19;
            $about_page = get_post($about_page_id);
            $content = $about_page->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            echo $content;
        ?>
    </div>
    <div id="work" class="mobile content work">
        <!-- Project Container -->
        <div id="workcontainer" class="mobile projects works">
            <?php  
/* #Grab the global ProperPagination and WP_Query instances
===========================================================*/
global $pp, $wp_query, $wp;

$counter = 1; 
if($projects = of_get_option('of_projects_number')) 
    { $posts_per_page = $projects; }
else { $posts_per_page = 8;}
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$wp_query = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page'=> $posts_per_page, 'paged' => $paged)); // Construct the custom WP_Query instance

/* #Loop through your posts...
======================================================*/
while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
    $portfoliodisplay = get_post_meta(get_the_ID(), 'ag_portfolio_page_display', true);

    if ($portfoliodisplay !== true) :
        $post_url = get_permalink(); //Get Permalink for post
        $thumb1 = get_post_meta($post->ID,'_thumbnail_id',false); 
        $thumb = wp_get_attachment_image_src($thumb1[0], 'portfoliosmall', false); 

?>
            <!-- Portfolio Item -->
            <div class="portfoliolistitem outlineglow">
                <a href="<?php echo $post_url; ?>" data-url="<?php the_ID(); ?>">
                    <div class="imagecontainer">
                        <img src="<?php  echo $thumb[0]; ?>" alt="" class=""/>
                    </div>
                    <div class="titlecontainer">
                        <h1><?php the_title();?></h1>
                    </div>
                </a>
            </div>
            <!-- Portfolio Item -->
<?php
    endif; // End if($portfoliodisplay !== true)
endwhile; //End while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
?>
        </div>
    </div>
</div>
</body>
</html>
