<?php

add_action( 'wp_ajax_customfunction', 'customfunction' ); // While logged in
add_action( 'wp_ajax_nopriv_retrieve_trustees', 'customfunction' ); // For all non logged in users.

function customfunction() {
    die();
}

?>