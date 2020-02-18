<?php
    get_header();
?>
<?php
    while(have_post()){
        the_post();
?>
    <h3><?php the_title();?></h3>
    <?php the_content();?>
    <?php } ?>
<?php
    get_footer();
?>