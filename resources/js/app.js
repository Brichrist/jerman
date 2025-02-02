import Alpine from "alpinejs";

import "./bootstrap";

window.Alpine = Alpine;

Alpine.start();

import jQuery from "jquery";
window.$ = jQuery;

import Swal from "sweetalert2";
window.Swal = Swal;

$(document).ready(function () {
    $(".spc-btn").on("click", function (e) {
        e.preventDefault();
        var text = $(this).text().trim();
        console.log(text);
        copyToClipboard(text);
    });
});

function copyToClipboard(text) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
}
