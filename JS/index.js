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

// JavaScript để cắt văn bản và thêm dấu "..."
var titleElement = document.getElementById("productTitle");
var maxLength = 30; // Độ dài tối đa bạn muốn hiển thị
var titleText = titleElement.innerText;

if (titleText.length > maxLength) {
  titleElement.innerText = titleText.substring(0, maxLength) + "...";
}
