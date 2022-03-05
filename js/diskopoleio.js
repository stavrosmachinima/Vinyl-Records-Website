var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  // pairnei thn triada pou antistoixeia sta slides
  var slides = document.getElementsByClassName("mySlides");
  // pairnei thn triada pou antistoixeia gia ta dots
  var dots = document.getElementsByClassName("dot");
  // an h selida pou paei na mpei einai megalytero tou 3 tote mpes pali sthn 1h
  if (n > slides.length) {slideIndex = 1}
  // an h selida pou paei na mpei einai mikroterh tou 1, tote ananewse to slide iindex sou gia na dei3ei oti exeis 3
  if (n < 1) {slideIndex = slides.length}
  // gia ka8e triada kane to display none, wste na mhn fainontai ta stoixeia pou den 8eloume
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  // kane to idio kai gia ta dots
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  // gia ka8e emfanisimo slide kanto block.
  slides[slideIndex-1].style.display = "block";
  // gia ka8e emfanisimo slide kanto active
  dots[slideIndex-1].className += " active";
}

function getValue(){
  // edw pairnei to value apo to url kai to metaferei sto username pou den fainetai
  // gia na to parei meta kai na to dwsei stis alles formes
  var username=window.location.href;
  var split=username.split("?")[1];
  document.getElementById('username').value=split;
}
