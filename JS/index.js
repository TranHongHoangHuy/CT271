// alert("file còn sống!!!!!!!!!!");

const b = document.querySelector(".product_detail_b");
const parent = b.parentElement;
const firstChild = parent.firstElementChild;

b.addEventListener("scroll", function () {
  if (b.scrollHeight - b.clientHeight <= b.scrollTop) {
    parent.scrollTo({
      top: firstChild.offsetTop,
      behavior: "smooth",
    });
  }
});

$(document).ready(function () {
  $("#example").DataTable();
});
