<?php

function uploadfile()
{
    wp_enqueue_style('uploadfile-css', get_template_directory_uri() . '/inc/fileupload/uploadfile.css');
    wp_enqueue_script('uploadfile-js', get_template_directory_uri() . '/inc/fileupload/jquery.uploadfile.min.js', array('jquery'), '4.0.11');
    wp_enqueue_script('uploadfile-form', get_template_directory_uri() . '/inc/fileupload/jquery.form.min.js', array('jquery', 'uploadfile-js'), '4.0.11');
    wp_enqueue_script('uploadfile-init', get_template_directory_uri() . '/inc/fileupload/uploadfile.js', array('jquery', 'uploadfile-form'), '1.1');
    wp_localize_script('uploadfile-init', 'root', array(
        'url' => get_template_directory_uri(),
        'ajax' => admin_url('admin-ajax.php')
    ));
}

if(is_page_template( 'tpl-quote.php' )) {
    add_action('wp_enqueue_scripts', 'uploadfile');
}