
/*var validateForms = document.forms.filter(function (form) {
    return form
});*/
var forms = $('.validate');
//console.log(forms);
forms.each(function (i, form) {
    var formControls = $(form).find('.form-control');
    formControls.each(function (i, formControl) {
        console.log(formControl);
    });
});
/*for(var key in forms) {
    if(forms.hasOwnProperty(key)) {
        console.log(forms[key]);
    }
}*/
//console.log(forms);
//console.log(keys);
name = '^[a-zA-Z-._ ]{2,30}$';
nameError = 'Field must be between 2 to 30 characters.';

description = '\\S';
descriptionError = 'Field required.';

route_name = '\\S';
route_nameError = 'Field required.';

function validateInput(selector) {
    $(".validate input[name="+selector+"]").after('<div class="error"></div>');
    $(".validate input[name="+selector+"]").on("change keyup paste click", function () {
        val = $(this).val();
        regex = new RegExp(eval(selector));
        if(regex.test(val)) {
            $(this).next('.error').text('');
        } else {
            $(this).next('.error').text(eval(selector+"Error"));
        }
    });
}

function validateCheckBox() {
    $(".validate input[type='checkbox']").parent().parent().append('<div class="error"></div>');
    $(".validate input[type='checkbox']").parent().each(function () {
        if ($(this).find('input').is(":checked")) {
            console.log($(this));
        }
        // $(this).find('input').after('ok');
        /*$(this).find('input').on("change", function () {
            //$(this).parent().next('.error').text('ok');
            /!*if ($(this).find('input').is(":checked")) {
                $(this).parent().next('.error').text('');
            } else {
                $(this).parent().next('.error').text('Field required.');
            }*!/
        });*/
    });
    /*$(".validate input[type='checkbox']").parent().parent().append('<div class="error"></div>');
    $(".validate input[type='checkbox']").on("change", function () {
        //$(this).parent().next('.error').text('ok');
        if($(this).is(":checked")) {
            $(this).parent().next('.error').text('');
        } else {
            $(this).parent().next('.error').text('Field required.');
        }
        /!*val = $(this).val();
        regex = new RegExp(eval(selector));
        if(regex.test(val)) {
            $(this).next('.error').text('');
        } else {
            $(this).next('.error').text(eval(selector+"Error"));
        }*!/
    });*/
}

validateInput('name');
validateInput('description');
validateCheckBox();