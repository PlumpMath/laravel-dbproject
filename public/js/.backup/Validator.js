(function (window){

    var validators = {
        'accepted': function (value) {
            switch ($.type(value)) {
                case 'string':
                    return value === '1';
                case 'number':
                    return value === 1;
                case 'boolean':
                    return value === true;
                default:
                    return value == 1;
            }
        },
        'after': function (value, date) {
            date = new Date(date);
            return value.getTime() > date.getTime();
        },
        'alpha': function (value) {
            return /[A-Z]*/i.test(value);
        },
        'alphadash': function (value) {
            return /[A-Z-]*/i.test(value);
        },
        'before': function (value, date) {
            date = new Date(date);
            return value.getTime() < date.getTime();
        },
        'between': function (value, min, max) {
            switch ($.type(value)) {
                case 'date':
                    min = new Date(min);
                    max = new Date(max);

                    return value.getTime() > min.getTime() && value.getTime() < max.getTime();
                case 'string':
                    return value.length > min && value.length < max;
                default:
                    return value > min && value < max;
            }
        },
        'bool': function (value) {
            return $.type(value) === 'boolean';
        },
        'date': function (value) {
            return $.type(value) === 'date';
        },
        'decimal': function (value) {
            return $.type(value) === 'number' && Math.round(value) !== value;
        },
        'different': function (value, other) {
            other = other.val;
            return value != other;
        },
        'email': function (value) {
            return /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(value);
        },
        'empty': function (value) {
            return value.length === 0;
        },
        'in': function (value, array) {
            return $.inArray(value, array) > -1;
        },
        'integer': function (value) {
            return $.type(value) === 'number' && Math.round(value) === value;
        },
        'ip': function (value) {
            value = value.split('.');
            if (value.length === 0 || value.length > 4) return false;

            for (var i = 0; i < value.length; i++) {
                if (+value[i] < 0 || +value[i] > 255) return false;
            }

            return true;
        },
        'matches': function (value, other) {
            other = this.get(other).val;
            return value === other;
        },
        'max': function (value, max) {
            switch ($.type(value)) {
                case 'string':
                    return value.length < max;
                default:
                    return value < max;
            }
        },
        'min': function (value, min) {
            switch ($.type(value)) {
                case 'string':
                    return value.length > min;
                default:
                    return value > min;
            }  
        },
        'not': function (value, array) {
            return $.inArray(value, array) === -1;
        },
        'numeric': function (value) {
            switch ($.type(value)) {
                case 'string':
                    return /\d+/.test(value);
                case 'number':
                    return true;
                default:
                    return false;
            }
        },
        'required': function (value) {
            return value.length > 0;
        },
        'size': function (value, size) {
            return value.length === size;
        }
    };

    var Input = function () {},
        Validator = function () {};

    Input.prototype = {
    }

    Validator.prototype = {
        'objs': [],
        'passes': function () {
            for (var i = 0; i < this.objs.length; i++)
                $(this.objs[i].element).on('input', function () {
                    var passes = true;

                    for (var j = 0; j < this.objs[i].rules; j++) {
                        passes = passes && myafterschoolprograms.app.Validator.validators[this.objs[i].rules[j]](this.objs[i].element.val);
                    }
                });
        }
    }

    var app = window.myafterschoolprograms.app = {
        'Input': {
            'has': function (selector) {
                return ($(selector).length > 0 && $(selector).is('input'));
            },
            'find': function (selector) {
                return this.make($(selector));
            },
            'get': function (selector) {
                return this.make($(selector));
            },
            'type': function (type) {
                return this.make($('input[type='+type+']'));
            },
            'name': function (name) {
                return this.make($('input[name='+name+']'));
            },
            'all': function () {
                return this.make($('input'));
            },
            'make': function (items) {
                var input = new Input();

                for (var i = 0; i < items.length; i++) {
                    items[i].val = this.val(items[i]);
                }

                input.items = items;

                return input;
            },
            'val': function (input) {
                var value = $(input).val(),
                    date = new Date(value);

                // the value is probably a date
                if (date != 'Invalid Date') return date;

                // the value is probably a boolean
                if (value === 'true' || value === 'false' || value === '1' || value === '0') return !!value;

                // the value is probably a number
                if (/\d+/.test(value) && value.charAt(0) !== '0' && value.length < 4) return +value;

                // the value is a string
                return value;
            }
        },
        'Validator': {
            'validators': validators,
            'make': function (obj) {
                var __v = new Validator(),
                    input,
                    Input = myafterschoolprograms.app.Input;

                for (var input in obj) {
                    if (Input.has(input)) input = Input.get(input).items;
                    else if (Input.has('input[type='+input+']')) input = Input.type(input).items;
                    else if (Input.has('input[name='+input+']')) input = Input.name(input).items;

                    __v.objs.push({
                        'element': input,
                        'rules': obj[input],
                    });
                }

                return __v;
            }
        },
        'expose': function (namespace) {
            for (var expose in this) {
                if (expose !== 'expose') {
                    namespace[expose] = this[expose];
                }
            }
        }
    }

    app.expose(window);
})(window);
