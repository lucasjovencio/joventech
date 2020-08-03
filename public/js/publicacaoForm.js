jQuery(document).ready(function ($) {
    "use strict";
    $('form.publicacaoForm').submit(function () {
        var f = $(this).find('.form-validation'),
            ferror = false;
        f.children('input').each(function () { // run all inputs
            var i = $(this); // current input
            var rule = i.attr('data-rule');
            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }
                switch (rule) {
                    case '':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;
                    case 'required':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;
                    case 'image':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;
                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'email':
                        if (!emailExp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'checked':
                        if (!i.is(':checked')) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'regexp':
                        exp = new RegExp(exp);
                        if (!exp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;
                }
                if(rule==='image'){
                    $('#validation-image').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');

                }else{
                    i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
                }
                
            }
        });
        f.children('select').each(function () { // run all inputs
            var i = $(this); // current input
            var rule = i.attr('data-rule');
            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                switch (rule) {
                    case '':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;
                    case 'tipo-dinamico':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;
                }
                if(rule==='tipo-dinamico'){
                    $('#validationtipo').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
                }else{
                    i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
                }
            }
        });
         f.children('input[name="categorias[]"]').each(function () { // run all inputs categorias
            var i = $(this); // current input
            const atLeastOneIsChecked = $('input[name="categorias[]"]:checked').length;
            var rule = i.attr('data-rule');
            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                switch (rule) {
                    case 'required':
                        if (atLeastOneIsChecked==0) {
                            ferror = ierror = true;
                        }
                        break;
                }
                $('#validationCheckboxCategorias').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        f.children('textarea').each(function () { // run all inputs

            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case '':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        if (ferror) return false;
        return true;
    });
});