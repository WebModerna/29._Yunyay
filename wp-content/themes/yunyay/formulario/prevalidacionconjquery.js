$(document).on("ready", formulariodecontacto()){
    function formulariodecontacto() {
    $('form#contactForm').submit(function()
    {
        $('#contactForm .alert, #contactForm .error').remove();
 
        var hasError = false;
 
        $('.requiredField').each(function()
        {
            if(jQuery.trim($(this).val()) == '')
            {
                var labelText = $(this).prev().prev('label').text();
                $(this).parent().append('<span class="error">Olvidaste '+labelText+'.</span>');
                hasError = true;
            }
            else if($(this).hasClass('email'))
            {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(!emailReg.test(jQuery.trim($(this).val())))
                {
                    var labelText = $(this).prev().prev('label').text();
                    $(this).parent().append('<span class="error">El '+labelText+'no es válido.</span>');
                    hasError = true;
                }
            }
        });
 
        return !hasError;
 
    });
});