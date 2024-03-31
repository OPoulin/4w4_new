let indexImage = 1;
montrerImage(indexImage);

// Next/previous controls
function rajouterImage(n) {
  montrerImage(indexImage += n);
}

// Thumbnail image controls
function imageActuelle(n) {
  montrerImage(indexImage = n);
}

function montrerImage(n) {
  let i;
  let images = document.getElementsByClassName("images__slideshow");
  let points = document.getElementsByClassName("point");
  if (n > images__slideshow.length) {indexImage = 1}
  if (n < 1) {indexImage = images__slideshow.length}
  for (i = 0; i < images__slideshow.length; i++) {
    images__slideshow[i].style.display = "none";
  }
  for (i = 0; i < points.length; i++) {
    points[i].className = points[i].className.replace(" active", "");
  }
  images__slideshow[indexImage-1].style.display = "block";
  points[indexImage-1].className += " active";
}