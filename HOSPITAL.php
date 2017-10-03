<?php
/*
Plugin Name: Hospital CMS
Plugin URI: http://bilagi.org
Description: This is for patient to book appintment with doctors. This plugin has mobile app to be downloaded from app store. Using this mobile app doctor or his/her secretory can confirm rescedule the patient booked appointment. The data is trasfered is in json format this can inigrated wih any other softwere. There is facilty for chatbox. patient can chat recive instractions.
Author: Dr Umesh R Bilagi
Author URI: http://bilagi.org
Text Domain: DoctorAppointmentO

*/ 

//to prevent unauhorized axis
$name_space= "DoctorAppointment";//this var is used for prefixing  the objects in this plugin to prevent confilcts
                                    //even funcion can be called as be prefixed by this
if(! defined("ABSPATH")){
    die;
}


// ===============================================
// acvtivation and deactivation of plugin
// =============================================
function HOSPITAL_activate(){
    flush_rewrite_rules();
};

function HOSPITAL_deactivate(){

}


if (file_exists(plugin_dir_path(__FILE__) ."/Appointments/doctor-appointment.php")){
    require_once(plugin_dir_path(__FILE__). "/Appointments/doctor-appointment.php");

}



// ======================================================
// loading template by checking the template  for  each post_type
// =====================================================
add_action( "template_include", "Hospital_load_template");
function Hospital_load_template($original_template){

    if (get_post_type() =="doctorappointment"){//this checks for post_type =doctorappointment    

        if (is_archive() || is_search()){

            if (file_exists(get_stylesheet_directory()."/archive-doctorappointment.php")){

                return get_stylesheet_directory() ."/archive-doctorappointment.php";
            }else{
                return plugin_dir_path(__FILE__) ."/Appointments/templates/archive-doctorappointment.php";
            }

        }elseif (is_single()){
            if(file_exists(get_stylesheet_directory(). "/single-doctorappointment.php")){

                return get_stylesheet_directory() . "/single-doctorappointment.php";

            }else{
                load_template( plugin_dir_path(__FILE__ ). "/Appointments/templates/form-doctorappointment.php");
                // return plugin_dir_path(__FILE__ ). "/Appointments/templates/single-doctorappointment.php";
            }

        }//end of check for doctorappointment post type

    }else{
        return $original_template; //if no match found then it fall back on $original_template
    }
    
}



// ========================================
// Creating Roles
// ========================================
register_activation_hook( __FILE__, "Hospital_add_roles");

function Hospital_add_roles(){
    add_role( 'receptionist', 'Receptionist', array(
        'read' => false,
        'edit_posts' => false,
        'publish_posts' => false,

    ));

}
