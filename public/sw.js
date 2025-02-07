self.addEventListener('install', (event) => {
    console.log('Service Worker installed');
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    console.log('Service Worker activated');
    event.waitUntil(clients.claim());
});

// Handle notification actions
self.addEventListener('notificationclick', function(event) {
    event.notification.close();
    
    const action = event.action;
    const notification = event.notification;
    
    // Get all windows
    event.waitUntil(
        clients.matchAll({
            type: 'window',
            includeUncontrolled: true
        }).then(function(clientList) {
            // If we have a window, focus it and send the action
            if (clientList.length > 0) {
                clientList[0].focus();
                clientList[0].postMessage({
                    action: action
                });
            }
        })
    );
});