function copyrightPos(){
    if($('body').data('page') != 'login'){
        var windowHeight = $(window).height();
        if(windowHeight < 700) {
            $('.account-copyright').css('position', 'relative').css('margin-top', 40);
        }
        else {
            $('.account-copyright').css('position', '').css('margin-top', '');
        }
    }
}

$(window).resize(function() {
    copyrightPos();
});

$(function() {

    copyrightPos();
    if($('body').data('page') == 'login'){
        /* Show / Hide Password Recover Form */
        $('#password').on('click', function(e) {
            e.preventDefault();
            $('.form-signin').slideUp(300, function() {
                $('.form-password').slideDown(300);
            });
        });
        $('#login').on('click', function(e) {
            e.preventDefault();
            $('.form-password').slideUp(300, function() {
                $('.form-signin').slideDown(300);
            });
        });

        var form = $(".form-signin");
        $('#signin').click(function(e) {
            form.validate({
                rules: {
                    username:
                    {
                        required: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 16
                    }
                },
                messages: {
                    username: {
                        required: 'Enter your username',
                        maxlength: 'Maximum 50 characters'
                    },
                    password: {
                        required: 'Write your password',
                        minlength: 'Minimum 6 characters',
                        maxlength: 'Maximum 16 characters'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.is(":radio") || element.is(":checkbox")) {
                        element.closest('.option-group').after(error);
                    }
                    else {
                        error.insertAfter(element);
                    }
                }
            });
        });
    }
    if($('body').data('page')== 'signup'){

        var form = $(".form-signup");

        $('#submit-form').click(function(e) {
            form.validate({
                rules: {
                    firstname:
                    {
                        required: true,
                        minlength: 3,
                    },
                    lastname:
                    {
                        required: false,
                        minlength: 4,
                    },
                    username:
                    {
                        required: true,
                        maxlength: 50,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 100
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 16
                    },
                    confirm: {
                        required: true,
                        minlength: 6,
                        maxlength: 16,
                        equalTo: '#password'
                    },
                    terms: {
                        required: true
                    }
                },
                messages: {
                    firstname: {
                        required: 'Enter your first name',
                        minlength: 'Enter at least 3 characters or more'
                    },
                    lastname: {
                        required: 'Enter your last name',
                        minlength: 'Enter at least 3 characters or more'
                    },
                    username: {
                        required: 'Enter unique username',
                    },
                    email: {
                        required: 'Enter email address',
                        email: 'Enter a valid email address'
                    },
                    password: {
                        required: 'Write your password',
                        minlength: 'Minimum 6 characters',
                        maxlength: 'Maximum 16 characters'
                    },
                    password2: {
                        required: 'Write your password',
                        minlength: 'Minimum 6 characters',
                        maxlength: 'Maximum 16 characters',
                        equalTo: 'Password doesn\'t match'
                    },
                    terms: {
                        required: 'You must agree with terms'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.is(":radio") || element.is(":checkbox")) {
                        element.closest('.option-group').after(error);
                    }
                    else {
                        error.insertAfter(element);
                    }
                }
            });
        });

    }
    
});