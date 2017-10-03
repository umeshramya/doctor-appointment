<?php
/*
This file contains code of appontment custom post type 
*/ 


// ======================================
// custom psot of DoctorAppointment
// =====================================
$cur_post_type = new create_custom_post_type("DoctorAppointment", "Appointments", "Appointment");

$cur_post_type->set_args('menu_icon', 'dashicons-id-alt');

$cur_post_type->set_args('query_var', true);
$cur_post_type->set_args("show_ui", true);
$cur_post_type->set_args('show_in_rest', true);
$cur_post_type->set_args('rest_base', "doctorappointments");
// $cur_post_type-> set_args('rest_controller_class', 'WP_REST_Posts_Controller');
$cur_post_type->set_args('rewrite', true);
$cur_post_type-> set_args('capability_type', array('DoctorAppointment', 'DoctorAppointments'));
$cur_post_type ->set_args('map_meta_cap', true);
$cur_post_type-> set_args('supports', array( 'author'));
add_action( "init", array($cur_post_type, 'register_custom_post_type' ));


// =======================
// register custom fields fo rest api
// =======================

add_action( "rest_api_init", "register_custom_fields_for_rets_api");
function register_custom_fields_for_rets_api(){

    $custom_field_array = array('DoctorAppointment_id', 'DoctorAppointment_name', 
                'DoctorAppointment_email', 'DoctorAppointment_mobile',
                'DoctorAppointment_message');

        foreach ($custom_field_array as $field){
            register_rest_field(
                'doctorappointment',
                $field,
                array(
                'get_callback' => "DoctorAppointment_show_fields"
                )
        
            );
    }

}




function DoctorAppointment_show_fields($object, $field_name, $request){

    return get_post_meta( $object["id"], $field_name, true );
}



add_action('init','DoctorAppointment_role_caps',999);
function DoctorAppointment_role_caps() {

    // Add the roles you'd like to administer the custom post types
    $roles = array('receptionist');
    
    // Loop through each role and assign capabilities
    foreach($roles as $the_role) { 

         $role = get_role($the_role);
        
             $role->add_cap( 'read' );
             $role->add_cap( 'read_DoctorAppointment');
             $role->add_cap( 'read_private_DoctorAppointments' );
             $role->add_cap( 'edit_DoctorAppointment' );
             $role->add_cap( 'edit_DoctorAppointments' );
             $role->add_cap( 'edit_others_DoctorAppointments' );
             $role->add_cap( 'edit_published_DoctorAppointments' );
             $role->add_cap( 'publish_DoctorAppointments' );
             $role->add_cap( 'delete_others_DoctorAppointments' );
             $role->add_cap( 'delete_private_DoctorAppointments' );
             $role->add_cap( 'delete_published_DoctorAppointments' );
    
    
    
        }
}


// add meta boxes
add_action("add_meta_boxes", "DoctorAppointment_meta_box");
function DoctorAppointment_meta_box(){
    add_meta_box( "DoctorAppointment", "Appointments", 
                "DoctorAppointment_meta_box_fields", "DoctorAppointment");
}

function DoctorAppointment_meta_box_fields($post){
// This fucntion call the fucntions from appointment_form.php
    get_DoctorAppointment_appointment_form($post);
   
}

function DoctorAppointment_meta_save($post_id){
    // this function saves the appointments 
    $is_auto_save   = wp_is_post_autosave( $post_id );
    $is_revision    = wp_is_post_revision( $post_id );
    $is_valid_nonce = (isset($_POST['DoctorAppointment_nonce']) && 
                      wp_verify_nonce( $_POST['DoctorAppointment_nonce'], basename(__FILE__)))? 'true' : 'false';
    
    // return if ina auto svae , revision of non valid nouncer
    if($is_auto_save || $is_revision || !$is_valid_nonce){
        return ;
    }
    
    // update DoctorAppointment_id
    if(isset($_POST["DoctorAppointment_id"])){
        update_post_meta( $post_id, "DoctorAppointment_id",sanitize_text_field( $_POST["DoctorAppointment_id"]) );

    }

    // update DoctorAppointment_name
    if(isset($_POST["DoctorAppointment_name"])){
        update_post_meta( $post_id, "DoctorAppointment_name",sanitize_text_field( $_POST["DoctorAppointment_name"]) );
    
    }

    // update DoctorAppointment_email
    if(isset($_POST["DoctorAppointment_email"])){
        update_post_meta( $post_id, "DoctorAppointment_email",sanitize_email( $_POST["DoctorAppointment_email"]) );
    
    }

    // update DoctorAppointment_mobile
    if(isset($_POST["DoctorAppointment_mobile"])){
        update_post_meta( $post_id, "DoctorAppointment_mobile",sanitize_text_field( $_POST["DoctorAppointment_mobile"]) );
    }


    // update DoctorAppointment_message
    if(isset($_POST["DoctorAppointment_message"])){
        update_post_meta( $post_id, "DoctorAppointment_message",$_POST["DoctorAppointment_message"] );
    }

// still have to write code fo
          
        
        
    
  

}
add_action( "save_post", 'DoctorAppointment_meta_save');





