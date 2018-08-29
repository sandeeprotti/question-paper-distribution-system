// Add Record
function addRecord() {
    // get values
    var room_id = $("#room_id").val();
    var no_of_students = $("#no_of_students").val();
    // Add record
    $.post("room/addRecord.php", {
        room_id: room_id,
        no_of_students : no_of_students,
        
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#room_id").val("");
        $("#no_of_students").val("");
    });
}

// READ records
function readRecords() {
    $.get("room/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(room_id) {
   
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("room/deleteUser.php", {
            room_id: room_id
            },
            function (data, status) {
                // reload Users by using readRecords();
              //  $("#fac_id").val(fac_id);
                readRecords();
            }
        );
    }
}

function GetUserDetails(room_id) {
    // Add User ID to the hidden field for furture usage
    
    $.post("room/readUserDetails.php", {
        room_id: room_id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_room_id").val(user.room_id);
            $("#update_no_of_students").val(user.no_of_students);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var room_id = $("#update_room_id").val();
    var no_of_students = $("#update_no_of_students").val();

    // get hidden field value
    //var fac_id = $("#fac_id").val();

    // Update the details by requesting to the server using ajax
    $.post("room/updateUserDetails.php", {
        room_id: room_id,
            no_of_students : no_of_students,
       
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