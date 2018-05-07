/* 
 Created on : 07.05.2018
 Author     : Daniel Kleebinder
 */


function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;
    $.ajax({
        type: 'POST',
        url: './action/googlesignin.php',
        data: 'idtoken=' + id_token,
        success: function (data) {
            if (data === 'error') {
                return;
            }
            $('#login-form').submit();
        }
    });
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
}