export default function setUrl(baseUrl, query) {
    let url = new URL(baseUrl);
    for (var key in query) {
        url.searchParams.set(key, query[key]);
    }
    console.log("eeeeeeeeeeeeeeeeeeeee");
    console.log(url);
    window.history.pushState(null, null, url);
}
