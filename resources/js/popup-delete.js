$(document).ready(function () {
    $(".deleteBtn").click(function (e) {
        e.preventDefault();

        var id = $(this).attr("data-id");
        $("#id").val(id);

        $("#deleteModal").modal("show");
    });
});
