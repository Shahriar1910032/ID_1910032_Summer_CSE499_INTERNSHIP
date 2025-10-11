<!-- feature-section -->
@php
    $property = App\Models\Property::where('status', '1')->where('featured', '1')->limit(3)->get();
@endphp
<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Features</h5>
            <h2>Featured Property</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">
            @foreach ($property as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
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
                                        <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                        <li><a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)"><i class="icon-13"></i></a></li>
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
        <div class="more-btn centred"><a href="{{ route('property.list') }}" class="theme-btn btn-one">View All
                Listing</a></div>
    </div>
</section>
<!-- feature-section end -->
