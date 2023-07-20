import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

import $ from 'jquery';
import 'jquery-validation';

$(document).ready(function() {
    // Controllo in tempo reale per la conferma della password
    $("#password-confirm").keyup(function() {
        var password = $("#password").val();
        var confirmPassword = $(this).val();

        if (password === confirmPassword) {
            $(this).removeClass("is-invalid").addClass("is-valid");
        } else {
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    });
});