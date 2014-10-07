function createNewEvent() {

    var title = $("#inputTitle").val();
    var from = $("#inputFrom").val();
    var to = $("#inputTo").val();
    var description = $("#inputDescription").val();

    var err = 0;
    if (title === "") {
        err = 1;
        $("#inputTitle").parent().addClass("has-error");
    } else {
        $("#inputTitle").parent().removeClass("has-error");
    }

    if (from === "") {
        err = 1;
        $("#inputFrom").parent().parent().addClass("has-error");
    } else {
        $("#inputFrom").parent().parent().removeClass("has-error");
    }
    if (to === "") {
        err = 1;
        $("#inputTo").parent().parent().addClass("has-error");
    } else {
        $("#inputTo").parent().parent().removeClass("has-error");
    }

    if (err === 1) {
        $("#event-error-panel").removeClass("hidden");
    } else {

        $.when(ajaxCreateNewEvent(title, description, from, to)).then(function(data, textStatus, jqXHR) {
            if (data.result === appConstants.OPERATION_RESULT_ERROR){
                alertify.error(data.message);
            } else {
                clearForm();
                initCalendar();
                $("#newEventModal").modal("hide");
            }
        });

    }

}

function clearForm() {
    $("#inputTitle").val("");
    $("#inputFrom").val("");
    $("#inputTo").val("");
    $("#inputDescription").val("");
}