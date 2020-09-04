$(document).ready(function() {
    $("#LoginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            }
        },
        messages: {
            email: {
                required: 'Email is required',
                email: 'Please enter a valid email id',
            },
            password: {
                required: 'Password is required',
            }
        },
        submitHandler: function(form) {
            $("#submitForm").prop("disabled", true);
            var LoginForm = $("#LoginForm");
            var formData = LoginForm.serialize();
            $( '#email-error' ).html( "" );
            $( '#password-error' ).html( "" );
        
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
        
            $.ajax({
                url:'http://bananewala.com/login',
                type:'POST',
                data:formData,
                success:function(data) {
                    if(data.errors) {
                        if(data.errors.email){
                            $( '#email-error' ).html( data.errors.email[0] );
                        }
                        if(data.errors.password){
                            $( '#password-error' ).html( data.errors.password[0] );
                        } else {
                            $( '#email-error' ).html( data.errors);
                        }
                    }
                    if(data.success) {
                        $('#success-msg').removeClass('hide');
                        setInterval(function(){ 
                            $('#myModal').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 30);
                        //window.location.href = "{{ route('dashboard') }}";
                        window.location.reload();
                    }
                },
            });
            $("#submitForm").removeAttr('disabled');
        }
    });

    $("#RegisterForm").validate({
        ignore: [],
        debug: false,
        rules: { 
            name: "required",
            email: "required",
            mobile: "required",
            state_id: "required",
            city_id: "required",
            zip: "required",
            address: "required",
            aadhar: "required",
            password: {
                required: true,
                minlength: 5
            },
            password_confirmation: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            password_confirmation: {
                equalTo: "Please enter the same password as above"
            }
        },
        submitHandler: function(form) {
            $("#submitRegisterForm").prop("disabled", true);
            var RegisterForm = $("#RegisterForm");
            var formData = RegisterForm.serialize();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            $( '#name-error' ).html( "" );
            $( '#email-error' ).html( "" );
            $( '#mobile-error' ).html( "" );
            $( '#state_id-error' ).html( "" );
            $( '#city_id-error' ).html( "" );
            $( '#zip-error' ).html( "" );
            $( '#address-error' ).html( "" );
            $( '#aadhar-error' ).html( "" );
            $( '#password-error' ).html( "" );
            $( '#password_confirmation-error' ).html( "" );

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url:'http://bananewala.com/register',
                type:'POST',
                data:formData,
                success:function(data) {
                    if(data.status == 0) {
                        if(data.errors.name){
                            $( '#name-error' ).html( data.errors.name );
                        }
                        if(data.errors.email){
                            $( '#email-error' ).html( data.errors.email );
                        }
                        if(data.errors.mobile){
                            $( '#mobile-error' ).html( data.errors.mobile[0] );
                        }
                        if(data.errors.state_id){
                            $( '#state_id-error' ).html( data.errors.state_id[0] );
                        }
                        if(data.errors.city_id){
                            $( '#city_id-error' ).html( data.errors.city_id[0] );
                        }
                        if(data.errors.zip){
                            $( '#zip-error' ).html( data.errors.zip[0] );
                        }
                        if(data.errors.address){
                            $( '#address-error' ).html( data.errors.address[0] );
                        }
                        if(data.errors.aadhar){
                            $( '#aadhar-error' ).html( data.errors.aadhar[0] );
                        }
                        if(data.errors.password){
                            $( '#password-error' ).html( data.errors.password[0] );
                        }
                        if(data.errors.password_confirmation){
                            $( '#password_confirmation-error' ).html( data.errors.password_confirmation[0] );
                        }
                        
                    }
                    if(data.status == 1) {
                        $('#success-msg').removeClass('hide');
                        setInterval(function(){ 
                            $('#registerModal').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 3000);

                        window.location.href = "http://bananewala.com/";
                    }
                },
            });
            $("#submitRegisterForm").removeAttr('disabled');
        }
    });
    
    $('#state_id').on('change', function(){
        var state_id = $(this).val();
        var form_data = new FormData();
        form_data.append('state_id',state_id);
        form_data.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: "http://bananewala.com/get-city",
            data: form_data,
            type: 'POST',
            dataType: "json",
            contentType: false,
            processData: false,
            success:function(data) { 
                $('#city_id option').remove();
                $('select[name="city_id"]').append('<option value="" >Choose City</option>');
                $.each(data, function(key, value) {
                    $('select[name="city_id"]').append('<option value="'+ key +'"  >'+ value +'</option>');
                });
            }
        });
    });
});