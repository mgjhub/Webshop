<?php
function enqueue_parent_theme_style() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_parent_theme_style');

function add_custom_content_after_add_to_cart_button() {
    global $product;

    $times_used = get_field("times_used");
    $material = get_field("material");
    $year = get_field("year");
    $season = get_field("season");

    echo '<div class="custom-fields">';
    echo '<p>Material: ' . esc_html($material) . '</p>';
    echo '<p>Year: ' . esc_html($year) . '</p>';
    echo '<p>Season: ' . esc_html($season) . '</p>';
    echo '</div>';
}
add_action("woocommerce_after_add_to_cart_form", "add_custom_content_after_add_to_cart_button");

function remove_related_products() {
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
}
add_action('init', 'remove_related_products');

// WIDGETS
function widget_material() {
    register_sidebar(array(
    "name" => "material",
    "id" => "material_sidebar",
    "before_widget" => "",
    "after_widget" => ""
    ));
}

add_action("widgets_init", "widget_material");

function material_sidebar(){
    dynamic_sidebar("material_sidebar");
}
add_action("woocommerce_before_shop_loop", "material_sidebar");

function widget_season() {
    register_sidebar(array(
    "name" => "season",
    "id" => "season_sidebar",
    "before_widget" => "",
    "after_widget" => ""
    ));
}
add_action("widgets_init", "widget_season");

function season_sidebar(){
    dynamic_sidebar("season_sidebar");
}
add_action("woocommerce_before_shop_loop", "season_sidebar");

function widget_year() {
    register_sidebar(array(
    "name" => "year",
    "id" => "year_sidebar",
    "before_widget" => "",
    "after_widget" => ""
    ));
}
add_action("widgets_init", "widget_year");

function year_sidebar() {
    dynamic_sidebar("year_sidebar");
}
add_action("woocommerce_before_shop_loop", "year_sidebar");


 add_filter("woocommerce_enqueue_styles", "__return_empty_array"); 