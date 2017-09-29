<?php
/*
This file contains code of appontment custom post type 
*/ 


// ======================================
// custom psot of DoctorAppoitment
// =====================================
$cur_post_type = new create_custom_post_type("DoctorAppoitment", "Appointments", "Appointment");
$cur_post_type->set_args('menu_icon', 'dashicons-id-alt');
// $cur_post_type-> set_args('supports', array('title', 'editor', 'author', 'custom-fields'));
$cur_post_type-> set_args('supports', array('title', 'author'));


add_action( "init", array($cur_post_type, 'register_custom_post_type' ));

// add meta boxes
add_action("add_meta_boxes", "DoctorAppoitment_meta_box");
function DoctorAppoitment_meta_box(){
    add_meta_box( "DoctorAppointment", "Appointments", 
                "DoctorAppoitment_meta_box_fields", "DoctorAppoitment");
}

function DoctorAppoitment_meta_box_fields(){
?>
    <!-- This fucntion creats the custom fields for DoctorAppoitment_meta_box_fields -->
    <form>
            <div>
                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppoitment_id">ID</label>
                    </div>
                    <div class="meta-td">
                        <input type="text" id = "DoctorAppoitment_id" name = "DoctorAppoitment_id" value="">
                    </div>
                </div>

                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppoitment_name">Client Full Name</label>
                    </div>
                    <div class="meta-td">
                        <input type="text" id = "DoctorAppoitment_name", name = "DoctorAppoitment_name" value="">
                    </div>
                </div>

                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppoitment_email">Client email</label>
                    </div>
                    <div class="meta-td">
                         <input type="email" id ="DoctorAppoitment_email" name ="DoctorAppoitment_email" value ="" >
                    </div>
                    
                </div>

                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppoitment_phone">Client Mobile Number</label>
                    </div>
                    <div class="meta-td">
                         <input type="text" id ="DoctorAppoitment_phone" name ="DoctorAppoitment_phone" value ="" >
                    </div>
                </div>
                <div class="meta-row">
                    <div class="meta-th">
                        <label for="DoctorAppoitment_appointment_dates">Choose Options for Appointments</label>
                    </div>
                    <div class="meta-td">
                         <input type="text" id ="DoctorAppoitment__appointment_date_1" name ="DoctorAppoitment__appointment_date_1" value ="" >
                         <input type="text" id ="DoctorAppoitment__appointment_date_2" name ="DoctorAppoitment__appointment_date_2" value ="" >
                         <input type="text" id ="DoctorAppoitment__appointment_date_3" name ="DoctorAppoitment__appointment_date_3" value ="" >
                    </div>
                </div>


                
            </div>

    </form>



<?php
}

    