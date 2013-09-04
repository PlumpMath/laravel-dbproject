(function(window, $) {

    'use strict';

    // LOCAL
    var build_version       = '0.1.0',
        masp                = {
            version: build_version,
            __construct: function () {
                //handle input label toggling
                var input_wrapper = ($('.form').length !== 0) ? '.form' : '.input';
                
                this.resetLabels();

                $(input_wrapper).on('input', this.toggleLabels);

                return this;
            },
            toggleLabels: function (event) {
                var condition;

                if ($(event.target).is('select')) {
                    condition = event.target.value === $(event.target).children('.default').value;
                } else {
                    condition = $(event.target).val() === '';
                }

                if ($(event.target).siblings('.input-lbl').length === 0) {
                    $(event.target)
                        .parent()
                        .siblings('.input-lbl')
                        .resetToggle('invisible visible', condition);
                } else {
                    $(event.target)
                        .siblings('.input-lbl')
                        .resetToggle('invisible visible', condition);
                }
            },
            resetLabels: function () {
                $.each($('.input-lbl'), function () {
                    $(this).resetToggle('invisible visible', ($(this).siblings('.input-field').val() === ''));
                });
            },
            toggleVisibility: function (event, element) {
                if (event) event.preventDefault();
                $(element+'.invisible, '+element+'.visible').toggleClass('visible invisible');
            },
            toggleButton: function (button, condition) {
                $(button).resetToggle('btn-inactive btn-active', condition);
                $(button)
                    .children('.btn-active-text')
                    .resetToggle('invisible visible', condition);
                $(button)
                    .children('.btn-inactive-text')
                    .resetToggle('invisible visible', (!condition));
            },
            resetVisibility: function (element, condition) {
                $(element).resetToggle('invisible visible', condition);
            },
            capitalizeFirst: function (string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
            sendJs: function (url) {
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {'js': !($('html').hasClass('no-js'))}
                });
            },
            states: {
                abbreviations: [
                    'AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA', 'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY' 
                ],
                full: ['ALABAMA', 'ALASKA', 'AMERICAN SAMOA', 'ARIZONA', 'ARKANSAS', 'CALIFORNIA', 'COLORADO', 'CONNECTICUT', 'DELAWARE', 'DISTRICT OF COLUMBIA', 'FEDERATED STATES OF MICRONESIA', 'FLORIDA', 'GEORGIA', 'GUAM', 'HAWAII', 'IDAHO', 'ILLINOIS', 'INDIANA', 'IOWA', 'KANSAS', 'KENTUCKY', 'LOUISIANA', 'MAINE', 'MARSHALL ISLANDS', 'MARYLAND', 'MASSACHUSETTS', 'MICHIGAN', 'MINNESOTA', 'MISSISSIPPI', 'MISSOURI', 'MONTANA', 'NEBRASKA', 'NEVADA', 'NEW HAMPSHIRE', 'NEW JERSEY', 'NEW MEXICO', 'NEW YORK', 'NORTH CAROLINA', 'NORTH DAKOTA', 'NORTHERN MARIANA ISLANDS', 'OHIO', 'OKLAHOMA', 'OREGON', 'PALAU', 'PENNSYLVANIA', 'PUERTO RICO', 'RHODE ISLAND', 'SOUTH CAROLINA', 'SOUTH DAKOTA', 'TENNESSEE', 'TEXAS', 'UTAH', 'VERMONT', 'VIRGIN ISLANDS', 'VIRGINIA', 'WASHINGTON', 'WEST VIRGINIA', 'WISCONSIN', 'WYOMING']
            }
        }

    $.fn.resetToggle = function (toggle_class, condition) {
        switch ($.type(toggle_class)) {
            case 'array':
                break;
            case 'string':
                toggle_class = toggle_class.split(' ');
                break;
            case 'function':
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

    window.myafterschoolprograms = masp.__construct();
}(window, jQuery));