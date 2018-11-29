$(document).ready(function getTourDates() {
  var xhttp;
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
        var tourDates = JSON.parse(this.responseText); // parse the php query result
        var elements = document.getElementsByClassName("card-body"); // get all of the cards for the data
        
        var tourDateIndex = 0;
        for (var cardBody = 0; cardBody < elements.length; cardBody++) {
            for (var textChild = 1; textChild < elements[cardBody].childNodes.length - 2; textChild += 2) {
                elements[cardBody].childNodes[textChild].textContent += tourDates[tourDateIndex];
                tourDateIndex++;
                if (tourDateIndex % 4 == 0) //since we only want 4 values in each card, we check that when its divided by 4 the remainder is zero and then we exit out of the child loop and move onto the next card.
                    break;
            }
        }
     }
  };
  xhttp.open("POST", "script/getTourDates.php", true);
  xhttp.send();
});               