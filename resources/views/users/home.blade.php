
@extends('layouts.base')
@section('content')




<!--end-->
<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <ol class="carousel-indicators">
        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel1" data-slide-to="1"></li>
        <li data-target="#myCarousel1" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active"> <img src="{{asset('assets/images/banner.png')}}" style="width:100%; height: 500px" alt="First slide">
            <div class="carousel-caption">
                <h1>vacayhome<br> spa & Resort</h1>
            </div>
        </div>
        <div class="item"> <img src="{{asset('assets/images/banner2.png')}}" style="width:100%; height: 500px" alt="Second slide">
            <div class="carousel-caption">
                <h1>vacayhome<br> spa & Resort</h1>
            </div>
        </div>
        <div class="item"> <img src="{{asset('assets/images/banner3.png')}}" style="width:100%; height: 500px" alt="Third slide">
            <div class="carousel-caption">
                <h1>vacayhome<br> spa & Resort</h1>
            </div>
        </div>

    </div>
    <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> <img src="{{asset('assets/images/icons/left-arrow.png')}}" onmouseover="this.src = {{asset('assets/images/icons/left-arrow-hover.png')}}" onmouseout="this.src = {{asset('assets/images/icons/left-arrow.png')}}" alt="left"></a>
    <a class="right carousel-control" href="#myCarousel1" data-slide="next"><img src="{{('images/icons/right-arrow.png')}}" onmouseover="this.src = {{asset('assets/images/icons/right-arrow-hover.png')}}" onmouseout="this.src = {{asset('assets/images/icons/right-arrow.png')}}" alt="left"></a>

</div>
<style>

  .d-flex {
  padding-left: 90px;
}

.icon-slider {
  display: flex;
  align-items: center;
  overflow: hidden;
  width: 75%;
  margin-right: auto;
}

.icon-list {
  display: flex;
  transition: transform 1s ease-in-out;
  overflow-x: auto;
  white-space: nowrap;
}

.icon-list::-webkit-scrollbar {
  display: none;
}

.icon-item {
  flex: 0 0 10%;
  text-align: center;
  position: relative;
  padding-bottom: 5px;
  cursor: pointer;
  color: grey;
}

.icon-item img,
.icon-item p {
  color: grey;
}

.icon-item img {
  width: 24px;
  height: 24px;
  opacity: 0.5;
  transition: opacity 0.3s ease-in-out, filter 0.3s ease-in-out;
}

.icon-item p {
  font-size: 12px;
  margin-top: 5px;
}

.icon-item::after {
  content: "";
  position: absolute;
  left: 2px;
  bottom: 0;
  width: calc(100% - 4px);
  height: 2px;
  background-color: transparent;
  transition: width 0.3s ease-in-out, background-color 0.3s ease-in-out;
  transform: scaleX(0);
  transform-origin: left;
}

.icon-item:hover::after,
.icon-item:hover p::after {
  background-color: grey;
  transform: scaleX(1);
}

.icon-item.active::after {
  background-color: black;
  transform: scaleX(1);
}

.icon-item:hover img,
.icon-item:hover p {
  color: black;
  opacity: 1;
  filter: brightness(1.2);
}

.icon-item.active img,
.icon-item.active p {
  color: black;
  opacity: 1;
  filter: brightness(1.2);
}

.scroll-btn {
  background-color: white;
  border: 2px solid #c8c8c8;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  margin-top: 7px;
}

.scroll-btn .scroll-icon {
  width: 13px;
  height: 13px;
  fill: currentColor;
}

.control-buttons {
  display: flex;
  align-items: center;
  margin-left: 12px;
  gap: 10px;
  width: 25%;
  justify-content: flex-end;
  margin-bottom: 15px;
}

.filter-button {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 14px 20px;
  border: 1px solid #c8c8c8;
  border-radius: 14px;
  background-color: white;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
  outline: none;
  margin-left: 13px;
}

.filter-button svg {
  width: 24px;
  height: 24px;
  fill: none;
  stroke: currentColor;
}

.filter-button:hover {
  border-color: black;
}

.filter-button:focus {
  box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);
}

.toggle-container {
  display: flex;
  align-items: center;
  gap: 3px;
  padding: 10px 40px;
  border: 1px solid #c8c8c8;
  border-radius: 14px;
  background-color: white;
  cursor: pointer;
  font-size: 12px;
  font-weight: 300;
  transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
  outline: none;
  margin-left: 13px;
  line-height: 1;
}

.toggle-container:hover,
.toggle-container:focus-within {
  border-color: black;
}

.toggle-label {
  font-size: 12px;
  font-weight: 300;
}

