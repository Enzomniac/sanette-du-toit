<?php
function portfolio_post_types() {
    register_post_type('gallery-post', array(
        'public' => true,
        'labels' => array(
            'name' => 'Gallery',
            'add_new_item' => "Add New Gallery Item",
            'edit_item' => 'Edit Gallery Item',
            'all_items' => 'All Gallery Items',
            'singular_name' => 'Gallery Item'
        ),
        'menu_icon' => 'dashicons-admin-customizer',
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'gallery'
        ),
        'supports' => array(
            'title', 'thumbnail'
        )
    ));
    register_post_type('gift-post', array(
        'public' => true,
        'labels' => array(
            'name' => 'Gifts',
            'add_new_item' => "Add New Gift",
            'edit_item' => 'Edit Gift',
            'all_items' => 'All Gifts',
            'singular_name' => 'Gift'
        ),
        'menu_icon' => 'dashicons-editor-contract',
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'gift'
        ),
        'supports' => array(
            'title', 'thumbnail'
        )
    ));
    register_post_type('transaction-post', array(
        'public' => true,
        'labels' => array(
            'name' => 'Transactions',
            'add_new_item' => "Add New Transaction Post",
            'edit_item' => 'Edit Transaction Post',
            'all_items' => 'All Transaction Posts',
            'singular_name' => 'Transaction Post'
        ),
        'menu_icon' => 'dashicons-cart',
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'transaction'
        ),
        'supports' => array(
            'title'
        )
    ));
}

add_action('init', 'portfolio_post_types');