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
        'security'      => wp_create_nonce( 'doctor_appointment_request' ),
        'success'       => "Your appointment request is sent to concerned. \n You will be contacted very soon.",
        "fail"       =>  "Your appointment request was NOT successfull. \nKindly retry"
    ));
    }
    
    // ================================
    // ajax
    // ================================
    function DoctorAppoinment_process_user_genareted_post(){

        var_dump($_POST['data']);
        // check for non humans enetering data
        if(!empty($_POST['submission'])){
            wp_send_json_error("Honeypot Check Failed");
        }
        // check for wp_nonce security
        if(!check_ajax_referer('doctor_appointment_request', 'security')){
            wp_send_json_error("Security Nonce Failure");
        }

        
        $appointment_request = array(
            'post_title'        => sprintf('%s-%s-%s', 
                                            sanitize_text_field($_POST['data']['client_name']) ,
                                            sanitize_text_field( $_POST['data']['author']),
                                            esc_attr(current_time('Y-m-d' )) 
                                            ),
            // 'post_author'       => $_POST["author"],
            'post_date'         => esc_attr(current_time('Y-m-d' )),
            'post_status'       => 'publish',
            'post_type'         => 'DoctorAppointment'

        );            

        $post_id = wp_insert_post( $appointment_request, true);
        

        // update DoctorAppointment_name    
        update_post_meta( $post_id, "DoctorAppointment_name",sanitize_text_field( $_POST['data']["client_name"]) );
        
        // update DoctorAppointment_email
        update_post_meta( $post_id, "DoctorAppointment_email",sanitize_email( $_POST['data']['email']) );
        
        // update DoctorAppointment_mobile
        update_post_meta( $post_id, "DoctorAppointment_mobile",sanitize_text_field( $_POST['data']["mobile"]) );
        
        // update_appointment dates
        update_post_meta( $post_id, "DoctorAppointment_date_1", sanitize_text_field($_POST['data']["date_1"]));
        update_post_meta( $post_id, "DoctorAppointment_date_2", sanitize_text_field($_POST['data']["date_2"]));
        update_post_meta( $post_id, "DoctorAppointment_date_3", sanitize_text_field($_POST['data']["date_3"]));


        // update DoctorAppointment_message  
        update_post_meta( $post_id, "DoctorAppointment_message", sanitize_text_field($_POST['data']["message"]));
        // wp_send_json_success( $post_id );
        wp_die();
        
        
        
    }

    add_action( "wp_ajax_DoctorAppoinment_process_user_genareted_post", "DoctorAppoinment_process_user_genareted_post" );
    add_action( "wp_ajax_nopriv_DoctorAppoinment_process_user_genareted_post", "DoctorAppoinment_process_user_genareted_post" );















