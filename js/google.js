/* 
 Created on : 07.05.2018
 Author     : Daniel Kleebinder
 */


function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

    var id_token = googleUser.getAuthResponse().id_token;
    $.ajax({
        type: 'POST',
        url: './action/googlesignin.php',
        data: 'idtoken=' + id_token,
        success: function (data) {
            console.log('RESPONSE: ' + data);
        }
    });
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
}