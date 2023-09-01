(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('validerinfos');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('validerinfos_imma');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

function chaines(chars) {
    var regex = new RegExp("[a-zàâäçéèêë îïôö'ùûüæœ]", "i");
    var valid;
    for (x = 0; x < chars.value.length; x++) {
        valid = regex.test(chars.value.charAt(x));
        if (valid == false) {
            chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1);
            x--;
        }
    }
}

function numeric(chars) {
    var regex = new RegExp("[0-9]", "i");
    var valid;
    for (x = 0; x < chars.value.length; x++) {
        valid = regex.test(chars.value.charAt(x));
        if (valid == false) {
            chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1);
            x--;
        }
    }
}

function mixed(chars) {
    var regex = new RegExp("[a-z0-9àâäçéèêë îïôö'ùûüæœ]", "i");
    var valid;
    for (x = 0; x < chars.value.length; x++) {
        valid = regex.test(chars.value.charAt(x));
        if (valid == false) {
            chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1);
            x--;
        }
    }
}

function chat(chars) {
    var regex = new RegExp("[a-z0-9àâäçéèêë îïôö'.?ùûüæœ]", "i");
    var valid;
    for (x = 0; x < chars.value.length; x++) {
        valid = regex.test(chars.value.charAt(x));
        if (valid == false) {
            chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1);
            x--;
        }
    }
}

function matricule(chars) {
    var regex = new RegExp("[abcdefghjklmnpqr/stuvwxyz0123456789]", "i");
    var valid;
    for (x = 0; x < chars.value.length; x++) {
        valid = regex.test(chars.value.charAt(x));
        if (valid == false) {
            chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1);
            x--;
        }
    }
}
const input = document.querySelector('input');
const maxLength = input.getAttribute('maxlength');
input.addEventListener('input', event => { const valueLength = event.target.value.length; const leftCharLength = maxLength - valueLength; if (leftCharLength < 0) return; });
if (window.history.replaceState) { window.history.replaceState(null, null, window.location.href); }

function filterForm() { document.filter.submit(); }
$('.select2').select2();
$(document).ready(function() {
    $("#recherchedata").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#searchtd tr").filter(function() { $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) });
    });
});
$(document).ready(function() { $('#checkall').click(function() { if ($(this).is(":checked")) { $(".checkitem").prop("checked", true); } else { $(".checkitem").prop("checked", false); } }); });

function submitActions() { document.ifSendDatas.submit(); }