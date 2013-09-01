(function (window, $) {
    'use strict';

    var i = function (options) {
        //private
        var version = '0.0.1',
            bin,
            input_element = '.input',
            name = function (input) {
                if ($) {
                    return $(input).attr('name');
                }
            },
            val = function (input) {
                if ($) {
                    return $(input).val();
                }
            },
            is = function (element, selector) {
                if ($) {
                    return $(element).is(selector);
                }
            },
            inArray = function (value, array) {
                if ($) {
                    return $.inArray(value, array);
                }
            },
            getInputs = function (element) {
                if ($) {
                    return $(element).children(input_element);
                }
            },
            parents = function (a, b)
            {

            },
            guessRule = function (rules, inputs) {
                if (isMany(inputs)) {

                } else {

                }
            },
            has = function (str) {
                var output,
                    input = this.bin;

                switch (str) {
                    case 'a value': output = (input.length > 0); break;
                    case 'a first and last name': output = (input.length > 1 && input[1].length > 0); break;
                    case 'an email': output = (/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(input)); break;
                    case 'matching values': output = (input[0] === input[1]); break;
                    case 'a length greater than 6': output = (input.length > 6); break;
                    case 'a state': output = (inArray(input, states) > -1); break;
                    case 'a zip-code': output = (/^\d+$/.test(input) && input.length >= 5); break;
                }

                return output;
            },
            formatters = {
                'page-name': function (inputs) {
                    return {
                        name: val(inputs).trim().split(/ +?/)
                    };
                },
                'page-address': function (inputs) {
                    var output = [];

                    for (var i = 0; i < inputs.length; i++) {
                        if (name(inputs[i]) === 'state') {
                            output[name(inputs[i])] = val(inputs[i]).toUpperCase();                 
                        } else {
                            output[name(inputs[i])] = val(inputs[i]).trim();
                        }
                    }

                    return output;
                },
                'default': function (inputs) {
                    var output = [];

                    for (var i = 0; i < inputs.length; i++) {
                        output[name(inputs[i])] = val(inputs[i]).trim();
                    }

                    return output;
                }
            },
            validate_rules = {
            },
            format = function (options) {
                var inputs = options.inputs || options.input || options,
                    rule = guessRule(format_rules, inputs);

                if (options.hasOwnProperty("rule") && format_rules.hasOwnProperty(options.rule)) {
                    rule = format_rules[options.rule];
                }

                return rule(inputs);
            },
            validate = function (options) {
                var rule = validate_rules.default,
                    input = options.inputs || options.input || options;

                if ( ! is(input, input_element)) input = getInputs();

                input = format(input);

                console.log(input);
            },
            check = function (input) {
                bin = val(input);

                return this;
            };

        //public
        this.version = version;
        this.check = check;
        this.format = format;
        this.has = has;
        this.validate = validate;
    };

    i.prototype.make = function (options) {
        return new i(options);
    }

    window.Input = new i;
})(myafterschoolprograms, $);


    <script>
        //Name Button activation
        $('#Name-Input').on('load input', function () {
            var name = $('#Name-Input input').val().trim().split(/ (.+)?/),
                has_first_and_last = (name.length > 1 && name[1].length > 0);

            myafterschoolprograms.resetVisibility('#Name-Check', has_first_and_last);
            myafterschoolprograms.toggleButton('#Name-Input button', has_first_and_last);

            if (has_first_and_last) {
                $('#First-Name-Check').html(name[0]);
                $('#Last-Name-Check').html(name[1]);
            }

        });

        //Email Button activation
        $('#Email-Input').on('input', function () {
            var email = $('#Email-Input input').val().trim(),
                email_reg_exp = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i,
                is_an_email = email_reg_exp.test(email),
                is_unique = true;

            if (is_an_email) {
                $.ajax({
                    method: 'POST',
                    url: '{{ $url['check_email'] }}',
                    data: {'email': email},
                    success: function (data) {
                        is_unique = (data === 'true') ? true : false;
                    },
                    async: false
                });
            }

            myafterschoolprograms.resetVisibility('#Email-Check', !is_unique)
            myafterschoolprograms.toggleButton('#Email-Input button', is_an_email && is_unique);
        });

        //Password Button activation
        $('#Password-Input-Collection').on('input', function () {
            var password = $('#Password-Input input').val(),
                confirm_password = $('#Confirm-Password-Input input').val(),
                are_filled = (confirm_password.length > 0 && password.length > 0),
                are_matching = (password === confirm_password),
                are_longer_than_six = (password.length >= 6);

            myafterschoolprograms.resetVisibility('#Password-Check', (are_filled && (!are_matching || !are_longer_than_six)));
            myafterschoolprograms.resetVisibility('.longer-than-six', are_filled && !are_longer_than_six);
            myafterschoolprograms.resetVisibility('.check-and', are_filled && !are_longer_than_six);
            myafterschoolprograms.resetVisibility('.check-no-and', are_filled && are_longer_than_six);
            myafterschoolprograms.resetVisibility('.must-match', are_filled && !are_matching);

            myafterschoolprograms.toggleButton('#Password-Input-Collection button', (are_matching && are_longer_than_six));
        });

        //Address Button activation
        $('#Address-Input-Collection').on('input', function () {
            var address = $('#Address-Input input').val().trim(),
                city = $('#City-Input input').val().trim(),
                state = $('#State-Input input').val().trim().toUpperCase(),
                zip = $('#Zip-Code-Input input').val().trim(),
                is_state = ($.inArray(state, myafterschoolprograms.states) > -1),
                is_zip = (/^\d+$/.test(zip) && zip.length === 5),
                are_filled = (address.length > 0 && city.length > 0 && state.length > 0 && zip.length > 0);

                console.log(is_zip+' '+is_state+' '+are_filled)

            myafterschoolprograms.toggleButton('#Address-Input-Collection button', is_state && is_zip && are_filled);
        });

        $('.page button').on('click', function () {
            if ($(this).hasClass('active')) {
                $(this).parents('.page').toggleClass('show hide-left');
                $(this).parents('.page').next().toggleClass('hide-right show');
            }
        });
    </script>

