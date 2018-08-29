// Add Record
function addRecord() {
    // get values
    var dept_id = $("#dept_id").val();
    var dept_name = $("#dept_name").val();

    // Add record
    $.post("dept/addRecord.php", {
        dept_id: dept_id,
        dept_name: dept_name,
        
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#dept_id").val("");
        $("#dept_name").val("");
    });
}

// READ records
function readRecords() {
    $.get("dept/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(dept_id) {
   
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("dept/deleteUser.php", {
                dept_id: dept_id
            },
            function (data, status) {
                // reload Users by using readRecords();
              //  $("#fac_id").val(fac_id);
                readRecords();
            }
        );
    }
}

function GetUserDetails(dept_id) {
    // Add User ID to the hidden field for furture usage
    $("#fac_id").val(dept_id);
    $.post("dept/readUserDetails.php", {
            dept_id: dept_id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_dept_id").val(user.dept_id);
            $("#update_dept_name").val(user.dept_name);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var dept_id = $("#update_dept_id").val();
    var dept_name = $("#update_dept_name").val();

    // get hidden field value
    //var fac_id = $("#fac_id").val();

    // Update the details by requesting to the server using ajax
    $.post("dept/updateUserDetails.php", {
            dept_id: dept_id,
            dept_name: dept_name,
       
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