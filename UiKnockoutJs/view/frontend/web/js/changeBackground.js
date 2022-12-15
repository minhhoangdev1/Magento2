define(['jquery', 'uiComponent', 'ko',"mage/calendar"], function ($, Component, ko) {
        'use strict';
        return Component.extend({
            initialize: function () {
                this._super();
            },
            change : function (color) {
                $("body").css("background-color",color);
            }
        });
    }
);
