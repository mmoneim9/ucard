importScripts('https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js');

// messagingSenderId.
firebase.initializeApp({
  apiKey: "AIzaSyCl2iYSHVa3PG7WfSwHFha3rEJ-pUGOa4k",
  authDomain: "ucard-d42cc.firebaseapp.com",
  projectId: "ucard-d42cc",
  storageBucket: "ucard-d42cc.appspot.com",
  messagingSenderId: "535745831710",
  appId: "1:535745831710:web:2c1799cc8223d5d5b51f0f",
  measurementId: "G-8ME3RCRKQY"
});

// messages.
const messaging = firebase.messaging();
// [END initialize_firebase_in_sw]

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  /*
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
      body: 'Background Message body.'
    };
  */

  // Customize notification here
  const notificationTitle = payLoad.notification.title;
  const notificationOptions = {
    body: payLoad.notification.body,
    icon: payLoad.notification.icon,
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});
