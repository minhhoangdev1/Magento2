define([
    'ko',
    'uiComponent',
    "Magento_Ui/js/modal/modal",
    'jquery'
], function (ko, Component,modal,$) {
    'use strict';
    var options = {
        type: 'popup',
        responsive: true,
        title: 'Main title',
    };
    var popup = modal(options, $('#popup'));
    return Component.extend({
        initialize: function () {
            //initialize parent Component
            this._super();
            this.isLogin = ko.observable(this.isLogin);
            if(this.readCookie('OnlyONCE') == null){
                if(this.isLogin==0){
                    console.log('ok')
                    // this.createPopUp()
                    // this.createCookie('OnlyONCE','true',1);
                }else {
                    console.log('ko')
                    // this.removeCookie()
                    // this.createPopUp()
                    // this.createCookie('OnlyONCE','true',1);
                }
            }
        },
        createPopUp: function (){
            $('#popup').modal('openModal');
        },
        createCookie:function (name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                var expires = "; expires=" + date.toUTCString();
            }
            else var expires = "";
            document.cookie = name + "=" + value + expires + "; path=/";
        },
        readCookie:function (name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        },
        removeCookie: function() {
            $.cookie("OnlyONCE", null);
        }
    });
});
