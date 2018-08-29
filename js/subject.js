// Add Record
function addRecord() {
    // get values
    var sub_code = $("#sub_code").val();
    var sub_name = $("#sub_name").val();
    var dept_id = $("#dept_id").val();
    var sem_id = $('#sem_id').val();
    // Add record
    $.post("subject/addRecord.php", {
        sub_code: sub_code,
        sub_name: sub_name,
        dept_id: dept_id,
        sem_id : sem_id
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#sub_code").val("");
        $("#sub_name").val("");
        $("#dept_id").val("");
        $("#sem_id").val("");
    });
}

// READ records
function readRecords() {
    $.get("subject/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(sub_code) {
   
    var conf = confirm("Are you sure, do you really want to delete Record?");
    if (conf == true) {
        $.post("subject/deleteUser.php", {
            sub_code: sub_code
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(sub_code) {
    // Add User ID to the hidden field for furture usage
  
    $.post("subject/readUserDetails.php", {
        sub_code: sub_code
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_sub_code").val(user.sub_code);
            $("#update_sub_name").val(user.sub_name);
            $("#update_dept_id").val(user.dept_id);
            $("#update_sem_id").val(user.sem_id);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var sub_code = $("#update_sub_code").val();
    var sub_name = $("#update_sub_name").val();
    var dept_id = $("#update_dept_id").val();
    var sem_id = $("#update_sem_id").val();
    // get hidden field value

    // Update the details by requesting to the server using ajax
    $.post("subject/updateUserDetails.php", {
        sub_code: sub_code,
        sub_name: sub_name,
        dept_id: dept_id,
        sem_id : sem_id
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