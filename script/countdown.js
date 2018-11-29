$(document).ready(function () {
    
    // sales will end at midnight of the end date
    var endDates = ['2019-03-22', '2019-04-10', '2019-05-25', '2019-06-01', '2019-07-12', '2019-08-22'];
    
    var timeRemaining = []; // stores miliseconds 
    var fields = document.getElementsByClassName("card-footer"); // where the result will be outputted

    function calcTime(endDates, timeRemaining, fields) {
        
        for (var i = 0; i < endDates.length; i++) {
            timeRemaining[i] = Date.parse(endDates[i]) - Date.parse(new Date());
        }

        for (i = 0; i < fields.length; i++) {
            if (timeRemaining[i] <= 0) {
                fields[i].innerHTML = "SALE ENDED";
            } 
            else {
             fields[i].innerHTML = "Sale ends in " 
                                    + Math.floor( timeRemaining[i]/(1000*60*60*24) ) + "d " 
                                    + Math.floor( (timeRemaining[i]/(1000*60*60)) % 24 ) + "h " 
                                    + Math.floor( (timeRemaining[i]/1000/60) % 60 ) + "m " 
                                    + Math.floor( (timeRemaining[i]/1000) % 60 ) + "s ";
        }
    }
}
    // called before the timer to avoid the one sec delay at first
    calcTime(endDates, timeRemaining, fields);
    // call each second
    var timer = setInterval(function() {calcTime(endDates, timeRemaining, fields)}, 1000);
    
});