$(document).ready(function () {
// Add Record 
function addRecord() {
    // get values
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var email = $("#email").val();
    var gender =$("#gender").val();
    var designation = $("#designation").val();
    var address = $("#address").val();

    // Add record
    $.post("addNewUser.php", {
        firstName: firstName,
        lastName: lastName,
        gender: gender,
        email: email,
        designation : designation,
        address : address
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#firstName").val("");
        $("#lastName").val("");
        $("#gender").val("");
        $("#email").val("");
        $("#designation").val("");
        $("address").val("");
    });
}

// READ records
function readRecords() {
    $.get("readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
});