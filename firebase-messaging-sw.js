importScripts('https://www.gstatic.com/firebasejs/9.14.0/firebase-app-compat.js')
importScripts('https://www.gstatic.com/firebasejs/9.14.0/firebase-messaging-compat.js')
const firebaseConfig = {
        apiKey: "AIzaSyC5UYSZcnjJzBW70lKFRqeuL0l4MI7Dm9E",
        authDomain: "smartgate-17cc2.firebaseapp.com",
        projectId: "smartgate-17cc2",
        storageBucket: "smartgate-17cc2.appspot.com",
        messagingSenderId: "1071404311075",
        appId: "1:1071404311075:web:89131b3487f88a40ea8796",
        measurementId: "G-VNQVH133NX"
};
self.addEventListener('notificationclick', function(event) {
        // Handle the notification click event here
        const clickedNotification = event.notification;
        clickedNotification.close();
        event.waitUntil(
            clients.openWindow(event.notification.data.click_action)
        );
    });
    
    const app = firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    
    messaging.onBackgroundMessage(function (payload) {
        if (!payload.hasOwnProperty('notification')) {
            const notificationTitle = payload.data.title;
            const notificationOptions = {
                body: payload.data.body,
                icon: payload.data.icon,
                image: payload.data.image
            };
            self.registration.showNotification(notificationTitle, notificationOptions);
        }
    });
   
    