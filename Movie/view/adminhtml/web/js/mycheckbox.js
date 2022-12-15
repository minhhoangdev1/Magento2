define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/single-checkbox',
    'Magento_Ui/js/modal/modal', ,
    'ko'
], function (_, uiRegistry, select, modal, ko) {
    'use strict';
    return select.extend({
        initialize: function () {
            this._super();
            this.fieldDepend(this.value());
            return this;
        },
        onUpdate: function (value) {
            var field_from_date = uiRegistry.get('index = from_date');
            var field_to_date = uiRegistry.get('index = to_date');
            if (value == 0) {
                field_from_date.hide();
                field_to_date.hide();
            } else {
                field_from_date.show();
                field_to_date.show();
            }
            return this._super();
        },
        fieldDepend: function (value) {
            setTimeout(function () {
                var field_from_date = uiRegistry.get('index = from_date');
                var field_to_date = uiRegistry.get('index = to_date');
                if (value == 0) {
                    field_from_date.hide();
                    field_to_date.hide();
                } else {
                    field_from_date.show();
                    field_to_date.show();
                }
            });
        }
    });
});
