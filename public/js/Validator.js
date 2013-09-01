(function (window) {

    var Input = function () {
        this.items = null;
        this.instance = this;
        this.validators = {};
    }, 
    validators = {
        'accepted': {
            'fn': function (value) {
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
            'msg': function (name) {
                return 'The '+name+' must be accepted.';
            }
        },
        'after': {
            'fn': function (value, date) {
                date = new Date(date);
                return value.getTime() > date.getTime();
            },
            'msg': function (name, date) {
                return 'The '+name+' must be after '+date+'.';
            }
        },
        'alpha': {
            'fn': function (value) {
                return /[A-Z]*/i.test(value);
            },
            'msg': function (name) {
                return 'The '+name+' must be only letters.';
            }
        },
        'alphadash': {
            'fn': function (value) {
                return /[A-Z-]*/i.test(value);
            },
            'msg': function (name) {
                return 'The '+name+' must be only letters and dashes.';
            }
        },
        'before': {
        'fn': function (value, date) {
                date = new Date(date);
                return value.getTime() < date.getTime();
            },
            'msg': function (name, date) {
                return 'The '+name+' must be before '+date+'.';
            }
        },
        'between': {
            'fn': function (value, min, max) {
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
            'msg': function (name, min, max) {
                return 'The '+name+' must be between '+min+' and '+max+'.';
            }
        },
        'bool': {
            'fn':  function (value) {
                return $.type(value) === 'boolean';
            },
            'msg': function (name) {
                return 'The '+name+' must be true or false.';
            }
        },
        'date': {
            'fn':  function (value) {
                return $.type(value) === 'date';
            },
            'msg': function (name) {
                return 'The '+name+' must be a date.';
            }
        },
        'decimal': {
            'fn':  function (value) {
                return $.type(value) === 'number' && Math.round(value) !== value;
            },
            'msg': function (name) {
                return 'The '+name+' must be a decimal.';
            }
        },
        'different': {
            'fn':  function (value, other) {
            other = other.val;
                return value != other;
            },
            'msg': function (name, other) {
                return 'The '+name+' must be different from '+other+'.';
            }
        },
        'email': {
            'fn':  function (value) {
                return /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(value);
            },
            'msg': function (name) {
                return 'The '+name+' must be an email.';
            }
        },
        'empty': {
            'fn':  function (value) {
                return value.length === 0;
            },
            'msg': function (name) {
                return 'The '+name+' must be empty.';
            }
        },
        'in': {
            'fn':  function (value, array) {
                return $.inArray(value, array) > -1;
            },
            'msg': function (name, array) {
                return 'The '+name+' must be one of these values: '+array.join(', ')+'.';
            }
        },
        'integer': {
            'fn':  function (value) {
                return $.type(value) === 'number' && Math.round(value) === value;
            },
            'msg': function (name) {
                return 'The '+name+' must be an integer.';
            }
        },
        'ip': {
            'fn':  function (value) {
                value = value.split('.');
                if (value.length === 0 || value.length > 4) return false;

                for (var i = 0; i < value.length; i++) {
                    if (+value[i] < 0 || +value[i] > 255) return false;
                }

                return true;
            },
            'msg': function (name) {
                return 'The '+name+' must be an ip address.';
            }
        },
        'matches': {
            'fn':  function (value, other) {
                other = this.get(other).val;
                return value === other;
            },
            'msg': function (name, other) {
                return 'The '+name+' must be the same as '+other+'.';
            }
        },
        'max': {
            'fn':  function (value, max) {
                switch ($.type(value)) {
                    case 'string':
                        return value.length < max;
                    default:
                        return value < max;
                }
            },
            'msg': function (name, max) {
                return 'The '+name+' must be less than '+max+'.';
            }
        },
        'min': {
            'fn':  function (value, min) {
                switch ($.type(value)) {
                    case 'string':
                        return value.length > min;
                    default:
                        return value > min;
                }  
            },
            'msg': function (name, min) {
                return 'The '+name+' must be less than '+min+'.';
            }
        },
        'not': {
            'fn':  function (value, array) {
                return $.inArray(value, array) === -1;
            },
            'msg': function (name, array) {
                return 'The '+name+' must not be one of these: '+array.join(', ')+'.';
            }
        },
        'numeric': {
            'fn':  function (value) {
                switch ($.type(value)) {
                    case 'string':
                        return /\d+/.test(value);
                    case 'number':
                        return true;
                    default:
                        return false;
                }
            },
            'msg': function (name) {
                return 'The '+name+' must be only digits.';
            }
        },
        'required': {
            'fn':  function (value) {
                return value.length > 0;
            },
            'msg': function (name) {
                return name.charAt(0).toUpperCase()+name.slice(1)+' must be filled.';
            }
        },
        'size': {
            'fn':  function (value, size) {
                return value.length === size;
            },
            'msg': function (name, size) {
                return 'The '+name+' must be '+size+' characters long.';
            }
        },
    },
    __i,
    key;

    Input.prototype.has = function (selector) {
        return $('input[name='+selector+']').length > 0;
    }

    Input.prototype.get = function (selector) {
        var items = $('input[name='+selector+']');

        if (items.length === 0) return null;

        return new this.__construct(items, this.instance);
    }

    Input.prototype.all = function () {
        var items = $('input');

        if (items.length === 0) return null;

        return new this.__construct(items, this.instance);
    }

    Input.prototype.getValue = function (input) {
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

    Input.prototype.defineRule = function (name, callback, msg) {
        this.instance.validators[name] = {};
        this.instance.validators[name].fn = callback;
        this.instance.validators[name].msg = msg;
        this.instance[name] = function () {
            var args = Array.prototype.slice.call(arguments, 0),
                passing,
                item,
                i,
                argstring,
                str;

            args.unshift(-1);

            for (i = 0; i < this.items.length; i++) {
                item = this.items[i];

                args[0] = item.val;

                argstring = args.slice(1);
                if (this.tests.length > 0) str = '|'; else str = '';
                str += name;
                if (argstring.length > 0) str += ':'+argstring.join(',');

                this.tests += str;

                passing = this.instance.validators[name].fn.apply(this, args);
                if ( ! passing) this.buildError(item, name, args);
                this.passes = (this.passes && passing);
            }

            return this;
        }
    }

    Input.prototype.__construct = function (items, instance) {
        var item, i, key;

        this.instance = instance;
        this.items = [];
        this.errors = [];
        this.passes = true;
        this.tests = '';

        for (i = 0; i < items.length; i++) {
            item = items[i];

            item.val = this.getValue(item);
            this.items.push(item);
        }

        for (key in instance.validators) {
            if (instance.validators.hasOwnProperty(key)) {
                this[key] = this.instance[key];
            }
        }
    }

    Input.prototype.buildError = function (item, failed, args) {
        args.shift();
        message_args = args.slice(0);
        message_args.unshift(failed, item.name);
        this.errors.push({
            'thrown': item,
            'for': failed,
            'args': args,
            'message': this.buildMessage.apply(this, message_args)
        });
    }

    Input.prototype.buildMessage = function () {
        var args = Array.prototype.slice.call(arguments, 0);
        args = args.slice(1);

        return this.instance.validators[arguments[0]].msg.apply(this, args);
    }

    Input.prototype.verbose = function () {
        var passed = ['failed','passed'],
            msg =  'Input '+passed[+this.passes]+' validition',
            i;

        if ( ! this.passes) {
            msg += ': '+this.errors[0].message;
            for (i = 1; i < this.errors.length; i++) {
                msg += ' '+this.errors[i].message;
            }
        } else {
            msg += '!';
        }

        console.log(msg);

        return this;
    }

    Input.prototype.__construct.prototype = Input.prototype;

    __i = new Input();

    for (key in validators) {
        if (validators.hasOwnProperty(key)) {
            __i.defineRule(key, validators[key].fn, validators[key].msg);
        }
    }

    window.Input = __i;
})(window);
