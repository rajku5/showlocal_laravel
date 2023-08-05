    <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/toasting.js') }}"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->
   
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>-->

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(document).ready(function() {

            // set cookies
            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }

            // singup and login modal
            if (window.location.href.indexOf('#signup') != -1) {
                $('#signUp').modal('show');
            }
            if (window.location.href.indexOf('#login') != -1) {
                $('#login').modal('show');
            }

            // current position section
            navigator.geolocation.getCurrentPosition(function(position) {}, function(error) {
                if (error.code == error.PERMISSION_DENIED) {
                    if (getCookie('pincode') == null) {
                        if (window.location.href.indexOf('#signup') == -1 && window.location.href.indexOf(
                                '#login') != -1) {
                            $('#login').modal('show');
                        } else {
                            $('#pincode').modal('show');
                        }
                    }
                }

                //set pincode 
                $("#pincodeBtn").click(function() {
                    $('#pincode').modal('show');
                });

            });
        });

        function get_generate_mobile_otp() {
            let mobile = $("#phone_number").val();
            console.log(mobile);

            $.ajax({
                //url: window.location.origin + 'api/get-generate-otp',
                url:"{{url('api/get-generate-otp')}}",
                type: "POST",
                data: {
                    mobile: mobile
                    
                },
                //data:jQuery('#phone_number').serialize();
                
                
                dataType: 'json',
                encode: true,
                success: function(response) {
                    console.log(response.mobile);
                    
                    $('#otp-section').removeClass('d-none');
                    $('#confirm-section').removeClass('d-none');
                    $('#send-button').addClass('d-none');
                    $('#resend-button').removeClass('d-none');
                    toasting.create({
                        //"text": data.code,
                        "text": response.code,
                    });
                },
                error: function(data) {
                    toasting.create({
                       "text": data.message,
                        "type": "error"
                    });
                }
            });
        }

        function get_verify_mobile_otp() {
            var input_otp = $('#input_otp').val();
            var mobile = $('#phone_number').val();
            console.log(input_otp);
            console.log(mobile);
            $.ajax({
                //url: window.location.origin + '/api/verify-generate-otp',
                url:"{{url('api/verify-generate-otp')}}",
                type: "POST",
                data: {
                    "input_otp": input_otp,
                    "mobile": mobile
                },
                dataType: 'json',
                encode: true,
                success: function(data) {
                    $('#otp-section').addClass('d-none');
                    $('#confirm-section').addClass('d-none');
                    $('#send-button').addClass('d-none');
                    $('#resend-button').addClass('d-none');
                    $('#phone_number').attr('readonly', 'readonly');
                    toasting.create({
                        "text": data.message
                    });
                },
                error: function(error) {
                    toasting.create({
                        "text": data.message
                    });
                }
            });

        }
    </script>
