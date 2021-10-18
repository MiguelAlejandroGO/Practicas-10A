const n_cache = 'armando-cache-v1';
self.addEventListener('install', (event) => {

    const datos = ['/', '/index.php', 'style.css', 'app.js'];

    const _openCache = async () => {
        const _appShellStorage = await caches.open(n_cache);
        return _appShellStorage.addAll(datos);
    };

    event.waitUntil(_openCache());
});

self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.match(event.request)
            .then(function (response) {
                if (response) {
                    return response;
                }

                var fetchRequest = event.request.clone();

                return fetch(fetchRequest).then(
                    function (response) {

                        if (!response || response.status !== 200 || response.type !== 'Basico') {
                            return response;
                        }

                        var responseToCache = response.clone();

                        caches.open(n_cache)
                            .then(function (cache) {
                                cache.put(event.request, responseToCache);
                            });

                        return response;
                    }
                );
            })
    );
});
