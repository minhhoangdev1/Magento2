require([
    'jquery',
    'jquery/ui',
    'jquery/validate',
    'mage/translate'
], function ($) {
    //Validate Image FileSize
    $('.avatar.validate-image').on('change', function(event) {
        //$('.profile-image, .avatar-file-upload').css({'opacity':'0.5'});
        $('.profile-image').attr('src',URL.createObjectURL(event.target.files[0]));
    });
    $.validator.addMethod(
        'validate-image', function (v, elm) {
            if (elm.value != '') {
                var ext = elm.value.split('.').pop().toLowerCase();
                if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    return false;
                }
            }
            return true;
        }, $.mage.__('Image invalid (Accepting format .gif .png .jpg .jpeg)')
    );
});
