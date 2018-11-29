$(document).ready(function() {

    $("#getUsers").click(function() {

        $.ajax({
            type: "POST",
            url: "script/getUsers.php",
             data: {
                action: 'display',
            },
            success: function(result) { 
            $("#insertTable").html(result);
        }});
    });
    
    $("#tourDates").click(function() {
    
        $.ajax({
            type: "POST",
            url: "script/getTourDatesAdmin.php",
            success: function(result) { 
            $("#insertTable").html(result);
        }});
    });
});