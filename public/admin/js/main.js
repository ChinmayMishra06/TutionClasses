function api(url, obj, successCallback, failCallback) {

    console.log("REQUEST on url: " + url, obj);

    $.ajax({
        method: "POST",
        url: url,
        data: obj//JSON.stringify(obj)
    }).done(function (result) {
        console.log("RESPONSE of url: " + url, result);
        successCallback(result);
    }).fail(function () {
        console.log("FAILED RESPONSE of url: " + url);
        failCallback();
    });

}//api

function showSuccess(title, msg, duration = 2000) {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr.success(msg, title, {timeOut: duration});
}