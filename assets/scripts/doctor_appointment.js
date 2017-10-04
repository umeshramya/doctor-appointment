

jQuery(document).ready(function($){ 

    $("#DoctorAppointment__appointment_date_1, #DoctorAppointment__appointment_date_2, #DoctorAppointment__appointment_date_3")
    
    .datepicker({
        // write code for fomating date
    }).on("focusout", function(){
        
        
    });
    var doctor_appointment_submit = document.getElementById("DoctorAppointment_submit");

    var DoctorAppoinment_ajax = function(form_data, action){
        $.ajax({
            type        : "POST",
            url         : doctor_appointment_object.ajax_url,
            data        : {
                data    : form_data,
                action  : action,
                security:doctor_appointment_object.security
            },
            success     :function(response){
                if(true === response.success){
                    alert("Your appointment request is sent to concerned. \n You will be contacted very soon.");
                }else{
                    alert("Your appointment request was NOT successfull. \nKindly retry");
                }
            }
        })
    }

    
    doctor_appointment_submit.addEventListener("click", function(event){
        event.preventDefault();
        var form_data = {
            "client_name"  :    document.getElementById("DoctorAppointment_name").value,
            "email"        :    document.getElementById("DoctorAppointment_email").value,
            "mobile"       :    document.getElementById("DoctorAppointment_mobile").value,
            "date_1"       :    document.getElementById("DoctorAppointment__appointment_date_1").value,
            "date_2"       :    document.getElementById("DoctorAppointment__appointment_date_2").value,
            "date_3"       :    document.getElementById("DoctorAppointment__appointment_date_3").value,
            "message"      :    document.getElementById("DoctorAppointment_message").value

        }

        var action         = "DoctorAppoinment_process_user_generated_post";

        DoctorAppoinment_ajax(form_data, action);


   });   

})(Jquery);