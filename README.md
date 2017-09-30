# doctor-appointment
This is wordpress plugin for appointments

####    1. Wuth this plugin client can ask for appoitments among the three date opions
####    2.Requested  appointment will be stored as custom post under the a author to whome the request is made.
####    3. Author will have an mobile app which alerts with notifications
####    4. With help of mobile app author can confirm or reshcedule the  requested appointment
####    5. Author can delegate this mobile app work to his or her secretory
####    6. Major benifit for the clients with app and plugin is things happen in real time
####    7. After reciving the notification author or his secretory may send confirming sms or make phone call to further process the appointment

####    8.Appointement data from the  web site can be interfaced with local software as the data is in json array format


For exmple:-



                [
                    {
                        "author"                        :   "Dr Raju Patil",
                        "appointment_id"                :    12345,
                        "clien_name"                    :    "Mr Ganesh G sharma",
                        "client_email"                  :    "ganesh_sharma@gmail.com",
                        "mobile_number"                 :    "983456786"
                        "1st_appointment_request"       :    "2017-01-01",
                        "2nd_appointment_request"       :    "2017-01-02"
                        "3rd_appointment_request"       :    "2017-01-03"

                    },
                        {
                        "author"                        :   "Dr Vani Patil",
                        "appointment_id"                :    12346,
                        "clien_name"                    :    "Mrs Sridevi G sharma",
                        "client_email"                  :    "sridevi_sharma@gmail.com",
                        "mobile_number"                 :    "983345227"
                        "1st_appointment_request"       :    "2017-01-05",
                        "2nd_appointment_request"       :    "2017-01-07"
                        "3rd_appointment_request"       :    "2017-01-10"

                    },    {
                        "author"                        :   "Dr Prem G Patil",
                        "appointment_id"                :    12347,
                        "clien_name"                    :    "Mr Vageesh G shivalli",
                        "client_email"                  :    "vageesh_shivalli@gmail.com",
                        "mobile_number"                 :    "983456786"
                        "1st_appointment_request"       :    "2017-01-07",
                        "2nd_appointment_request"       :    "2017-01-09"
                        "3rd_appointment_request"       :    "2017-01-15"

                    },


                ]