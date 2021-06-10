//======================================================================
//  # andiamo a sovrascrivere il testo della mail di reset password #
//======================================================================
add_filter( 'retrieve_password_message', 'mrc_retrieve_password_message', 10, 4 );
function mrc_retrieve_password_message( $message, $key, $user_login, $user_data ) {

    // Start with the default content.
    $site_name = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
    $message = __( 'Someone has requested a password reset for the following account:' ) . "\r\n\r\n";
    /* translators: %s: site name */
    $message .= sprintf( __( 'Site Name: %s' ), $site_name ) . "\r\n\r\n";
    /* translators: %s: user login */
    $message .= sprintf( __( 'Username: %s' ), $user_login ) . "\r\n\r\n";
    $message .= __( 'If this was a mistake, just ignore this email and nothing will happen.' ) . "\r\n\r\n";
    $message .= __( 'To reset your password, visit the following address:' ) . "\r\n\r\n";
    $message .= '<' . network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . ">\r\n";


    $message .= '<http://yoursite.com/wp-login.php?action=rp&key=' . $key . '&login=' . rawurlencode( $user_login ) . ">\r\n";

    // Return the filtered message.
    return $message;

}
