function setUrl(baseUrl, query) {
    window.history.pushState(null, null, createUrl(baseUrl, query));
}

function createUrl(baseUrl, query) {
    let url = new URL(baseUrl);
    for (var key in query) {
        url.searchParams.set(key, query[key]);
    }
    return url;
}

export { setUrl, createUrl };
