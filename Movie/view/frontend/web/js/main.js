require([
    "jquery",
    "Magento_Ui/js/modal/modal"
],function($, modal) {

    var options = {
        type: 'popup',
        responsive: true,
        title: 'Main title',
        buttons: [{
            text: $.mage.__('Ok'),
            class: '',
            click: function () {
                this.closeModal();
            }
        }]
    };

    var popup = modal(options, $('#modal'));
    $("#button").click(function() {
        $('#modal').modal('openModal');
    });

    $('#alert').on('click',()=>{
        alert('Hello World');
    })
});
