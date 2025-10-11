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
                <h1>Categories</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Categories</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- category-section -->
    <section class="category-section category-page centred mr-0 pt-120 pb-90">
        <div class="auto-container">
            <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <ul class="category-list clearfix">
                    @foreach ($propertyTypes as $types)
                        @php
                            $proprty_count = App\Models\Property::where('ptype_id', $types->id)->get();
                        @endphp
                        <li>
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="{{ $types->icon }}"></i></div>
                                    <h5><a
                                            href="{{ route('property.type.category', $types->id) }}">{{ $types->type_name }}</a>
                                    </h5>
                                    <span>{{ count($proprty_count) }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- category-section end -->


    <!-- cta-section -->
    <section class="cta-section alternate-2 centred" style="background-image: url(assets/images/background/cta-1.jpg);">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="text">
                    <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
                </div>
                <div class="btn-box">
                    <a href="property-details.html" class="theme-btn btn-three">Rent Properties</a>
                    <a href="index.html" class="theme-btn btn-one">Buy Properties</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->


    <!-- feature-section -->
    <section class="feature-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Latest Property</h5>
                <h2>Recent Properties</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore
                    magna aliqua enim.</p>
            </div>
            <div class="row clearfix">
                @foreach ($property as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset($item->thumbnail) }}" alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">{{ $item->type->type_name }}</span>
                                </div>

                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if ($item->agent_id == null)
                                                <figure class="author-thumb"><img
                                                        src="{{ url('application/public/upload/no_image.jpg') }}"
                                                        alt=""></figure>
                                                <h6>Admin</h6>
                                            @else
                                                <figure class="author-thumb"><img
                                                        src="{{ !empty($item->agent->image) ? url('application/public/upload/agent/' . @$item->agent->image) : url('application/public/upload/no_image.jpg') }}"
                                                        alt=""></figure>
                                                <h6>{{ $item->agent->name }}</h6>
                                            @endif

                                        </div>
                                        <div class="buy-btn pull-right"><a
                                                href="{{ route('property.details', ['slug' => $item->slug]) }}">{{ $item->property_status }}</a>
                                        </div>
                                    </div>
                                    <div class="title-text">
                                        <h4><a
                                                href="{{ route('property.details', ['slug' => $item->slug]) }}">{{ \Illuminate\Support\Str::limit($item->name, 20) }}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>${{ $item->lower_price }}.00</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}"
                                                    onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                            <li><a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}"
                                                    onclick="addToWishList(this.id)"><i class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>{{ $item->short_desc }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                        <li><i class="icon-15"></i>{{ $item->bathrooms }} Baths</li>
                                        <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a href="{{ route('property.details', ['slug' => $item->slug]) }}"
                                            class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- feature-section end -->
@endsection
