
<head>
    <link rel="stylesheet" type="text/css" href="css/home_page_file.css"/>
</head>
<div id="section-1" class="section">
    
    <div class="slideshow-container">

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
function currentSlide(v)
{
    var slide = document.getElementsByClassName("mySlides");
    for (i=0;i<slide.length;i++)
    {
        slide[i].style.display = "none";

    }
    slide[v-1].style.display = "block";
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

<div id="section-3" class="section">
    <h2> Why Is Such Portal Required ? </h2>
    <div id="left-section-3" class="left-section" >
        <img src="img/section_3.jpg">
    </div>
    <div class="right-section">
        <h2> Some article headlines by Media</h2>
        <div id="article_1" class="article_news">
            <a href="https://timesofindia.indiatimes.com/city/mumbai/blood-banks-waste-2-8m-units-in-5-yrs/articleshow/58333394.cms" target="_blank">
                <h3>
                    " Blood banks waste 2.8 million units in 5 years " 
                </h3>
            </a>
        </div>
        <div id="article_2" class="article_news">
            <a href="https://www.indiatoday.in/fyi/story/blood-banks-india-wastage-blood-donors-973478-2017-04-25" target="_blank">
                <h3>
                " Bloodbath: Do you know how much blood India is wasting every day? "
                </h3>
                <h5> In a country that doesn"t believe in donating blood, 
                    Indian blood banks are wasting a tremendous amount of blood every single day.</h5>
            </a>
        </div>
        <div id='article-3' class = 'article_news'>
            <a href='https://timesofindia.indiatimes.com/india/world-blood-donor-day-2019-india-faces-shortage-of-1-95mn-units-of-blood/articleshow/69785128.cms' target='_blank'>
            <h3>"World Blood Donor Day 2019: India faces shortage of 1.95mn units of Blood"</h3>
            </a>
        </div>    

    </div>
</div>                        