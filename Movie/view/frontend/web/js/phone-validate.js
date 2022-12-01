require(
    [
        'Magento_Ui/js/lib/validation/validator',
        'jquery',
        'mage/translate'
    ], function(validator, $){
        validator.addRule(
            'phone-validate',
            function (value) {
                return /^(0|\+84|84)[0-9]{9,10}$/.test(value);
            },
            $.mage.__('Please specify a valid phone number')
        );``
    });
