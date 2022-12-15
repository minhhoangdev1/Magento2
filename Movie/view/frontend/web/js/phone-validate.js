define([
    'jquery',
    'jquery/ui',
    'jquery/validate',
    'mage/translate'
], function($){
    'use strict';
    return function(target) {
        $.validator.addMethod(
            "phone-validate",
            function(value, element) {
                value = value.trim();
                $('#phone').val(value);
                return value === "" || value.length > 9 && value.match(/^(0|\+84|84)[0-9]{9,10}$/);
            },
            $.mage.__('Please specify a valid phone number')
        );
        return target;
    }
});
