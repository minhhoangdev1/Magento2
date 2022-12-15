define(['jquery', 'uiComponent', 'ko',"mage/calendar"], function ($, Component, ko) {
        'use strict';
        return Component.extend({
            initialize: function () {
                this._super();
                this.timeShip();
            },
            timeShip:function (){
                $("#timeShip").calendar({
                    buttonText:"<?php echo __('Select Date') ?>",
                });
            }
        });
    }
);
