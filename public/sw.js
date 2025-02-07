// sw.js
self.addEventListener('install', (event) => {
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil(clients.claim());
});

self.addEventListener('notificationclick', (event) => {
    const actions = {
        stop: () => {
            self.clients.matchAll().then(clients => {
                clients.forEach(client => client.postMessage({action: 'stopAudio'}));
            });
        },
        pause: () => {
            self.clients.matchAll().then(clients => {
                clients.forEach(client => client.postMessage({action: 'pauseAudio'}));
            });
        },
        resume: () => {
            self.clients.matchAll().then(clients => {
                clients.forEach(client => client.postMessage({action: 'resumeAudio'}));
            });
        }
    };

    if (actions[event.action]) {
        actions[event.action]();
    }
});