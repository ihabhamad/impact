@extends('themes.one.master.master')
@section('content')
<!-- HERO IMAGE -->
<section class="gl-hero-img-wrapper">
    <div class="container">
        <div class="row">
            <div class="gl-elements-content-wrapper">
                <div id="typed-strings">
                    <p>Let’s <span class="gl-color-text">go</span> anywhere</p>
                    <p>Best <span class="gl-color-text">directory</span> themes ever</p>
                    <p>Find The <span class="gl-color-text">Best Places</span> In Your City</p>
                </div>
                <h2 id="gl-slogan" class="gl-hero-text-heading"></h2>
                <p class="gl-hero-text-paragraph">Glimpse theme is providing you the best directory services from good leading companies</p>

                <!-- DIRECTORY FORM -->
                <div class="gl-directory-searchbar gl-bz-directory-searchbar">
                    <form action="#" id="gl-bz-directory-form">
                        <fieldset>
                            <input type="text" name="gl-business-keyword" id="gl-business-keyword" class="gl-directory-input" placeholder="Keywords">
                            <input type="text" name="gl-search-location" id="gl-search-location" class="gl-directory-input" placeholder="Location">
                            <div class="gl-business-category gl-category-dropdown">
                                <select class="gl-category-dropdown-selection">
                                    <option>&nbsp;</option>
                                    <option value="Corp">Corporate</option>
                                    <option value="Pub">Public</option>
                                    <option value="Int">International</option>
                                </select>
                            </div>
                        </fieldset>

                        <button type="submit" class="gl-icon-btn"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
                <!-- END -->

                <div class="gl-scroll-down-wrapper">
                    <a href="#gl-next-section" class="gl-scroll-down"><i class="ion-chevron-down"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HERO IMAGE END -->

<!-- ICON WITH TEXT/SERVICES -->
<section class="gl-service-section-wrapper gl-section-wrapper" id="gl-next-section">
    <div class="container">
        <div class="row">
            <div class="gl-service-we-offer">

                <!-- ICON WITH TEXT -->
                <div class="gl-icon-top-with-text col-md-4 col-sm-4 col-xs-12 appear fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="gl-icon-wrapper">
                        <img src="images/fingerprint-icon.png" alt="Trusted">
                    </div>
                    <h3>Trusted Service</h3>
                    <p>On the other hand, we denounce great deal come indignation and dislike</p>
                </div>
                <!-- END -->

                <!-- ICON WITH TEXT -->
                <div class="gl-icon-top-with-text col-md-4 col-sm-4 col-xs-12 appear fadeIn" data-wow-duration="1s" data-wow-delay=".5s">
                    <div class="gl-icon-wrapper">
                        <img src="images/shield-icon.png" alt="Quality">
                    </div>
                    <h3>Quality Assured</h3>
                    <p>On the other hand, we denounce great deal come indignation and dislike</p>
                </div>
                <!-- END -->

                <!-- ICON WITH TEXT -->
                <div class="gl-icon-top-with-text col-md-4 col-sm-4 col-xs-12 appear fadeIn" data-wow-duration="1s" data-wow-delay=".7s">
                    <div class="gl-icon-wrapper">
                        <img src="images/location-pin.png" alt="Location">
                    </div>
                    <h3>Easy Location</h3>
                    <p>On the other hand, we denounce great deal come indignation and dislike</p>
                </div>
            </div>
            <!-- END -->

        </div>
    </div>
</section>
<!-- ICON WITH TEXT/SERVICES END -->

<!-- WHAT YOU NEED SECTION -->
<section class="gl-what-you-need-section gl-section-wrapper">
    <div class="container">
        <div class="row">
            <!-- SECTION HEADINGS -->
            <div class="gl-section-headings">
                <h1>What you need ?</h1>
                <p>Checkout and enjoy the biggest unlimited possiblities</p>
            </div>
            <!-- END -->

            <div class="gl-listing-categories-wrapper">
                <!-- CATEGORY ITEM -->
                <div class="gl-listing-cat-item gl-dbl-width gl-tour-travel-cat">
                    <picture>
                        <source media="(min-width: 768px)" srcset=images/business-img-11-lg.jpg>
                        <img alt="Category Image" srcset=images/business-img-11.jpg>
                    </picture>

                    <a href="#" class="gl-img-overlay-effect">
                        <span class="gl-cat-title">Tour &amp; Travel</span>
                    </a>
                </div>
                <!-- END -->

                <!-- CATEGORY ITEM -->
                <div class="gl-listing-cat-item gl-hangout-cat">
                    <picture>
                        <source media="(min-width: 768px)" srcset=images/category-img-2-lg.jpg>
                        <img alt="Category Image" srcset=images/category-img-2.jpg>
                    </picture>

                    <a href="#" class="gl-img-overlay-effect">
                        <span class="gl-cat-title">Hangout</span>
                    </a>
                </div>
                <!-- END -->

                <!-- CATEGORY ITEM -->
                <div class="gl-listing-cat-item gl-dbl-height gl-fashion-cat">
                    <picture>
                        <source media="(min-width: 480px)" srcset=images/category-img-3-lg.jpg>
                        <img alt="Category Image" srcset=images/category-img-3.jpg>
                    </picture>

                    <a href="#" class="gl-img-overlay-effect">
                        <span class="gl-cat-title">Fashion</span>
                    </a>
                </div>
                <!-- END -->

                <!-- CATEGORY ITEM -->
                <div class="gl-listing-cat-item gl-food-cafe-cat">
                    <picture>
                        <source media="(min-width: 480px)" srcset=images/category-img-4-lg.jpg>
                        <img alt="Category Image" srcset=images/category-img-4.jpg>
                    </picture>

                    <a href="#" class="gl-img-overlay-effect">
                        <span class="gl-cat-title">Entertainment</span>
                    </a>
                </div>
                <!-- END -->

                <!-- CATEGORY ITEM -->
                <div class="gl-listing-cat-item gl-dbl-width gl-office-cat">
                    <picture>
                        <source media="(min-width: 480px)" srcset=images/category-img-5.jpg>
                        <img alt="Category Image" srcset=images/category-img-5.jpg>
                    </picture>

                    <a href="#" class="gl-img-overlay-effect">
                        <span class="gl-cat-title">Office</span>
                    </a>
                </div>
                <!-- END -->
            </div>

        </div>
    </div>
