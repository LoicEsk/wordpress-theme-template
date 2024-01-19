<?php

/**
 * Plugin Name: Mailhog
 */

// show wp_mail() errors
add_action( 'wp_mail_failed', 'onMailError', 10, 1 );
function onMailError( $wp_error ) {
    echo "<pre>";
    print_r($wp_error);
    echo "</pre>";
} 

// remplace le domaine localhost qui fait planter l'envoi par localhost.docker
function wporg_replace_user_mail_from( $from_email ) {
    $parts = explode( '@', $from_email );
    return $parts[0] . '@localhost.docker';
}
 
add_filter( 'wp_mail_from', 'wporg_replace_user_mail_from' );

add_action( 'phpmailer_init', 'mailer_config', 10, 1);
function mailer_config($mailer){
  $mailer->IsSMTP();
  $mailer->Host = "mailhog"; // your SMTP server
  $mailer->Port = 1025;
//   $mailer->SMTPDebug = 2; // write 0 if you don't want to see client/server communication in page
  $mailer->CharSet  = "utf-8";
}