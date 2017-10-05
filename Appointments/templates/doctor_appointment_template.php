<?php

get_header();

?>
<div id="primary" class="content-area">
    <main id='main' class="site-main"  role="main">          
        <div style="width : 70%; margin: 0 auto;">
            <form id="DoctorApointment_user_input">
                <label>Please This Form to Request for Appointment</label>
                <?php wp_nonce_field( basename(__FILE__),"doctor_appointment_request" );?>
                <input type="text" id="DoctorAppointment_name" name ="DoctorAppointment_name" placeholder="Client Name" required>
                <br>
                <input type="text" id="DoctorAppointment_email" name ="DoctorAppointment_email" placeholder="email" required>
                <br>
                <input type="text" id="DoctorAppointment_mobile" name ="DoctorAppointment_mobile" placeholder="Mobile" required>
                <br>

                <label>Choose Your Convenient Dates Of Appointment</label>
                <input type="text" id="DoctorAppointment__appointment_date_1" name ="DoctorAppointment__appointment_date_1" placeholder="First optional Date" required>
                <br>
                <input type="text" id="DoctorAppointment__appointment_date_2" name ="DoctorAppointment__appointment_date_2" placeholder="Second optional Date" required>
                <br>
                <input type="text" id="DoctorAppointment__appointment_date_3" name ="DoctorAppointment__appointment_date_3" placeholder="Third optional date" required>
                <br>
                <textarea name="DoctorAppointment_message" id="DoctorAppointment_message" cols="30" rows="5" required></textarea>
                <br>
                <input type="text" id='xyq' name="<?php echo apply_filters( 'honeypot_name', 'date_submitted'); ?>" value="" style = "Display:none;">
                <input id='DoctorAppointment_submit'  name = 'DoctorAppointment_submit' type='submit'>

            </form>        
        </div>
    </main>

</div>
<?php

get_sidebar();
get_footer();
