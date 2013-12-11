<?php
function show_social_icons($permalink,$title){
	$title = htmlspecialchars($title);
	echo'<div class="socialicons">';
    echo '<a href="http://twitter.com/share?url='.$permalink.'&text='.$title.'" class="twitterlink tooltip-top" title="'. __("Share on Twitter", "framework").'">'. __("Share on Twitter", "framework").'</a>';
    echo '<a href="http://www.facebook.com/sharer.php?'.$permalink.'" class="fblink tooltip-top" title="'.__("Share on Facebook", "framework").'">'.__("Share on Facebook", "framework").'</a>';
    echo '<a href="mailto:?subject='.$title.'&body='.__("Check out", "framework").' &#39;'.$title .'&#39;:%0D%0A'.$permalink.'" class="maillink tooltip-top" title="'.__("Email This", "framework").'">'. __('Email This', 'framework').'</a>';
    echo '<div class="clear"></div></div>';
}

?>