</section>
<!-- WHAT YOU NEED SECTION END -->


<!-- FEATURED LISTINGS -->
<section class="gl-feat-listing-section gl-section-wrapper">
    <div class="container">
        <div class="row">
            <!-- SECTION HEADINGS -->
            <div class="gl-section-headings">
                <h1>Featured Listing</h1>
                <p>Checkout and enjoy the biggest unlimited possiblities</p>
            </div>
            <!-- END -->

            <!-- WRAPPER -->
            <div class="gl-featured-listing-wrapper">
                <!-- FEATURED ITEMS -->
                <div class="gl-featured-items col-md-4 col-sm-4 col-xs-12 appear fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="gl-feat-items-img-wrapper">

                        <picture>
                            <source media="(min-width: 768px)" srcset=images/featured-listing-1-lg.jpg>
                            <img alt="Featured Listing" srcset=images/featured-listing-1.jpg>
                        </picture>
                    </div>

                    <div class="gl-feat-item-details">
            <span class="gl-item-rating">
              <i class="ion-android-star-outline"></i>
              4.5
            </span>
                        <h3>
                            <a href="#">Office Rent</a>
                        </h3>
                        <div class="gl-item-location">
                            <i class="ion-ios-location-outline"></i>
                            <span>Road 3, West Portland, USA</span>
                        </div>
                    </div>
                </div>
                <!-- END -->

                <!-- FEATURED ITEMS -->
                <div class="gl-featured-items col-md-4 col-sm-4 col-xs-12 appear fadeIn" data-wow-duration="1s" data-wow-delay=".5s">
                    <div class="gl-feat-items-img-wrapper">
                        <picture>
                            <source media="(min-width: 768px)" srcset=images/featured-listing-2-lg.jpg><img alt="Featured Listing" srcset=images/featured-listing-2.jpg>
                        </picture>
                    </div>

                    <div class="gl-feat-item-details">
            <span class="gl-item-rating">
              <i class="ion-android-star-outline"></i>
              4.5
            </span>
                        <h3>
                            <a href="#">Lake Heaven</a>
                        </h3>
                        <div class="gl-item-location">
                            <i class="ion-ios-location-outline"></i>
                            <span>Road 3, West Portland, USA</span>
                        </div>
                    </div>
                </div>
                <!-- END -->

                <!-- FEATURED ITEMS -->
                <div class="gl-featured-items col-md-4 col-sm-4 col-xs-12 appear fadeIn" data-wow-duration="1s" data-wow-delay=".7s">
                    <div class="gl-feat-items-img-wrapper">
                        <picture>
                            <source media="(min-width: 768px)" srcset=images/featured-listing-3-lg.jpg><img alt="Featured Listing" srcset=images/featured-listing-3.jpg>
                        </picture>
                    </div>

                    <div class="gl-feat-item-details">
            <span class="gl-item-rating">
              <i class="ion-android-star-outline"></i>
              4.5
            </span>

                        <h3>
                            <a href="#">Cafe Hapus</a>
                        </h3>
                        <div class="gl-item-location">
                            <i class="ion-ios-location-outline"></i>
                            <span>Road 3, West Portland, USA</span>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
            <!-- END -->

            <!-- MORE BTN -->
            <div class="gl-more-btn-wrapper">
                <a href="#" class="gl-more-btn gl-btn">More</a>
            </div>
            <!-- END -->
        </div>
    </div>
</section>
<!-- FEATURED LISTINGS END -->


<!-- HOW IT WORKS -->
<section class="gl-how-it-works-section gl-custom-section gl-section-wrapper">
    <div class="container">
        <div class="row">
            <div class="gl-custom-sec-content">
                <h1>How it works ?</h1>
                <p>On the other hand, we denounce with righteous indignation and dislike men  beguiled and demoralized by the charms of pleasure of the moment, blinded belongs to those who fail in their duty through weakness </p>

                <a href="#" class="gl-btn gl-more-btn">More</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="gl-custom-image-wrapper">
                <img src="images/custom-img-1.jpg" alt="Custom Image" class="gl-lazy">
            </div>
        </div>
    </div>
</section>
<!-- HOW IT WORKS END -->


<!-- CTA -->
<section class="gl-cta-section">
    <div class="container">
        <div class="row">
            <div class="gl-cta-content-wrapper">
                <p> Get best glimpse app for mobile and other small <span class="gl-bold-font">devices</span> from playstore </p>
                <ul>
                    <li>
                        <a href="#" class="gl-google-play-btn"></a>
                    </li>
                    <li>
                        <a href="#" class="gl-app-store-btn"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- CTA END -->
    @endsection