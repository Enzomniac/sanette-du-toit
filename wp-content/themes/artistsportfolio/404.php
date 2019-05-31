<?php 
get_header();
?>

    <main>
        <div class="page__404">
            <h1 class="title__404">
                PAGE NOT FOUND
            </h1>
            <div class="content__404">
                <h3 class="list-title__404">
                    Please visit one of my following pages:
                </h3>
                <ul class="list__404">
                    <li class="list-item__404"><a href="<?php echo(site_url()); ?>" class="404__link link__plain">GALLERY</a></li>
                    <li class="list-item__404"><a href="<?php echo(site_url('/blog')); ?>" class="404__link link__plain">BLOG</a></li>
                    <li class="list-item__404"><a href="<?php echo(site_url('/biography')); ?>" class="404__link link__plain">BIOGRAPHY</a></li>
                    <li class="list-item__404"><a href="<?php echo(site_url('/contact')); ?>" class="404__link link__plain">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </main>

<?php 
get_footer();
?>