
<form action="<?= get_site_url(); ?>">
    <input type="text" name="s" id="search-terms" placeholder="Ange ord som ska sökas." />
    <!-- <input type="hidden" name="post_type" value="event_listing">
    <input type="hidden" name="post_type" value="organisations"> -->
    <button type="submit" name="submit" class="search-icon"><i class="fa fa-fw fa-search"></i></button>
    <a href="#" class="search-close"><img src="<?= get_template_directory_uri(); ?>/img/close-icon.svg" alt="close-button"></a>
</form>