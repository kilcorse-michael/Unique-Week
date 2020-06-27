<?php
/*
 * Add my new menu to the Admin Control Panel
 */



//determines current day of the week
  function mak_getWeekday(){
    global $today;
    $timestamp = current_time( 'timestamp' );
    $nDay = date('w', $timestamp);
    $options = array(get_option( 'wpse61431_settings' ));
    switch($nDay){
      case 0:
        $today = "<h3>Check it out!</h3>";
        break;
      case 1:
        $today = "<h3>Check it out!</h3>";
        break;
      case 2:
        $today = "<h3>Check it out!</h3>";
        break;
      case 3:
        $today = "<h3>Check it out!</h3>";
        break;
      case 4:
        echo "<h3>Happy Thursday</h3>";
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
	$Content .= $day;
	 
    return $Content;
}

add_shortcode('mak-plugin-content', 'mak_Make_Plugin_Shortcode');
