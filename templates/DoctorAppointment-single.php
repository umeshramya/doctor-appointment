<?php 
get_header();
?>

<div class= 'DoctorAppointment_container'>
    <form >
    <ul>
        <li>
        <input type="text" id='DoctorAppointment_id' name='DoctorAppointment_id' placeholder = 'Your Name'>
        <input type="email" id ='DoctorAppointment_email' name ='DoctorAppointment_email' required placeholder = 'Your email'>
        <input type="tel" id ='DoctorAppointment_mobile' name ='DoctorAppointment_mobile' required placeholder = 'Your mobile number'>
        </li>
        <li>
        <input type="date" id='DoctorAppointment_date_appointment_1' name='DoctorAppointment_date_appointment_1' placerholder='1st prefered appointment'>
        <input type="date" id='DoctorAppointment_date_appointment_2' name='DoctorAppointment_date_appointment_2' placerholder='1st prefered appointment'> 
        <input type="date" id='DoctorAppointment_date_appointment_3' name='DoctorAppointment_date_appointment_3' placerholder='3rd prefered appointment'>
        </li>
        <li>
        <textarea name="DoctorAppointment_message" id="DoctorAppointment_message" cols="30" rows="10"></textarea>
        </li>
        <li>
        <input type="submit" id='DoctorAppointment_submit' name='DoctorAppointment_submit'>
        </li>
    </ul>
        
        

    </form>
    
</div>

<?php 
get_footer();
