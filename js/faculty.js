// Add Record

function addRecord() {
    // get values
    var fac_id = $("#fac_id").val();
    var fac_name = $("#fac_name").val();
    var fac_pass = $("#fac_pass").val();
    var room_id = $('#room_id').val();

    // Add record
    $.post("faculty/addRecord.php", {
        fac_id: fac_id,
        fac_name: fac_name,
        fac_pass: fac_pass,
        room_id: room_id
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#fac_id").val("");
        $("#fac_name").val("");
        $("#fac_pass").val("");
        $("#room_id").val("");

    });
}

// READ records
function readRecords() {
    $.get("faculty/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(fac_id) {
   
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("faculty/deleteUser.php", {
                fac_id: fac_id
            },
            function (data, status) {
                // reload Users by using readRecords();
              //  $("#fac_id").val(fac_id);
                readRecords();
            }
        );
    }
}

function GetUserDetails(fac_id) {
    // Add User ID to the hidden field for furture usage
    $("#fac_id").val(fac_id);
    $.post("faculty/readUserDetails.php", {
            fac_id: fac_id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_fac_id").val(user.fac_id);
            $("#update_fac_name").val(user.fac_name);
            $("#update_fac_pass").val(user.fac_pass);
            $("#update_room_id").val(user.room_id);

        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var fac_id = $("#update_fac_id").val();
    var fac_name = $("#update_fac_name").val();
    var fac_pass = $("#update_fac_pass").val();
    var room_id = $("#update_room_id").val();


    // get hidden field value
    //var fac_id = $("#fac_id").val();

    // Update the details by requesting to the server using ajax
    $.post("faculty/updateUserDetails.php", {
            fac_id: fac_id,
            fac_name: fac_name,
            fac_pass:fac_pass,
            room_id: room_id
        
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});