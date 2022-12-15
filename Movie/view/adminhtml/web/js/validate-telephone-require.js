require(
    [
        'Magento_Ui/js/lib/validation/validator',
        'jquery',
        'mage/translate'
    ], function(validator, $){
        validator.addRule(
            'validate-telephone-require',
            function (value) {
                // value = value.trim();
                // $('#telephone').val(value);
                return /^(0|\+84|84)[0-9]{9,10}$/.test(value);
                //return value === "" || value.length > 9 && value.match(/^(0|\+84|84)[0-9]{9,10}$/);
            },
            $.mage.__('Please specify a valid phone number')
        );
    });

// define([
//     'Magento_Ui/js/lib/validation/validator',
//     'mage/translate',
//     'jquery'
// ], function ($) {
//     "use strict";
//     return function () {
//         $.validator.addMethod(
//             'validate-telephone-require',
//             function (value) {
//                 value = value.trim();
//                 $('#telephone').val(value);
//                 return value === "" || value.length > 9 && value.match(/^(0|\+84|84)[0-9]{9,10}$/);
//             },
//             $.mage.__('Please specify a valid phone number')
//         );
//     };
// });
