<?php
/*
 * Add the admin page
 */
add_action('admin_menu', 'wpse61431_admin_page');
function wpse61431_admin_page(){
    add_menu_page('Unique Week Settings', 'Unique Week', 'administrator', 'wpse61431-settings', 'wpse61431_admin_page_callback');
}

/*
 * Register the settings
 */
add_action('admin_init', 'wpse61431_register_settings');
function wpse61431_register_settings(){
    //this will save the option in the wp_options table as 'wpse61431_settings'
    //the third parameter is a function that will validate your input values
    register_setting('wpse61431_settings', 'wpse61431_settings', 'wpse61431_settings_validate');
}

//Display the validation errors and update messages


//The markup for your plugin settings page
function wpse61431_admin_page_callback(){ ?>
    <div class="wrap">
    <h2>Unique Week Settings</h2>
    <form action="options.php" method="post"><?php
        settings_fields( 'wpse61431_settings' );
        do_settings_sections( __FILE__ );

        //get the older values, wont work the first time
        $options = get_option( 'wpse61431_settings' );
$mak_sets = array("wpse61431_sunday",
                  "wpse61431_monday",
                  "wpse61431_tuesday",
                  "wpse61431_wednesday",
                  "wpse61431_thursday",
                  "wpse61431_friday",
                  "wpse61431_saturday") ?>

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
                    <input name="wpse61431_settings[<?php echo $value ?>]" type="text" id="<?php echo $value ?>" value="<?php echo (isset($options[$value]) && $options[$value] != '') ? $options[$value] : ''; ?>"/>
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
