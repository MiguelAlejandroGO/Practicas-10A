const nameCache = "AdoptDog";
const assets = [
  "/",
  "/index.html",
  "/css/style.css",
  "/css/bootstrap.min.css",
  "/images/dog_icon.svg",
  "/js/app.js",
  "/js/main.js",
  "/js/jquery.js",
  "/js/party.js",
  "/js/bootstrap.bundle.min.js",
];


self.addEventListener("install", installEvent => {
  const _openCache =  async () => {
  const _appshellStorage = await caches.open(nameCache);
  return _appshellStorage.addAll(assets);
  };

  installEvent.waitUntil(_openCache());
});

/*1. Cache Only */

// self.addEventListener('fetch', event => {
//   //verifica si la peticion de la peticion este en el cache
//   event.respondWith(caches.match(event.request));
// });

 
// 2. Network Only
self.addEventListener('fetch', event => { 
  event.respondWith(networkCache.match(event.request));
});






// self.addEventListener("fetch", fetchEvent => {
//     fetchEvent.respondWith(
//       caches.match(fetchEvent.request).then(res => {
//         return res || fetch(fetchEvent.request);
//       })
//     )
//   });


