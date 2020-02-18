<?php
    get_header();
?>
<h2>This is the page, not the post</h2>
<?php

    while(have_posts()){
        the_post();
?>
    <h3><?php the_title();?></h3>
    <?php the_content();?>
    <?php } ?>
<?php
    get_footer();
?>