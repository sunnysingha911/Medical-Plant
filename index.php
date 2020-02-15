<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Home</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>
<body>

<?php
include_once "Interface.html";
include('s2.php');  
//include("sidebar.html");
 ?>
 <h1><font color = white>Home</font></h1>
 <div class = "plantinfo">
<span class="slideshow-container">
<span class="mySlides fade">
  <img src="8.jpg" style="width:100%">
</span>
<span class="mySlides fade">
  <img src="11.jpg" style="width:100%">
</span>
<span class="mySlides fade">
  <img src="7.jpg" style="width:100%">
</span>
</span>
<span style="text-align:center">
	<center>		
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span> 
    </center>
</span>
<br>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
<div class = "article" style="padding:6px;">
  <p>Medicinal plants have been identified and used throughout human history. Plants make many chemical compounds for biological functions, including defence against insects, fungi and herbivorous mammals. Over 12,000 active compounds are known to science. These chemicals work on the human body in exactly the same way as pharmaceutical drugs, so herbal medicines can be beneficial and have harmful side effects just like conventional drugs. However, since a single plant may contain many substances, the effects of taking a plant medicine can be complex.</p>
  <p>Plants have been used as medicines from prehistoric times. The earliest records of herbs are found from the Sumerian civilisation, where hundreds of medicinal plants including opium are listed on clay tablets. The Ebers Papyrus from ancient Egypt describes over 850 plant medicines. Drug research makes use of ethnobotany to search for pharmacologically active substances in nature, and has in this way discovered hundreds of useful compounds. These include the common drugs aspirin, digoxin, quinine, and opium. The compounds found in plants are of many kinds, but most are in four major biochemical classes, the alkaloids, polyphenols, glycosides, and terpenes.</p>
</div> 
</div>
<br>
<?php
include_once "Interfacebottom.html";
 ?>
<!-- <center><font color = white >Copyright@ All Right Reserved</font> </center> -->
</body>
</html>
