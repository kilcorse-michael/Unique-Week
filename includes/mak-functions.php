<?php
//determines current day of the week
  function mak_getWeekday(){
    global $today;
    $timestamp = current_time( 'timestamp' );
    $nDay = date('w', $timestamp);
    $options = array(get_option( 'mak_settings' ));
    switch($nDay){
      case 0:
        $today = $options[0]['mak_sunday'];
        break;
      case 1:
        $today = $options[0]['mak_monday'];
        break;
      case 2:
        $today = $options[0]['mak_tuesday'];
        break;
      case 3:
        $today = $options[0]['mak_wednesday'];
        break;
      case 4:
        $today = $options[0]['mak_thursday'];
        break;
      case 5:
        $today = $options[0]['mak_friday'];
        break;
      case 6:
       	$today = $options[0]['mak_saturday'];
        break;

  }
	return $today;
}

//add shortcode to insert on page
 function mak_Make_Plugin_Shortcode($atts, $Content=null) {
	$day = mak_getWeekday();
	$Content = "<center>";
	$Content .= "<h1 style='color: green; size='20rem'>";
	$Content .= $day;
	$Content .= "</h1>";
	$Content .= "</center>";

    return $Content;
}

add_shortcode('mak-plugin-content', 'mak_Make_Plugin_Shortcode');
