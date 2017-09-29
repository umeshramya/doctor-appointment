<?php
/*
Plugin Name: Doctor Appointment
Plugin URI: http://bilagi.org
Description: This is for patient to book appintment with doctors. This plugin has mobile app to be downloaded from app store. Using this mobile app doctor or his/her secretory can confirm rescedule the patient booked appoitment. The data is trasfered is in json format this can inigrated wih any other softwere. There is facilty for chatbox. patient can chat recive instractions.
Author: Dr Umesh R Bilagi
Author URI: http://bilagi.org
Text Domain: DoctorAppointment
*/ 

//to prevent unauhorized axis
$name_space= "DoctorAppointment";//this var is used for prefixing  the objects in this plugin to prevent confilcts
                                    //even funcion can be called as be prefixed by this
if(! defined("ABSPATH")){
    die;
}


// ====================================================
// requrie php files
// ====================================================
// Classes
require_once(plugin_dir_path( __FILE__ ). "/classes/custom_post_type.php");

// CPTs
require_once(plugin_dir_path( __File__ ). "/CPTs/appointments_CPT.php");




// =======================================================
// enqueing scripts and styles
// =======================================================
add_action('wp_enqueue_scripts', 'DoctorAppointment_enqueue_front_end');
function DoctorAppointment_enqueue_front_end(){
    /*
    This enques style and scripts for front end
    */  
    wp_enqueue_style( "plugin_style", plugins_url( "/assets/styles/style.css", __FILE__ ));
    wp_enqueue_script( "plugin_script", plugins_url( "/assets/scripts/scripts.js", __FILE__ ),"", true );
}

add_action( "admin_enqueue_scripts", 'DoctorAppointment_enqueue_admin');
function DoctorAppointment_enqueue_admin (){
    /*
        This enques scripts and styles for admin
    */ 

}




// ===============================================
// acvtivation and deactivation of plugin
// =============================================
function DoctorAppointment_activate(){
    flush_rewrite_rules();
};

function DoctorAppointment_deactivate(){

}