.toggle-switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.toggle-switch input {
  display: none;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
  border-radius: 14px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  transition: 0.4s;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 10px;
}

input:checked + .slider {
  background-color: black;
}

input:checked + .slider:before {
  transform: translateX(20px);
  background-color: black;
  color: white;
  content: "✔";
}

</style>


<!--service block--->
<section class="service-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 width-50">
                <div class="service-details text-center">
                    <div class="service-image">
                        <img alt="image" class="img-responsive" src="{{asset('assets/images/icons/wifi.png')}}">
                    </div>
                    <h4><a>free wifi</a></h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 width-50">
                <div class="service-details text-center">
                    <div class="service-image">
                        <img alt="image" class="img-responsive" src="{{asset('assets/images/icons/key.png')}}">
                    </div>
                    <h4><a>room service</a></h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 mt-25">
                <div class="service-details text-center">
                    <div class="service-image">
                        <img alt="image" class="img-responsive" src="{{asset('assets/images/icons/car.png')}}">
                    </div>
                    <h4><a>free parking</a></h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 mt-25">
                <div class="service-details text-center">
                    <div class="service-image">
                        <img alt="image" class="img-responsive" src="{{asset('assets/images/icons/user.png')}}">
                    </div>
                    <h4><a>customer support</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!--gallery block--->
<section class="gallery-block gallery-front">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="gallery-image">
                    <img class="img-responsive" src="{{asset('assets/images/room1.png')}}">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="{{asset('assets/images/room1.png')}}" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a>delux room</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="gallery-image">
                    <img class="img-responsive" src="{{asset('assets/images/room2.png')}}">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="{{asset('assets/images/room2.png')}}" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a>super room</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="gallery-image">
                    <img class="img-responsive" src="{{asset('assets/images/room3.png')}}">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="{{asset('assets/images/room3.png')}}" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a>single room</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="gallery-image">
                    <img class="img-responsive" src="{{asset('assets/images/room4.png')}}">
                    <div class="overlay">
                        <a class="info pop example-image-link img-responsive" href="{{asset('assets/images/room4.png')}}" data-lightbox="example-1"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <p><a>double room</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--offer block-->
<section class="vacation-offer-block">
    <div class="vacation-offer-bgbanner">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="vacation-offer-details">
                        <h1>Your vacation Awaits</h1>
                        <h4>Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit.</h4>
                        <button type="button" class="btn btn-default">Choose a package</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End-->

<!----resort-overview--->
<section class="resort-overview-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 remove-padd-right">
                <div class="side-A">
                    <div class="product-thumb">
                        <div class="image">
                            <a><img src="{{asset('assets/images/category1.png')}}" class="img-responsive" alt="image"></a>
                        </div>
                    </div>
                </div>
                <div class="side-B">
                    <div class="product-desc-side">
                        <h3><a>luxury spa</a></h3>
                        <p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nunc lorem nulla, ornare eu felis luctus non maximus vitae, portt neque. ipsum dolor sit amet, consec adipiscing elit.</p>
                        <div class="links"><a href="single-blog.html">Read more</a></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-6 col-sm-12 col-xs-12 remove-padd-left">
                <div class="side-A">
                    <div class="product-thumb">
                        <div class="image">
                            <a><img alt="image" class="img-responsive" src="{{asset('assets/images/category2.png')}}"></a>
                        </div>
                    </div>
                </div>
                <div class="side-B">
                    <div class="product-desc-side">
                        <h3><a>Beatusish ingl</a></h3>
                        <p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nunc lorem nulla, ornare eu felis luctus non maximus vitae, portt neque. ipsum dolor sit amet, consec adipiscing elit.</p>
                        <div class="links"><a href="single-blog.html">Read more</a></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-6 col-sm-12 col-xs-12 remove-padd-right">
                <div class="side-A">
                    <div class="product-desc-side">
                        <h3><a>luxury room</a></h3>
                        <p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nunc lorem nulla, ornare eu felis luctus non maximus vitae, portt neque. ipsum dolor sit amet, consec adipiscing elit.</p>
                        <div class="links"><a href="single-blog.html">Read more</a></div>
                    </div>
                </div>

                <div class="side-B">
                    <div class="product-thumb">
                        <div class="image txt-rgt">
                            <a class="arrow-left"><img src="{{asset('assets/images/category3.png')}}" class="img-responsive" alt="imaga"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-6 col-sm-12 col-xs-12 remove-padd-left">
                <div class="side-A">
                    <div class="product-desc-side">
                        <h3><a>heaven seanery</a></h3>
                        <p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nunc lorem nulla, ornare eu felis luctus non maximus vitae, portt neque. ipsum dolor sit amet, consec adipiscing elit.</p>
                        <div class="links"><a href="single-blog.html">Read more</a></div>
                    </div>
                </div>

                <div class="side-B">
                    <div class="product-thumb txt-rgt">
                        <div class="image">
                            <a class="arrow-left"><img src="{{asset('assets/images/category4.png')}}" class="img-responsive" alt="imaga"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
