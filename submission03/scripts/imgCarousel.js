// imgCarousel.js

function carousel()
{
  var i;
  var images = document.getElementsByClassName("productImages");
  var labels = document.getElementsByClassName("productLabels");
  for (i = 0; i < images.length; i++)
  {
    images[i].style.display = "none";
    labels[i].style.display = "none";
  }

  index++;
  if (index >= images.length) {index = 0}
  images[index].style.display = "block";
  labels[index].style.display = "block";
  setTimeout(carousel, 3000);
}

var index = 0;
