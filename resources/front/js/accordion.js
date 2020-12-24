var acc = document.getElementsByClassName("accordion__button");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("accordion--active");
  });
}
