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
        $options = get_option( 'wpse61431_settings' ); ?>
   <table class="form-table">
       <tr>
           <th scope="row">Sunday</th>
           <td>
               <fieldset>
                   <label>
                       <input name="wpse61431_settings[wpse61431_sunday]" type="text" id="wpse61431_sunday" value="<?php echo (isset($options['wpse61431_sunday']) && $options['wpse61431_sunday'] != '') ? $options['wpse61431_sunday'] : ''; ?>"/>
                       <br />
                   </label>
               </fieldset>
           </td>
       </tr>
       <tr>
           <th scope="row">Monday</th>
           <td>
               <fieldset>
                   <label>
                       <input name="wpse61431_settings[wpse61431_monday]" type="text" id="wpse61431_monday" value="<?php echo (isset($options['wpse61431_monday']) && $options['wpse61431_monday'] != '') ? $options['wpse61431_monday'] : ''; ?>"/>
                       <br />
                   </label>
               </fieldset>
           </td>
       </tr>
       <tr>
           <th scope="row">Tuesday</th>
           <td>
               <fieldset>
                   <label>
                       <input name="wpse61431_settings[wpse61431_tuesday]" type="text" id="wpse61431_tuesday" value="<?php echo (isset($options['wpse61431_tuesday']) && $options['wpse61431_tuesday'] != '') ? $options['wpse61431_tuesday'] : ''; ?>"/>
                       <br />
                   </label>
               </fieldset>
           </td>
       </tr>
       <tr>
           <th scope="row">Wednesday</th>
           <td>
               <fieldset>
                   <label>
                       <input name="wpse61431_settings[wpse61431_wednesday]" type="text" id="wpse61431_wednesday" value="<?php echo (isset($options['wpse61431_wednesday']) && $options['wpse61431_wednesday'] != '') ? $options['wpse61431_wednesday'] : ''; ?>"/>
                       <br />
                   </label>
               </fieldset>
           </td>
       </tr>
       <tr>
           <th scope="row">Thursday</th>
           <td>
               <fieldset>
                   <label>
                       <input name="wpse61431_settings[wpse61431_thursday]" type="text" id="wpse61431_thursday" value="<?php echo (isset($options['wpse61431_thursday']) && $options['wpse61431_thursday'] != '') ? $options['wpse61431_thursday'] : ''; ?>"/>
                       <br />
                   </label>
               </fieldset>
           </td>
       </tr>
       <tr>
           <th scope="row">Friday</th>
           <td>
               <fieldset>
                   <label>
                       <input name="wpse61431_settings[wpse61431_friday]" type="text" id="wpse61431_friday" value="<?php echo (isset($options['wpse61431_friday']) && $options['wpse61431_friday'] != '') ? $options['wpse61431_friday'] : ''; ?>"/>
                       <br />
                   </label>
               </fieldset>
           </td>
       </tr>
       <tr>
           <th scope="row">Saturday</th>
           <td>
               <fieldset>
                   <label>
                       <input name="wpse61431_settings[wpse61431_saturday]" type="text" id="wpse61431_saturday" value="<?php echo (isset($options['wpse61431_saturday']) && $options['wpse61431_saturday'] != '') ? $options['wpse61431_saturday'] : ''; ?>"/>
                       <br />
                   </label>
               </fieldset>
           </td>
       </tr>
   </table>
   <input type="submit" value="Save" />
</form>
</div>
<?php }
?>