</section>

<!-----blog slider----->
<!--blog trainer block-->
<section class="blog-block-slider">
    <div class="blog-block-slider-fix-image">
        <div id="myCarousel2" class="carousel slide" data-ride="carousel">
            <div class="container">
                <!-- Wrapper for slides -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel2" data-slide-to="1"></li>
                    <li data-target="#myCarousel2" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="blog-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only</p>
                        </div>
                        <div class="blog-view-box">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('assets/images/client1.png')}}" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading blog-title">Walter Hucko</h3>
                                    <h5 class="blog-rev">Satisfied Customer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only</p>
                        </div>
                        <div class="blog-view-box">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('assets/images/client2.png')}}" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading blog-title">Jules Boutin</h3>
                                    <h5 class="blog-rev">Satisfied Customer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only</p>
                        </div>
                        <div class="blog-view-box">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('assets/images/client3.png')}}" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading blog-title">Attilio Marzi</h3>
                                    <h5 class="blog-rev">Satisfied Customer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<!---blog block--->
<section class="blog-block">
    <div class="container">
        <div class="row offspace-45">
            <div class="view-set-block">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="event-blog-image">
                        <img alt="image" class="img-responsive" src="{{asset('assets/images/blog1.png')}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 side-in-image">
                    <div class="event-blog-details">
                        <h4><a href="single-blog.html">Lorem ipsum dolor sit amet</a></h4>
                        <h5>Post By Admin <a><i aria-hidden="true" class="fa fa-heart-o fa-lg"></i>Likes</a><a><i aria-hidden="true" class="fa fa-comment-o fa-lg"></i>comments</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornare turpis neque, eu commodo sapien porta sed. Nam ut ante turpis. Nam arcu odio, scelerisque a vehicula vitae, auctor sit amet lectus. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornard hendrerit tortor vulputate id. Vestibulum mauris nibh, luctus non maximus vitae, porttitor eget neque. Donec tristique nunc facilisis, dapibus libero ac</p>
                        <a class="btn btn-default" href="single-blog.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row offspace-45">
            <div class="view-set-block">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="event-blog-image">
                        <img alt="image" class="img-responsive" src="{{asset('assets/images/blog2.png')}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 side-in-image">
                    <div class="event-blog-details">
                        <h4><a href="single-blog.html">Lorem ipsum dolor sit amet</a></h4>
                        <h5>Post By Admin <a><i aria-hidden="true" class="fa fa-heart-o fa-lg"></i>Likes</a><a><i aria-hidden="true" class="fa fa-comment-o fa-lg"></i>comments</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornare turpis neque, eu commodo sapien porta sed. Nam ut ante turpis. Nam arcu odio, scelerisque a vehicula vitae, auctor sit amet lectus. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lorem nulla, ornare eu felis quis, efficitur posuere nulla. Aliquam ac luctus turpis, non faucibus sem. Fusce ornard hendrerit tortor vulputate id. Vestibulum mauris nibh, luctus non maximus vitae, porttitor eget neque. Donec tristique nunc facilisis, dapibus libero ac</p>
                        <a class="btn btn-default" href="single-blog.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const iconList = document.getElementById("icon-list");
        const leftBtn = document.getElementById("left-btn");
        const rightBtn = document.getElementById("right-btn");
        const scrollAmount = 600; // Adjust the scroll amount as needed

        // Scroll functionality for left and right buttons
        if (iconList && leftBtn && rightBtn) {
          leftBtn.addEventListener("click", () => {
            console.log("Left button clicked");
            iconList.scrollBy({ left: -scrollAmount, behavior: "smooth" });
          });

          rightBtn.addEventListener("click", () => {
            console.log("Right button clicked");
            iconList.scrollBy({ left: scrollAmount, behavior: "smooth" });
          });
        } else {
          console.error("Element not found: Ensure the IDs are correct.");
        }

        // Functionality for clicking on icons
        document.querySelectorAll(".icon-item").forEach((item) => {
          item.addEventListener("click", function () {
            // Remove 'active' class from all items
            document
              .querySelectorAll(".icon-item")
              .forEach((el) => el.classList.remove("active"));
            // Add 'active' class to the clicked item
            this.classList.add("active");
          });
        });
      });
</script>
