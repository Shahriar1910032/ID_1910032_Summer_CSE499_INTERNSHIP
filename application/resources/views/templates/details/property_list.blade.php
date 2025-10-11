@extends('templates.layouts.frontend')
@section('master')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Property Grid</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('templates') }}">Home</a></li>
                    <li>Property Grid</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    @php
        $states = App\Models\State::latest()->get();
        $property_type = App\Models\PropertyType::latest()->get();
    @endphp

    <!-- property-page-section -->
    <section class="property-page-section property-grid">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar property-sidebar">
                        <div class="filter-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Property</h5>
                            </div>
                            <div class="widget-content">
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="All Type">All Type</option>
                                        <option value="1">Villa</option>
                                        <option value="2">Commercial</option>
                                        <option value="3">Residential</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="Select Location">Select Location</option>
                                        <option value="1">New York</option>
                                        <option value="2">California</option>
                                        <option value="3">London</option>
                                        <option value="4">Maxico</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="This Area Only">This Area Only</option>
                                        <option value="1">New York</option>
                                        <option value="2">California</option>
                                        <option value="3">London</option>
                                        <option value="4">Maxico</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="All Type">Max Rooms</option>
                                        <option value="1">2+ Rooms</option>
                                        <option value="2">3+ Rooms</option>
                                        <option value="3">4+ Rooms</option>
                                        <option value="4">5+ Rooms</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="Most Popular">Most Popular</option>
                                        <option value="1">Villa</option>
                                        <option value="2">Commercial</option>
                                        <option value="3">Residential</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="All Type">Select Floor</option>
                                        <option value="1">2x Floor</option>
                                        <option value="2">3x Floor</option>
                                        <option value="3">4x Floor</option>
                                    </select>
                                </div>
                                <div class="filter-btn">
                                    <button type="submit" class="theme-btn btn-one"><i
                                            class="fas fa-filter"></i>&nbsp;Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="price-filter sidebar-widget">
                            <div class="widget-title">
                                <h5>Select Price Range</h5>
                            </div>
                            <div class="range-slider clearfix">
                                <div class="clearfix">
                                    <div class="input">
                                        <input type="text" class="property-amount" name="field-name" readonly="">
                                    </div>
                                </div>
                                <div class="price-range-slider"></div>
                            </div>
                        </div>
                        <div class="category-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Status Of Property</h5>
                            </div>
                            <ul class="category-list clearfix">
                                <li><a href="property-details.html">For Rent <span>(200)</span></a></li>
                                <li><a href="property-details.html">For Sale <span>(700)</span></a></li>
                            </ul>
                        </div>
                        <div class="category-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Amenities</h5>
                            </div>
                            <ul class="category-list clearfix">
                                <li><a href="property-details.html">Air Conditioning <span>(17)</span></a></li>
                                <li><a href="property-details.html">Central Heating <span>(4)</span></a></li>
                                <li><a href="property-details.html">Cleaning Service <span>(12)</span></a></li>
                                <li><a href="property-details.html">Dining Room <span>(8)</span></a></li>
                                <li><a href="property-details.html">Dishwasher <span>(5)</span></a></li>
                                <li><a href="property-details.html">Dishwasher <span>(2)</span></a></li>
                                <li><a href="property-details.html">Family Room <span>(19)</span></a></li>
                                <li><a href="property-details.html">Onsite Parking <span>(11)</span></a></li>
                                <li><a href="property-details.html">Fireplace <span>(7)</span></a></li>
                                <li><a href="property-details.html">Hardwood Flows <span>(9)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="property-content-side">
                        <div class="item-shorting clearfix">
                            <div class="left-column pull-left">
                                <h5>Search Reasults: <span>Showing 1-5 of 20 Listings</span></h5>
                            </div>
                            <div class="right-column pull-right clearfix">
                                <div class="short-box clearfix">
                                    <div class="select-box">
                                        <select class="wide">
                                            <option data-display="Sort by: Newest">Sort by: Newest</option>
                                            <option value="1">New Arrival</option>
                                            <option value="2">Top Rated</option>
                                            <option value="3">Offer Place</option>
                                            <option value="4">Most Place</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="short-menu clearfix">
                                    <button class="list-view"><i class="icon-35"></i></button>
                                    <button class="grid-view on"><i class="icon-36"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper grid">
                            <div class="deals-list-content list-item">
                                {{-- <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/deals-3.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>$30,000.00</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="assets/images/feature/author-1.jpg" alt="">
                                                        <span>Michael Bean</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor
                                                incididunt labore.</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>3 Beds</li>
                                                <li><i class="icon-15"></i>2 Baths</li>
                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="property-details.html"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/deals-4.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Contemporary Apartment</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>$20,000.00</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="assets/images/feature/author-1.jpg" alt="">
                                                        <span>Michael Bean</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor
                                                incididunt labore.</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>3 Beds</li>
                                                <li><i class="icon-15"></i>2 Baths</li>
                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="property-details.html"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/deals-5.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Luxury Villa With Pool</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>$35,000.00</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="assets/images/feature/author-1.jpg" alt="">
                                                        <span>Michael Bean</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor
                                                incididunt labore.</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>3 Beds</li>
                                                <li><i class="icon-15"></i>2 Baths</li>
                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="property-details.html"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/deals-6.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Home in Merrick Way</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>$45,000.00</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="assets/images/feature/author-1.jpg" alt="">
                                                        <span>Michael Bean</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor
                                                incididunt labore.</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>3 Beds</li>
                                                <li><i class="icon-15"></i>2 Baths</li>
                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="property-details.html"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/deals-7.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Apartment in Glasgow</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>$40,000.00</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="assets/images/feature/author-1.jpg" alt="">
                                                        <span>Michael Bean</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor
                                                incididunt labore.</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>3 Beds</li>
                                                <li><i class="icon-15"></i>2 Baths</li>
                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="property-details.html"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="deals-grid-content grid-item">
                                <div class="row clearfix">
                                    @foreach ($property as $data)
                                        <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                            <div class="feature-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="{{ asset($data->thumbnail) }}"
                                                                alt="">
                                                        </figure>
                                                        <div class="batch"><i class="icon-11"></i></div>
                                                        @if ($data->featured == 1)
                                                            <span class="category">Featured</span>
                                                        @else
                                                            <span class="category">New</span>
                                                        @endif
                                                    </div>
                                                    <div class="lower-content">
                                                        <div class="author-info clearfix">
                                                            <div class="author pull-left">
                                                                <figure class="author-thumb"><img
                                                                        src="assets/images/feature/author-1.jpg"
                                                                        alt=""></figure>
                                                                <h6>Michael Bean</h6>
                                                            </div>
                                                            <div class="buy-btn pull-right"><a
                                                                    href="property-details.html">For Buy</a></div>
                                                        </div>
                                                        <div class="title-text">
                                                            <h4><a href="property-details.html">Villa on Grand Avenue</a>
                                                            </h4>
                                                        </div>
                                                        <div class="price-box clearfix">
                                                            <div class="price-info pull-left">
                                                                <h6>Start From</h6>
                                                                <h4>$30,000.00</h4>
                                                            </div>
                                                            <ul class="other-option pull-right clearfix">
                                                                <li><a href="property-details.html"><i
                                                                            class="icon-12"></i></a></li>
                                                                <li><a href="property-details.html"><i
                                                                            class="icon-13"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                        <ul class="more-details clearfix">
                                                            <li><i class="icon-14"></i>3 Beds</li>
                                                            <li><i class="icon-15"></i>2 Baths</li>
                                                            <li><i class="icon-16"></i>600 Sq Ft</li>
                                                        </ul>
                                                        <div class="btn-box"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="pagination-wrapper">
                            {{ $property->links('vendor.pagination.custom') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- property-page-section end -->
@endsection
