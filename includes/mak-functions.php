<?php
/*
 * Add the admin page
 */
add_action('admin_menu', 'mak_admin_page');
function mak_admin_page(){
    add_menu_page('Unique Week Settings', 'Unique Week', 'administrator', 'mak-settings', 'mak_admin_page_callback');
}

/*
 * Register the settings
 */
add_action('admin_init', 'mak_register_settings');
function mak_register_settings(){
    //this will save the option in the wp_options table as 'mak_settings'
    //the third parameter is a function that will validate your input values
    register_setting('mak_settings', 'mak_settings', 'mak_settings_validate');
}

//sanitize the data before saving
function mak_settings_validate($input){

	// Initialize the new array that will hold the sanitize values
  $new_input = array();
	// Loop through the input and sanitize each of the values
  foreach ( $input as $key => $val ) {
    	$new_input[ $key ] = ( isset( $input[ $key ] ) ) ?
      sanitize_text_field( $val ) :
      		'';
	}
	return $new_input;

}

//The markup for your plugin settings page
function mak_admin_page_callback(){ ?>
    <div class="wrap">
    <h2>Unique Week Settings</h2>
    <form action="options.php" method="post"><?php
        settings_fields( 'mak_settings' );
        do_settings_sections( __FILE__ );

        //get the older values, wont work the first time
        $options = get_option( 'mak_settings' );
        $mak_sets = array("mak_sunday",
                          "mak_monday",
                          "mak_tuesday",
                          "mak_wednesday",
                          "mak_thursday",
                          "mak_friday",
                          "mak_saturday") ?>

   <table class="form-table">
       <?php
          foreach($mak_sets as $key => $value){ ?>
            <tr>
              <th scope="row"><?php switch($key){
                                      case 0:
                                        echo "Sunday";
                                        break;
                                      case 1:
                                        echo "Monday";
                                        break;
                                      case 2:
                                        echo "Tuesday";
                                        break;
                                      case 3:
                                        echo "Wednesday";
                                        break;
                                      case 4:
                                        echo "Thursday";
                                        break;
                                      case 5:
                                        echo "Friday";
                                        break;
                                      case 6:
                                        echo "Saturday";
                                        break;
                                    }  ?>
              <td>
                <fieldset>
                  <label>
                    <input name="mak_settings[<?php echo $value ?>]" type="text" id="<?php echo $value ?>" value="<?php echo (isset($options[$value]) && $options[$value] != '') ? $options[$value] : ''; ?>"/>
                    <br />
                </label>
            </fieldset>
        </td>
    </tr>
          <?php
          }
       ?>
   </table>
   <input type="submit" value="Save" />
</form>
</div>
<?php }
?>
