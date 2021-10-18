const n_cache = 'armando-cache-v1';
self.addEventListener('install', (event) => {

    const datos = ['/', '/index.php', 'style.css', 'app.js'];

    const _openCache = async () => {
        const _appShellStorage = await caches.open(n_cache);
        return _appShellStorage.addAll(datos);
    };

    event.waitUntil(_openCache());
});

/*self.addEventListener('fetch', event => {
    event.respondWith(fetch(event.request));
})*/
/*
self.addEventListener('fetch', event => {
     const response = caches.match(event.request).then( res => {
        console.log('Existe el request ' + event.request)
        console.log(res);
    })
    .catch( res =>{
        console.log('No existe el request ' + event.request)
        console.log(res);
    })
    ; 

    event.responseWith(
        caches.match(event.request).then(cacheResponse => {
            return cacheResponse || fetch(event.request)
        })
    );
});*/

//Network first
self.addEventListener('fetch', event => {
const networkFirst = (event) => {
    event.respondWith(
        fetch(event.request)
            .then((networkResponse) => {
                return caches.open(currentCache).then((cache) => {
                    cache.put(event.request, networkResponse.clone());
                    return networkResponse;
                })
            })
            .catch(() => {
                return caches.match(event.request);
            })
    )
};
});