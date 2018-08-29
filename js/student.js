// Add Record
function addRecord() {
    // get values
    var usn = $("#usn").val();
    var stud_name = $("#stud_name").val();
    var dept_id = $("#dept_id").val();
    var sem_id = $('#sem_id').val();
    var room_id = $('#room_id').val();
    // Add record
    $.post("student/addRecord.php", {
        usn: usn,
        stud_name: stud_name,
        dept_id: dept_id,
        sem_id : sem_id,
        room_id: room_id

    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#usn").val("");
        $("#stud_name").val("");
        $("#dept_id").val("");
        $("#sem_id").val("");
        $("#room_id").val("");

    });
}

// READ records
function readRecords() {
    $.get("student/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(usn) {
   
    var conf = confirm("Are you sure, do you really want to delete Record?");
    if (conf == true) {
        $.post("student/deleteUser.php", {
                usn: usn
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(usn) {
    // Add User ID to the hidden field for furture usage
  
    $.post("student/readUserDetails.php", {
                usn: usn
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_usn").val(user.usn);
            $("#update_stud_name").val(user.stud_name);
            $("#update_dept_id").val(user.dept_id);
            $("#update_sem_id").val(user.sem_id);
            $("#update_room_id").val(user.room_id);

        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var usn = $("#update_usn").val();
    var stud_name = $("#update_stud_name").val();
    var dept_id = $("#update_dept_id").val();
    var sem_id = $("#update_sem_id").val();
    var room_id = $("#update_room_id").val();

    
    // get hidden field value

    // Update the details by requesting to the server using ajax
    $.post("student/updateUserDetails.php", {
        usn: usn,
        stud_name: stud_name,
        dept_id: dept_id,
        sem_id : sem_id,
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