//======================================================================
//	# andiamo a sovrascrivere l'oggetto della mail di reset password #
// //======================================================================
function mrc_filter_retrieve_password_title( $title, $user_login, $user_data ) { 

    $title = 'Recupero password area riservata Marco';
    return $title; 
}; 
         
// add the filter 
add_filter( 'retrieve_password_title', 'mrc_filter_retrieve_password_title', 10, 3 );
