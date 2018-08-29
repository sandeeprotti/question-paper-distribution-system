// Add Record
function addRecord() {
    // get values
    var sch_code = $("#sch_code").val();
    var sch_date = $("#sch_date").val();
    var sub_code = $("#sub_code").val();
    var paper = $("#paper").val();
    // Add record
    $.post("schedule/addRecord.php", {
        sch_code: sch_code,
        sch_date: sch_date,
        sub_code: sub_code,
        paper : paper
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#sch_code").val("");
        $("#sch_date").val("");
        $("#sub_code").val("");
        $("#paper").val("");
    });
}

// READ records
function readRecords() {
    $.get("schedule/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(sch_code) {
   
    var conf = confirm("Are you sure, do you really want to delete Record?");
    if (conf == true) {
        $.post("schedule/deleteUser.php", {
            sch_code: sch_code
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(sch_code) {
    // Add User ID to the hidden field for furture usage
  
    $.post("schedule/readUserDetails.php", {
        sch_code: sch_code
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_sch_code").val(user.sch_code);
            $("#update_sch_date").val(user.sch_date);
            $("#update_sub_code").val(user.sub_code);
            $("#update_paper").val(user.paper);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    
    var sch_code = $("#update_sch_code").val();
    var sch_date = $("#update_sch_date").val();
    var sub_code = $("#update_sub_code").val();
    var paper = $("#update_paper").val();
    // get hidden field value

    // Update the details by requesting to the server using ajax
    $.post("schedule/updateUserDetails.php", {
        sch_code: sch_code,
        sch_date: sch_date,
        sub_code: sub_code,
        paper : paper
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