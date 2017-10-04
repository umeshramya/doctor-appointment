<?php
/*
Text Domain: DoctorAppointment
@package DoctorAppointment
*/ 

//to prevent unauhorized axis
if(! defined("ABSPATH")){
    die;
}


// ====================================================
// requrie php files
// ====================================================

// Classes
require_once(plugin_dir_path( __FILE__ ). "../classes/custom_post_type.php");

//creating custom post type
require_once(plugin_dir_path( __File__ ). "/appointments_CPT.php");

// creating form for DoctorAppointment post type
require_once(plugin_dir_path( __FILE__ ). "/appointment_form_admin.php");





// =======================================================
// enqueing scripts and styles
// =======================================================

add_action( "admin_enqueue_scripts", 'DoctorAppointment_enqueue_admin');
function DoctorAppointment_enqueue_admin (){
    /*
        This enques scripts and styles for admin
    */ 
    global $pagenow, $typenow;
    if (($pagenow == 'post.php' || $pagenow == 'post-new.php') && 
        ($typenow == 'doctorappointment') /* hear other posttypes will comw with or operator*/   ){
            wp_enqueue_style( "plugin_style", plugins_url( "../assets/styles/style.css", __FILE__ ));
            wp_enqueue_script( "plugin_script", plugins_url( "../assets/scripts/scripts.js", __FILE__ ),
                array('jquery', 'jquery-ui-datepicker'), true );
            wp_enqueue_style( 'jquery_ui_style', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css");
    }
}




add_action('wp_enqueue_scripts', 'DoctorAppointment_enqueue_front_end');
function DoctorAppointment_enqueue_front_end(){
    /*
    This enques style and scripts for front end
    */  
    wp_enqueue_style( "plugin_style", plugins_url( "../assets/styles/style.css", __FILE__ ));
    wp_enqueue_script( "doctor_appointment_script", plugins_url( "../assets/scripts/doctor_appointment.js", __FILE__ ),
        array('jquery', 'jquery-ui-datepicker'), true );
        wp_enqueue_style( 'jquery_ui_style', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css");

    wp_localize_script( "doctor_appointment_script", "doctor_appointment_object", array(
        'ajax_url'      => admin_url('admin-ajax.php'),
        'security'      => wp_create_nonce( 'user-submitted-message' )
    ));
    }
    

    function DoctorAppoinment_process_user_genareted_post(){
        
    }

    add_action( "wp_ajax_DoctorAppoinment_process_user_generated_post", "DoctorAppoinment_process_user_generated_post" );
    add_action( "wp_ajax_nopriv_DoctorAppoinment_process_user_generated_post", "DoctorAppoinment_process_user_generated_post" );















