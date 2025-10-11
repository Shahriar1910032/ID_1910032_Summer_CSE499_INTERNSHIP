@extends('templates.layouts.frontend')
@section('master')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1"
                style="background-image: url({{ asset('application/public/frontend/assets/images/shape/shape-9.png
                                                                                                                                                                                                        ') }});">
            </div>
            <div class="pattern-2"
                style="background-image: url({{ asset('application/public/frontend//assets/images/shape/shape-10.png
                                                                                                                                                                                                        ') }});">
            </div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{ $property->name }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('templates') }}">Home</a></li>
                    <li>{{ $property->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- property-details -->
    <section class="property-details property-details-one">
        <div class="auto-container">
            <div class="top-details clearfix">
                <div class="left-column pull-left clearfix">
                    <h3>{{ $property->name }}</h3>
                    <div class="author-info clearfix">
                        @if ($property->agent_id == null)
                            <div class="author-box pull-left">
                                <figure class="author-thumb"><img src="{{ url('application/public/upload/no_image.jpg') }}"
                                        alt=""></figure>
                                <h6>Admin</h6>
                            </div>
                        @else
                            <div class="author-box pull-left">
                                <figure class="author-thumb"><img
                                        src="{{ !empty($property->agent->image) ? url('application/public/upload/agent/' . @$property->agent->image) : url('application/public/upload/no_image.jpg') }}"
                                        alt=""></figure>
                                <h6>{{ $property->agent->name }}</h6>
                            </div>
                        @endif

                        <ul class="rating clearfix pull-left">
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-40"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="right-column pull-right clearfix">
                    <div class="price-inner clearfix">
                        <ul class="category clearfix pull-left">
                            <li><a
                                    href="{{ route('property.details', ['slug' => $property->slug]) }}">{{ $property->type->type_name }}</a>
                            </li>
                            <li><a
                                    href="{{ route('property.details', ['slug' => $property->slug]) }}">{{ $property->property_status }}</a>
                            </li>
                        </ul>
                        <div class="price-box pull-right">
                            <h3>${{ $property->lower_price }}</h3>
                        </div>
                    </div>
                    <ul class="other-option pull-right clearfix">
                        <li><a href="property-details.html"><i class="icon-37"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-38"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="property-details-content">
                        <div class="carousel-inner">
                            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                @foreach ($images as $key => $image)
                                    @if ($key == 0)
                                        <figure class="image-box"><img src="{{ asset($property->thumbnail) }}"
                                                alt=""></figure>
                                    @endif

                                    <figure class="image-box"><img src="{{ asset($image->image) }}" alt="">
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                        <div class="discription-box content-widget">
                            <div class="title-box">
                                <h4>Property Description</h4>
                            </div>
                            <div class="text">
                                <p>{{ $property->short_desc }}</p>
                                <p>{!! $property->long_desc !!}</p>
                            </div>
                        </div>
                        <div class="details-box content-widget">
                            <div class="title-box">
                                <h4>Property Details</h4>
                            </div>
                            <ul class="list clearfix">
                                @if ($property->property_code)
                                    <li>Property ID: <span>{{ $property->property_code }}</span></li>
                                @endif
                                @if ($property->bedrooms)
                                    <li>Rooms: <span>{{ $property->bedrooms }}</span></li>
                                @endif
                                @if ($property->garage_size)
                                    <li>Garage Size: <span>{{ $property->garage_size }} Sq Ft</span></li>
                                @endif
                                @if ($property->lower_price)
                                    <li>Property Price: <span>${{ $property->lower_price }}</span></li>
                                @endif

                                <li>Year Built:
                                    <span>{{ \Carbon\Carbon::parse($property->created_at)->format('d F, Y') }}</span>
                                </li>

                                @if ($property->type->type_name)
                                    <li>Property Type: <span>{{ $property->type->type_name }}</span></li>
                                @endif
                                @if ($property->bathrooms)
                                    <li>Bathrooms: <span>{{ $property->bathrooms }}</span></li>
                                @endif
                                @if ($property->property_status)
                                    <li>Property Status: <span>{{ $property->property_status }}</span></li>
                                @endif
                                @if ($property->property_size)
                                    <li>Property Size: <span>{{ $property->property_size }} Sq Ft</span></li>
                                @endif
                                @if ($property->garage)
                                    <li>Garage: <span>{{ $property->garage }}</span></li>
                                @endif
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Amenities</h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach ($amenities as $aminity)
                                    <li>{{ $aminity }}</li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="floorplan-inner content-widget">
                        <div class="title-box">
                            <h4>Floor Plan</h4>
                        </div>
                        <ul class="accordion-box">
                            <li class="accordion block active-block">
                                <div class="acc-btn active">
                                    <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                    <h5>First Floor</h5>
                                </div>
                                <div class="acc-content current">
                                    <div class="content-box">
                                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis iste natus error sit voluptatem accusa dolore mque laudant.</p>
                                        <figure class="image-box">
                                            <img src="assets/images/resource/floor-1.png" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                    <h5>Second Floor</h5>
                                </div>
                                <div class="acc-content">
                                    <div class="content-box">
                                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis iste natus error sit voluptatem accusa dolore mque laudant.</p>
                                        <figure class="image-box">
                                            <img src="assets/images/resource/floor-1.png" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion block">
                                 <div class="acc-btn">
                                    <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                    <h5>Third Floor</h5>
                                </div>
                                <div class="acc-content">
                                    <div class="content-box">
                                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis iste natus error sit voluptatem accusa dolore mque laudant.</p>
                                        <figure class="image-box">
                                            <img src="assets/images/resource/floor-1.png" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                        <div class="location-box content-widget">
                            <div class="title-box">
                                <h4>Location</h4>
                            </div>
                            <ul class="info clearfix">
                                <li><span>Address:</span> {{ $property->address }}</li>
                                {{-- <li><span>Country:</span> United State</li> --}}
                                <li><span>State/county:</span> {{ $property->stateName->name }}</li>
                                <li><span>Neighborhood:</span> {{ $property->neightborhood }}</li>
                                <li><span>Zip/Postal Code:</span> {{ $property->postal_code }}</li>
                                <li><span>City:</span> {{ $property->city }}</li>
                            </ul>
                            <div class="google-map-area">
                                <div class="google-map" id="contact-google-map" data-map-lat="40.712776"
                                    data-map-lng="-74.005974" data-icon-path="assets/images/icons/map-marker.png"
                                    data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="12"
                                    data-markers='{
                                    "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                                }'>

                                </div>
                            </div>
                        </div>
                        <div class="nearby-box content-widget">
                            <div class="title-box">
                                <h4>What’s Nearby?</h4>
                            </div>
                            <div class="inner-box">
                                <div class="single-item">
                                    <div class="icon-box"><i class="fas fa-book-reader"></i></div>
                                    <div class="inner">
                                        <h5>Places:</h5>
                                        @foreach ($facilities as $facility)
                                            <div class="box clearfix">
                                                <div class="text pull-left">
                                                    @if ($facility->facility_name)
                                                        <h6>{{ $facility->facility_name }} <span>(
                                                                {{ $facility->distance }} km)</span></h6>
                                                    @endif
                                                </div>
                                                <ul class="rating pull-right clearfix">
                                                    @if ($facility->facility_name)
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-39"></i></li>
                                                        <li><i class="icon-40"></i></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="statistics-box content-widget">
                            <div class="title-box">
                                <h4>Property Video</h4>
                            </div>
                            <figure class="image-box">
                                <iframe width="700" height="400" src="{{ $property->video }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </figure>
                        </div>
                        <div class="schedule-box content-widget">
                            <div class="title-box">
                                <h4>Schedule A Tour</h4>
                            </div>
                            <div class="form-inner">
                                <form action="property-details.html" method="post">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <i class="far fa-calendar-alt"></i>
                                                <input type="text" name="date" placeholder="Tour Date"
                                                    id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <i class="far fa-clock"></i>
                                                <input type="text" name="time" placeholder="Any Time">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Your Name"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Your Email"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <input type="tel" name="phone" placeholder="Your Phone"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <textarea name="message" placeholder="Your message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group message-btn">
                                                <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="property-sidebar default-sidebar">
                        <div class="author-widget sidebar-widget">
                            <div class="author-box">
                                @if ($property->agent_id == null)
                                    <figure class="author-thumb"><img
                                            src="{{ url('application/public/upload/no_image.jpg') }}" alt="">
                                    </figure>
                                    <div class="inner">
                                        <h4>Admin</h4>
                                        <ul class="info clearfix">
                                            <li><i class="fas fa-map-marker-alt"></i>gffdhgf</li>
                                            <li><i class="fas fa-phone"></i><a href="tel:03030571965">030 3057 1965</a>
                                            </li>
                                        </ul>
                                        <div class="btn-box"><a href="agents-details.html">View Listing</a></div>
                                    </div>
                                @else
                                    <figure class="author-thumb"><img
                                            src="{{ !empty($property->agent->image) ? url('application/public/upload/agent/' . @$property->agent->image) : url('application/public/upload/no_image.jpg') }}"
                                            alt=""></figure>
                                    <div class="inner">
                                        <h4>{{ $property->agent->name }}</h4>
                                        <ul class="info clearfix">
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $property->agent->address }}</li>
                                            <li><i class="fas fa-phone"></i><a
                                                    href="tel:03030571965">{{ $property->agent->phone }}</a>
                                            </li>
                                        </ul>
                                        <div class="btn-box"><a href="agents-details.html">View Listing</a></div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-inner">
                                @auth
                                    @php
                                        $id = Auth::user()->id;
                                        $userData = App\Models\User::find($id);
                                    @endphp

                                    <form action="{{ route('property.message') }}" method="post" class="default-form">
                                        @csrf

                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        @if ($property->agent_id == null)
                                            <input type="hidden" name="agent_id" value="">
                                        @else
                                            <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                                        @endif

                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your name"
                                                value="{{ $userData->name }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email"
                                                value="{{ $userData->email }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="Phone"
                                                value="{{ $userData->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Message</button>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('property.message') }}" method="post" class="default-form">
                                        @csrf

                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        @if ($property->agent_id == null)
                                            <input type="hidden" name="agent_id" value="">
                                        @else
                                            <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                                        @endif
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="Phone" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Message</button>
                                        </div>
                                    </form>
                                @endauth
                            </div>

                        </div>
                        <div class="calculator-widget sidebar-widget">
                            <div class="calculate-inner">
                                <div class="widget-title">
                                    <h4>Mortgage Calculator</h4>
                                </div>
                                <form method="post" action="mortgage-calculator.html" class="default-form">
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="total_amount" placeholder="Total Amount">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="down_payment" placeholder="Down Payment">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-percent"></i>
                                        <input type="number" name="interest_rate" placeholder="Interest Rate">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-calendar-alt"></i>
                                        <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="Monthly">Monthly</option>
                                                <option value="1">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="similar-content">
                <div class="title">
                    <h4>Similar Properties</h4>
                </div>
                <div class="row clearfix">
                    @foreach ($relatedProperty as $related)
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ asset($related->thumbnail) }}"
                                                alt="">
                                        </figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                        <span class="category">{{ $related->type->type_name }}</span>
                                    </div>
                                    <div class="lower-content">
                                        <div class="author-info clearfix">
                                            <div class="author pull-left">
                                                @if ($related->agent_id == null)
                                                    <figure class="author-thumb"><img
                                                            src="{{ url('application/public/upload/no_image.jpg') }}"
                                                            alt="">
                                                    </figure>
                                                    <h6>Admin</h6>
                                                @else
                                                    <figure class="author-thumb"><img
                                                            src="{{ !empty($related->agent->image) ? url('application/public/upload/agent/' . @$related->agent->image) : url('application/public/upload/no_image.jpg') }}"
                                                            alt="">
                                                    </figure>
                                                    <h6>{{ $related->agent->name }}</h6>
                                                @endif
                                            </div>
                                            <div class="buy-btn pull-right"><a
                                                    href="{{ route('property.details', ['slug' => $related->slug]) }}">{{ $related->property_status }}</a>
                                            </div>
                                        </div>
                                        <div class="title-text">
                                            <h4><a
                                                    href="{{ route('property.details', ['slug' => $related->slug]) }}">{{ \Illuminate\Support\Str::limit($related->name, 20) }}</a>
                                            </h4>
                                        </div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>Start From</h6>
                                                <h4>${{ $related->lower_price }}.00</h4>
                                            </div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a href="{{ route('property.details', ['slug' => $related->slug]) }}"><i
                                                            class="icon-12"></i></a></li>
                                                <li><a aria-label="Add To Wishlist" class="action-btn"
                                                        id="{{ $related->id }}" onclick="addToWishList(this.id)"><i
                                                            class="icon-13"></i></a></li>
                                            </ul>
                                        </div>
                                        <p>{{ $related->short_desc }}</p>
                                        <ul class="more-details clearfix">
                                            <li><i class="icon-14"></i>{{ $related->bedrooms }} Beds</li>
                                            <li><i class="icon-15"></i>{{ $related->bathrooms }} Baths</li>
                                            <li><i class="icon-16"></i>{{ $related->property_size }} Sq Ft</li>
                                        </ul>
                                        <div class="btn-box"><a
                                                href="{{ route('property.details', ['slug' => $related->slug]) }}"
                                                class="theme-btn btn-two">See
                                                Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- property-details end -->


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
