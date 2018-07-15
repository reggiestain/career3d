$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});





$(document).ready(function () {

    $(document).on("click", ".profile-image", function () {
        //imageupload();
        $("#profileModal").modal();
    });

    $(document).on("click", ".high-cert", function () {
        $("#certificateModal").modal();
    });
});



