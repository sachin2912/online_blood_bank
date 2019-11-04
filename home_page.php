
<head>
    <link rel="stylesheet" type="text/css" href="css/home_page_file.css"/>
</head>
<div id="section-1" class="section">
    
    <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <img src="img/4.png" width=100%>
            <div class="text">Our Initiative</div>
        </div>

        <div class="mySlides fade">
            <img src="img/slide2.png" width=100%;>
            
        </div>

        <div class="mySlides fade">
            <img src="img/slide3.jpg" width=100%>
            
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<div id="section-2" class="section">
    <h2 style="text-align: center;">Why to group Blood?</h2>
    <div class="left-section">
        <img src="img/donor-chart.jpg">
    </div>
    <div class="right-section">
        <p>
        The grouping is very important when it comes to having a blood transfusion. 
        If blood is given to a patient that has a blood type that is incompatible 
        with the blood type of the blood that the patient receives, it can cause 
        intravenous clumping in the patient’s blood which can be fatal. 
        The patient’s body can start producing antibodies that attack the 
        antigens on the blood cells in the blood that was given to the patient. 
        For example, a patient who is blood group B has naturally occurring Anti-A 
        antibodies in the blood. If this (blood group B) patient receives blood group A blood,
         the Anti-A antibodies in the blood of the patient will cause the blood group A blood cells
        to clump intravenously which is life threatening. Similarly, a patient who is 
        blood group A has naturally occurring Anti-B antibodies in the blood. 
        If this (blood group A) patient receives blood group B blood, the Anti-B antibodies 
        in the blood of the patient will cause the blood group B blood cells to clump intravenously 
        which is life threatening. Blood group O can be given safely to any other blood group 
        is there are no naturally occurring antibodies in the blood of someone who is blood group O. 
        Considering that a person can be either blood group A, B, AB or O and is either blood 
        group RhD positive (also denoted as +) or RhD negative (also denoted as -), 
        this means that a person can be one of eight blood groups: A+ (A RhD positive), 
        A- (A RhD negative), B+, B-, AB+, AB-, O+, O-. The rarest blood groups amongst the 
        population that donate blood in the UK are AB-, whereas the most common are O+. 
        People who are blood group RhD positive, can be given either RhD positive or RhD 
        negative blood, but people with RhD negative blood can only receive RhD negative blood.
        </p>
    </div>
</div>