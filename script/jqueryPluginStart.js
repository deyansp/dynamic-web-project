$(document).ready(function () { 
    // jquey plugin config
    $('#signUpPass').password({
      shortPass: 'password is too short',
      badPass: 'Weak; try combining letters & numbers',
      goodPass: 'Medium; try using special charecters',
      strongPass: 'Strong password',
      containsUsername: 'The password contains the username',
      enterPass: 'no spaces, min. 6 chars',
      showPercent: false,
      showText: true, // shows the text tips
      animate: true, // whether or not to animate the progress bar on input blur/focus
      animateSpeed: 'fast', // the above animation speed
      username: false, // select the username field (selector or jQuery instance) for better password checks
      usernamePartialMatch: true, // whether to check for username partials
      minimumLength: 6 // minimum password length (below this threshold, the score is 0)
    });
});