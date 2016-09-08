define( 'FACEBOOK_REQUEST_THROTTLE', 2.0 ); // Number of seconds permitted between each hit from facebookexternalhit

if( !empty( $_SERVER['HTTP_USER_AGENT'] ) && preg_match( '/^facebookexternalhit/', $_SERVER['HTTP_USER_AGENT'] ) ) {
    $fbTmpFile = sys_get_temp_dir().'/facebookexternalhit.txt';
    if( $fh = fopen( $fbTmpFile, 'c+' ) ) {
        $lastTime = fread( $fh, 100 );
        $microTime = microtime( TRUE );
        // check current microtime with microtime of last access
        if( $microTime - $lastTime < FACEBOOK_REQUEST_THROTTLE ) {
            // bail if requests are coming too quickly with http 503 Service Unavailable
            header( $_SERVER["SERVER_PROTOCOL"].' 503' );
            die;
        } else {
            // write out the microsecond time of last access
            rewind( $fh );
            fwrite( $fh, $microTime );
        }
        fclose( $fh );
    } else {
        header( $_SERVER["SERVER_PROTOCOL"].' 503' );
        die;
    }
}
