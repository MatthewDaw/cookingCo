<style>
            #jumboCover
          {
            z-index: 1;
            position: absolute;
            top: 70px;
            width: 100%;
            height: 700px;
            background-color: black;
            opacity: .8;
            
          }
        #jumboText
          {
                z-index: 2;
                position: absolute;
                top: 70px;
                width: 100%;
                height: 700px;
          }
        #jumboTextSub
          {
              color: white;
              position: relative;
              top: 150px;
              text-align: center;
              opacity: 1;
              font-weight: 700;
              font-size: 40px;
          }
        #jumboDescrip
          {
              padding: 60px;
              z-index:3;
              box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              width: 60%;
              height: 700px;
              position:relative;
              background-color: white;
              display: inline-block;
              top: -60px;
          }
    
    
        #mainContent
          {
              width: 100%;
              text-align: center;
              height: 1000px;
          }
    
    
        #kitchen
          {
              width: 100%;
              height: 200px;
              background-image: url("kitchen.jpg");
              background-size: 100% 100%;
              z-index: 1;
          }
        #kitchenCover
          {
              position: absolute;
              top: 770px;
              /*background-color: #606359;*/
              width: 100%;
              height: 200px;
              opacity: .8;
              z-index: 2;
          }
          

          
        #whyYouShouldSignUp
            {
                height: 800px;
                text-align: left;
                display: table;
                z-index:1;
                margin-top: 50px;
            }
        #whyLeft
            {
                
            }
        #whyRight
            {
                z-index: 2;
                position: relative;
                height: 800px;
                opacity: .6;
            }
        #whyRightCover
            {
                opacity: 1;
                position:absolute;
                top:-1px;
                z-index: 1;
                height: 50px;
                width:50px;
                background:blue;
                opacity: .5;
            }
        .carousel-item
          {
              background-size: 100% 100%;
          }
        .carpic
          {
              height: 700px;
              width: 100%;
              background-size: cover;
          }
        .carbtn
          {
              width: 150px;
          }
        h1
        {
            font-size: 35px;
            color:#303842;
        }
        h2
          {
              
              color: #8693a2;
          }
        h3
        {
            color:#4c5a6b;
            text-decoration: underline;
            font-size: 25px;
        }
</style>


    <div id='jumboText'>
        <div id="jumboTextSub">
            <p>SAVE TIME AND MONEY</p><p>BY LETTING SOMEONE ELSE DO YOUR COOKING</p>
            <br>
            <div class="row">
                <div class='col-sm'></div><div class='col-sm'></div>
                <div class='col-sm'><a type="button" class="btn btn-success carbtn" id="whyScrollSpy1"  href="#whyYouShouldSignUp">Learn More</a></div>
                <div class='col-sm'><a type="button" class="btn btn-success carbtn" id='addSignUp'>Sign Up</a></div>
                <div class='col-sm'></div><div class='col-sm'></div>
            </div>
            
        </div>
    </div>
<div id='jumboCover'>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">0</li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1">1</li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2">2</li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3">3</li>
  </ol>

    <div class="carousel-inner" id='jumboTron'>
        <div class="carousel-item active">
            <div class="d-block w-100 carpic" id="car1" alt="First slide" style='background-image: url("jumbo1.jpg");'></div>
            <div class='carousel-caption d-none d-md-block'></div>
        </div>
        <div class="carousel-item">
          <div class="d-block w-100 carpic" id="car1" alt="First slide" style='background-image: url("jumbo2.jpg");'></div>
        </div>
        <div class="carousel-item">
          <div class="d-block w-100 carpic" id="car1" alt="First slide" style='background-image: url("jumbo3.jpg");'></div>
        </div>
          <div class="carousel-item">
          <div class="d-block w-100 carpic" id="car1" alt="First slide" style='background-image: url("jumbo4.jpg");'></div>
        </div>
    </div>
</div>


<div id="whyYouShouldSignUp" class="container">
<div class="row">
<div id="whyLeft" class="col">

<h1>Why You Should Sign Up For "name"</h1>
<hr>
<h2>We Can Save You Time And Money</h2>
<hr>

<h3>Earn Money By Not Cooking</h3>
<p>The averae American Cooks 4.3 hours per week. With "name" you can $30-$50 to have all your cooking done. With the time you save you can earn more than that amount of money back, even with minimum wage.</p>

<h3>How Much Is Your Time Worth?</h3>
<p>If you could spend $7 to have one more hour of time with your family would you do it? With "name" you can.</p>
    
<h3>Exchange Food</h3>
<p>Cooking one meal for seven families can be 3 times faster than cooking a different meal for a family every day. With "name" you can only cook one large meal per week and still eat something different every day.</p>
    
</div>
<div id="whyRight" class="col">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
        
    <div class="carousel-inner" id='jumboTron'>
        <div class="carousel-item active">
            <div class="d-block w-100 carpic" id="car1" alt="First slide" style='background-image: url("why3.jpg");'></div>
            <div class='carousel-caption d-none d-md-block'></div>
        </div>
        <div class="carousel-item">
          <div class="d-block w-100 carpic" id="car1" alt="First slide" style='background-image: url("why2.jpg");'></div>
        </div>
        <div class="carousel-item">
          <div class="d-block w-100 carpic" id="car1" alt="First slide" style='background-image: url("why1.jpg");'></div>
        </div>
    </div>
</div> 
  
</div>
   <!--<div id='whyRightCover'>sfsf</div>  -->
    
</div>
</div>
<div id='kitchen'></div>

<div id='kitchenCover'></div>

<div id='mainContent'>

<div id='jumboDescrip'>
<h1>Why You Should Sign Up For "name"</h1>
<hr>
<h2>We Can Save You Time And Money</h2>
<hr>

<h3>Earn Money By Not Cooking</h3>
<p>The averae American Cooks 4.3 hours per week. With "name" you can $30-$50 to have all your cooking done. With the time you save you can earn more than that amount of money back, even with minimum wage.</p>

<h3>How Much Is Your Time Worth?</h3>
<p>If you could spend $7 to have one more hour of time with your family would you do it? With "name" you can.</p>
    
<h3>Exchange Food</h3>
<p>Cooking one meal for seven families can be 3 times faster than cooking a different meal for a family every day. With "name" you can only cook one large meal per week and still eat something different every day.</p>

</div>

</div>

<a class="nav-link" id='scrollSpyLink'  href="#whyYouShouldSignUp">@fat</a>
