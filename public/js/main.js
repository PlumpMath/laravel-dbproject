(function(window, $) {

    "use strict";

    // LOCAL
    var build_version       = '0.1.0',
        masp                = {
            version: build_version,
            __construct: function() {
                //handle input label toggling
                var input_wrapper = ($('.form-wrapper').length !== 0) ? '.form-wrapper' : '.input-wrapper';
                $(input_wrapper).on('load input', this.toggleLabels);

                return this;
            },  
            toggleLabels: function(event) {
                $(event.target)
                    .siblings('label')
                    .toggleClass('visible invisible', ($(event.target).val() !== ""));
            },
            toggleVisibility: function(event, element) {
                if (event) event.preventDefault();
                $(element+'.invisible, '+element+'.visible').toggleClass('visible invisible');
            },
            toggleButton: function(button, condition) {
                $(button).resetToggle('inactive active', condition);
                $(button)
                    .children('.active-option')
                    .resetToggle('invisible visible', condition);
                $(button)
                    .children('.inactive-option')
                    .resetToggle('invisible visible', (!condition));
            },
            resetVisibility: function(element, condition) {
                $(element).resetToggle('invisible visible', condition);
            },
            capitalizeFirst: function(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }

    $.fn.resetToggle = function (toggle_class, condition) {
        switch ($.type(toggle_class)) {
            case "array":
                break;
            case "string":
                toggle_class = toggle_class.split(' ');
                break;
            case "function":
                toggle_class = toggle_class();
                break;
            default:
                toggle_class = [toggle_class];
                break;
        }           

        for (var i = 0; i < toggle_class.length; i++) {
            this.removeClass(toggle_class[i]);
        }

        this.addClass(toggle_class[+condition]);

        return this;
    };

    console.log('Hi! This site was designed and built by williamstein92@gmail.com')
    window.myafterschoolprograms = masp.__construct();
}(window, jQuery));