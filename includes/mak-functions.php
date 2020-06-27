<?php

//determines current day of the week
  function mak_getWeekday(){
    global $today;
    $timestamp = current_time( 'timestamp' );
    $nDay = date('w', $timestamp);
    $options = array(get_option( 'wpse61431_settings' ));
    switch($nDay){
      case 0:
        $today = $options[0]['wpse61431_sunday'];
        break;
      case 1:
        $today = $options[0]['wpse61431_monday'];
        break;
      case 2:
        $today = $options[0]['wpse61431_tuesday'];
        break;
      case 3:
        $today = $options[0]['wpse61431_wednesday'];
        break;
      case 4:
        $today = $options[0]['wpse61431_thursday'];
        break;
      case 5:
        $today = $options[0]['wpse61431_friday'];
        break;
      case 6:
       	$today = $options[0]['wpse61431_saturday'];
        break;

  }
	return $today;
}

//add shortcode to insert on page
 function mak_Make_Plugin_Shortcode($atts, $Content=null) {
	$day = mak_getWeekday();
	$Content = "<style>\r\n";
	$Content .= "h3.demoClass {\r\n";
	$Content .= "color: #26b158;\r\n";
	$Content .= "}\r\n";
	$Content .= "</style>\r\n";
	$Content .= "<center>";
	$Content .= $day;
	$Content .= "</center>";

    return $Content;
}

add_shortcode('mak-plugin-content', 'mak_Make_Plugin_Shortcode');
