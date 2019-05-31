<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="logo-area">
            <div class="logo__header">
                <h1 class="logo__title">
                    Sanette du Toit
                </h1>
            </div>
        </div>
        <input type="checkbox" name="nav-toggle" id="nav-toggle" class="nav-toggle">
        <label for="nav-toggle" class="nav-toggle-label">
            <span></span>
        </label>
        <nav>            
            <a href="<?php echo(site_url()); ?>" class="nav__item">GALLERY</a>
            <a href="<?php echo(site_url('/blog')); ?>" class="nav__item">BLOG</a>
            <a href="<?php echo(site_url('/biography')); ?>" class="nav__item">BIOGRAPHY</a>
            <a href="<?php echo(site_url('/contact')); ?>" class="nav__item">CONTACT</a>           
        </nav>
    </header>