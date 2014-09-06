<form id="search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input type="search" class="nomargin" name="s" placeholder="<?php _e('Search', 'vanilj') ?>" value="<?php the_search_query(); ?>" />
</form>