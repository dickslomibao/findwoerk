<?php 
    date_default_timezone_set('Asia/Manila');

function get_time_ago( $time )
{            

    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return '1 sec'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'mnt',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hr',
                60                      =>  'min',
                1                       =>  'sec'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . '';
        }
    }
}

function decimal($num){
    return number_format($num, 2, '.', '');
}
?>
