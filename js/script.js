const inputUrl = document.querySelector(".field input");
const previewArea = document.querySelector(".preview-area");
const imgTag = document.querySelector(".thumbnail");
const hiddenInput = document.querySelector(".hidden-input input");

inputUrl.addEventListener("keyup", () => {
  let imgUrl = inputUrl.value; // getting user entered url
  previewArea.classList.add("active");

  if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
    let vidId = imgUrl.split("v=")[1].substring(0, 11);
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytThumbUrl;
  } else if (imgUrl.indexOf("https://youtube.com/be")) {
    let vidId = imgUrl.split("be/")[1].substring(0, 11);
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytThumbUrl;
  } else if (imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)) {
    imgTag.src = ytThumbUrl;
  } else {
    imgTag.src = "";
    previewArea.classList.remove("active");
  }

  hiddenInput.value = imgTag.src;
});
