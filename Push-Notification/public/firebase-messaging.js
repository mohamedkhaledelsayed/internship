var firebaseConfig = {
    apiKey: "AIzaSyCuNL9JG_JzhhZVe2uZV452qMTINPlIa6w",
    authDomain: "push-notification-479ec.firebaseapp.com",
    projectId: "push-notification-479ec",
    storageBucket: "push-notification-479ec.appspot.com",
    messagingSenderId: "339268313257",
    appId: "1:339268313257:web:a660d2e5d718e865cb89b8",
    measurementId: "G-ZYRQ3Q34RY"
};
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

function startFCM() {
    messaging.requestPermission()
    .then(function() {
        return messaging.getToken();
    })
    .then(function(token) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: document.body.getAttribute('data-url'),
            type: 'POST',
            data: {
                token: token
            },
            dataType: 'JSON',
            success: function(response) {
                alert('Token stored.');
            },
            error: function(error) {
                alert(error.responseText);
            },
        });
    }).catch(function(error) {
        alert(error.message);
    });
}

messaging.onMessage(function(payload) {
    console.log("Message received. ", payload);
    const title = payload.notification.title;
    const options = {
        body: payload.notification.body,
        icon: payload.notification.icon
    };
    new Notification(title, options);
});




