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
                <h1>Property List</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('templates') }}">Home</a></li>
                    <li>Property List</li>
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
    <section class="property-page-section property-list">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar property-sidebar">
                        <div class="filter-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Property</h5>
                            </div>
                            <form action="{{ route('property.search') }}" method="post" class="search-form">
                                @csrf

                                <div class="widget-content">
                                    <div class="select-box">
                                        <select class="wide" name="property_status">
                                            <option data-display="All Type">All Status</option>
                                            <option value="rent">Rent</option>
                                            <option value="buy">Buy</option>
                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select class="wide" name="property_type">
                                            <option data-display="Property Type" selected="" disabled="">Property Type
                                            </option>
                                            @foreach ($property_type as $type)
                                                <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select class="wide" name="state">
                                            <option data-display="This Area Only" selected="" disabled="">Select State
                                            </option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->name }}">{{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select class="wide" name="bedrooms">
                                            <option data-display="Rooms">Max Rooms</option>
                                            <option value="1">1 Rooms</option>
                                            <option value="2">2 Rooms</option>
                                            <option value="3">3 Rooms</option>
                                            <option value="4">4 Rooms</option>
                                            <option value="4">5 Rooms</option>
                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select class="wide" name="bathrooms">
                                            <option data-display="BathRooms">Max BathRoom</option>
                                            <option value="1">1 BathRoom</option>
                                            <option value="2">2 BathRoom</option>
                                            <option value="3">3 BathRoom</option>
                                            <option value="4">4 BathRoom</option>
                                            <option value="4">5 BathRoom</option>
                                        </select>
                                    </div>
                                    <div class="filter-btn">
                                        <button type="submit" class="theme-btn btn-one"><i
                                                class="fas fa-filter"></i>&nbsp;Filter</button>
                                    </div>
                            </form>
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
                            <li><a href="{{ route('all.rent.property') }}">For Rent
                                    <span>({{ count($rentProperty) }})</span></a></li>
                            <li><a href="{{ route('all.buy.property') }}">For Sale
                                    <span>({{ count($buyProperty) }})</span></a>
                            </li>
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
                            <h5>Search Reasults: <span>Showing {{ count($rentProperty) }} Listings</span></h5>
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
                                <button class="list-view on"><i class="icon-35"></i></button>
                                <button class="grid-view"><i class="icon-36"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper list">
                        <div class="deals-list-content list-item">


                            @foreach ($rentProperty as $item)
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="{{ asset($item->thumbnail) }}"
                                                    alt="" style="width: 300px; height:350px"></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            @if ($item->featured == 1)
                                                <span class="category">Featured</span>
                                            @else
                                                <span class="category">New</span>
                                            @endif
                                            <div class="buy-btn"><a
                                                    href="{{ route('property.details', ['slug' => $item->slug]) }}">{{ $item->property_status }}</a>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a
                                                        href="{{ route('property.details', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                                </h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>${{ $item->lower_price }}.00</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    @if ($item->agent_id == null)
                                                        <figure class="author-thumb"><img
                                                                src="{{ url('application/public/upload/no_image.jpg') }}"
                                                                alt=""></figure>
                                                        <h6>Admin</h6>
                                                    @else
                                                        <figure class="author-thumb"><img
                                                                src="{{ !empty($item->agent->image) ? url('application/public/upload/agent/' . @$item->agent->image) : url('application/public/upload/no_image.jpg') }}"
                                                                alt=""></figure>
                                                        <h6>{{ $item->agent->name ??'' }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                            <p>{{ $item->short_desc }}</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                                <li><i class="icon-15"></i>{{ $item->bathrooms }} Baths</li>
                                                <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a
                                                        href="{{ route('property.details', ['slug' => $item->slug]) }}"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a aria-label="Compare" class="action-btn"
                                                            id="{{ $item->id }}" onclick="addToCompare(this.id)"><i
                                                                class="icon-12"></i></a></li>
                                                    <li><a aria-label="Add To Wishlist" class="action-btn"
                                                            id="{{ $item->id }}" onclick="addToWishList(this.id)"><i
                                                                class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="deals-grid-content grid-item">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="assets/images/feature/feature-1.jpg"
                                                        alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img
                                                                src="assets/images/feature/author-1.jpg" alt="">
                                                        </figure>
                                                        <h6>Michael Bean</h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="property-details.html">For
                                                            Buy</a></div>
                                                </div>
                                                <div class="title-text">
                                                    <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>$30,000.00</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li><a href="property-details.html"><i class="icon-12"></i></a>
                                                        </li>
                                                        <li><a href="property-details.html"><i class="icon-13"></i></a>
                                                        </li>
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
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="assets/images/feature/feature-2.jpg"
                                                        alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img
                                                                src="assets/images/feature/author-2.jpg" alt="">
                                                        </figure>
                                                        <h6>Robert Niro</h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="property-details.html">For
                                                            Rent</a></div>
                                                </div>
                                                <div class="title-text">
                                                    <h4><a href="property-details.html">Contemporary Apartment</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>$45,000.00</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li><a href="property-details.html"><i class="icon-12"></i></a>
                                                        </li>
                                                        <li><a href="property-details.html"><i class="icon-13"></i></a>
                                                        </li>
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
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="assets/images/feature/feature-3.jpg"
                                                        alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img
                                                                src="assets/images/feature/author-3.jpg" alt="">
                                                        </figure>
                                                        <h6>Keira Mel</h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="property-details.html">Sold
                                                            Out</a></div>
                                                </div>
                                                <div class="title-text">
                                                    <h4><a href="property-details.html">Luxury Villa With Pool</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>$63,000.00</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li><a href="property-details.html"><i class="icon-12"></i></a>
                                                        </li>
                                                        <li><a href="property-details.html"><i class="icon-13"></i></a>
                                                        </li>
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
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="assets/images/feature/feature-4.jpg"
                                                        alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img
                                                                src="assets/images/feature/author-1.jpg" alt="">
                                                        </figure>
                                                        <h6>Michael Bean</h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="property-details.html">For
                                                            Buy</a></div>
                                                </div>
                                                <div class="title-text">
                                                    <h4><a href="property-details.html">Home in Merrick Way</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>$30,000.00</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li><a href="property-details.html"><i class="icon-12"></i></a>
                                                        </li>
                                                        <li><a href="property-details.html"><i class="icon-13"></i></a>
                                                        </li>
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
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="assets/images/feature/feature-5.jpg"
                                                        alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img
                                                                src="assets/images/feature/author-2.jpg" alt="">
                                                        </figure>
                                                        <h6>Robert Niro</h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="property-details.html">For
                                                            Rent</a></div>
                                                </div>
                                                <div class="title-text">
                                                    <h4><a href="property-details.html">Apartment in Glasgow</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>$45,000.00</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li><a href="property-details.html"><i class="icon-12"></i></a>
                                                        </li>
                                                        <li><a href="property-details.html"><i class="icon-13"></i></a>
                                                        </li>
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
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="assets/images/feature/feature-6.jpg"
                                                        alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img
                                                                src="assets/images/feature/author-3.jpg" alt="">
                                                        </figure>
                                                        <h6>Keira Mel</h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="property-details.html">Sold
                                                            Out</a></div>
                                                </div>
                                                <div class="title-text">
                                                    <h4><a href="property-details.html">Family Home For Sale</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>$63,000.00</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li><a href="property-details.html"><i class="icon-12"></i></a>
                                                        </li>
                                                        <li><a href="property-details.html"><i class="icon-13"></i></a>
                                                        </li>
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
                            </div>
                        </div>
                    </div>
                    <div class="pagination-wrapper">
                        {{ $rentProperty->links('vendor.pagination.custom') }}

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- property-page-section end -->


    <!-- subscribe-section -->
    <section class="subscribe-section bg-color-3">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <span>Subscribe</span>
                        <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <div class="form-inner">
                        <form action="contact.html" method="post" class="subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your email" required="">
                                <button type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->
@endsection
