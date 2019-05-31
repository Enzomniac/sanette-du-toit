<?php

function basic_files() {
  wp_enqueue_style('basic_style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'basic_files');



