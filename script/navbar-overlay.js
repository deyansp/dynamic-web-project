$(document).ready(function () { 
    
    // on small screens a navigation overlay is displayed for better visibility 
    // gets the hamburger icon when the navbar collapses
    var toggleButton = document.getElementsByClassName('navbar-toggler')[0];

    toggleButton.onclick = function () { 
        
        document.body.classList.add("disable-scroll");
        
        document.getElementById("navbarOverlay").classList.add("overlay");
        
        // adding class to the ul element
        document.getElementsByClassName("nav-item")[0].parentNode.classList.add("overlay-close-button","overlay-ul");
        
        // accesing each link in the node list
        var navLinks = document.getElementsByClassName("nav-item");
            for (i = 0; i < navLinks.length; i++) {
                navLinks[i].classList.add("overlay-a");
            }
    
        
            // removing overlay 
            document.getElementsByClassName("overlay-close-button")[0].onclick = function () {
             
                document.getElementById("navbarOverlay").classList.remove("overlay", "show");
                document.getElementsByClassName("nav-item")[0].parentNode.classList.remove("overlay-close-button","overlay-ul");

                for (i = 0; i < navLinks.length; i++) {
                    navLinks[i].classList.remove("overlay-a");
                }
                document.body.classList.remove("disable-scroll");
        }
    }
});