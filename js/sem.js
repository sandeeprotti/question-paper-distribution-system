// Add Record
function addRecord() {
    // get values
    var sem_id = $("#sem_id").val();
    var sem = $("#sem").val();

    // Add record
    $.post("sem/addRecord.php", {
        sem_id: sem_id,
        sem : sem,
        
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#sem_id").val("");
        $("#sem").val("");
    });
}

// READ records
function readRecords() {
    $.get("sem/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(sem_id) {
   
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("sem/deleteUser.php", {
                sem_id: sem_id
            },
            function (data, status) {
                // reload Users by using readRecords();
              //  $("#fac_id").val(fac_id);
                readRecords();
            }
        );
    }
}

function GetUserDetails(sem_id) {
    // Add User ID to the hidden field for furture usage
    $("#sem_id").val(sem_id);
    $.post("sem/readUserDetails.php", {
            sem_id: sem_id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_sem_id").val(user.sem_id);
            $("#update_sem").val(user.sem);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var sem_id = $("#update_sem_id").val();
    var sem = $("#update_sem").val();

    // get hidden field value
    //var fac_id = $("#fac_id").val();

    // Update the details by requesting to the server using ajax
    $.post("sem/updateUserDetails.php", {
            sem_id: sem_id,
            sem : sem,
       
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