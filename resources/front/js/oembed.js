const oembedTags = document.querySelectorAll(".media oembed");
const route = "/api/oembed";

[...oembedTags].forEach(oembedTag => {
  const url = oembedTag.getAttribute("url");
  axios
    .get(route, { params: { url } })
    .then(function(response) {
      const { data } = response;
      const div = document.createElement("div");
      div.classList.add(data.providerName);
      div.innerHTML = data.html;
      oembedTag.replaceWith(div);
    })
    .catch(function(error) {
      console.log(error);
    });
});
