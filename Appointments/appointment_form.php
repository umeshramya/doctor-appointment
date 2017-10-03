<?php
/*
@package DoctorAppoinments

This file contains fucntion of appointment_form
this is used for both front end and back end
*/ 

function get_DoctorAppointment_appointment_form($post){
    wp_nonce_field( basename(__FILE__), "DoctorAppointment_nonce" );
    $stored_content = get_post_meta($post->ID);

    $appointment_id     ='';
    $client_name        ='';
    $auhor_name         ='';
    $clent_email        ='';
    $client_mobile      ='';
    $date_1             ='';     
    $date_2             ='';
    $date_3             ='';
    // check the log in status for to populate the fileds in case not then let them go vacant then save new post
    // or else edit existing one
    // if(is_user_logged_in()){
    //     $user= wp_get_current_user();    
    //         $post_meta = get_the_author_meta('ID');
    //            if ($user->ID == $post_meta){
                   
                if(! empty( $stored_content["DoctorAppointment_id"])) $appointment_id =  esc_attr( $stored_content["DoctorAppointment_id"][0] );   
                if(! empty( $stored_content["DoctorAppointment_name"]))  $client_name =  esc_attr( $stored_content["DoctorAppointment_name"][0] );
                if(! empty( $stored_content["DoctorAppointment_email"])) $clent_email =  esc_attr( $stored_content["DoctorAppointment_email"][0] );
                if(! empty( $stored_content["DoctorAppointment_mobile"]))  $client_mobile =  esc_attr( $stored_content["DoctorAppointment_mobile"][0] );
                if(! empty( $stored_content["DoctorAppointment__appointment_date_1"]))  $date_1 =  esc_attr( $stored_content["DoctorAppointment__appointment_date_1"][0] );
                if(! empty( $stored_content["DoctorAppointment__appointment_date_2"]))  $date_2 =  esc_attr( $stored_content["DoctorAppointment__appointment_date_2"][0] );
                if(! empty( $stored_content["DoctorAppointment__appointment_date_3"]))  $date_3 =  esc_attr( $stored_content["DoctorAppointment__appointment_date_3"][0] );
             
                 
                
    //     }
    // }

   
?>
    <!-- This fucntion creats the custom fields for DoctorAppointment_meta_box_fields -->
    <form>
            <div class="meta-box-container">

                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppointment_id">Appointment ID</label>
                    </div>
                    <div class="meta-td">
                        <input type="text" id = "DoctorAppointment_id" name = "DoctorAppointment_id" value="<?php echo esc_attr($appointment_id) ?>">
                    </div>
                </div>

                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppointment_name">Client Full Name</label>
                    </div>
                    <div class="meta-td">
                        <input type="text" id = "DoctorAppointment_name", name = "DoctorAppointment_name" value="<?php echo  esc_attr($client_name) ?>">
                    </div>
                </div>

                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppointment_email">Client email</label>
                    </div>
                    <div class="meta-td">
                         <input type="email" id ="DoctorAppointment_email" name ="DoctorAppointment_email" value ="<?php echo esc_attr($clent_email) ?>" >
                    </div>
                    
                </div>

                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppointment_mobile">Client Mobile Number</label>
                    </div>
                    <div class="meta-td">
                         <input type="text" id ="DoctorAppointment_mobile" name ="DoctorAppointment_mobile" value ="<?php echo esc_attr($client_mobile) ?>" >
                    </div>
                </div>
                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppointment_appointment_dates">Choose Options for Appointments</label>
                    </div>
                    <div class="meta-td">
                        <div class="appointment_dates">
                            <input type="text" id ="DoctorAppointment__appointment_date_1" name ="DoctorAppointment__appointment_date_1" value ="<?php echo esc_attr($date_1) ?>" >
                            <input type="text" id ="DoctorAppointment__appointment_date_2" name ="DoctorAppointment__appointment_date_2" value ="<?php echo esc_attr($date_2) ?>" >
                            <input type="text" id ="DoctorAppointment__appointment_date_3" name ="DoctorAppointment__appointment_date_3" value ="<?php echo esc_attr($date_3) ?>" >
                        </div>
                         
                    </div>
                </div>
                <div class = "meta-row">
                    <div class = "meta-th">
                        <span> Message </span>
                    </div>
                    <div class= "meta-td">
                    <?php
                    $content        = get_post_meta( $post->ID, "DoctorAppointment_message", true );
                    
                    $editot_id      = "DoctorAppointment_message";
                    $settings       = array(
                        "textarea_rows" =>  10
                    );

                        wp_editor( $content, $editot_id, $settings );

                    ?>
                    </div>    
                </div>
            </div>

    </form>

<?php
}