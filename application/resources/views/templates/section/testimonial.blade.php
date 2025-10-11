<!-- testimonial-section end -->
@php
    $testimonials = App\Models\Testimonial::latest()->get();
@endphp

<section class="testimonial-section bg-color-1 centred">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
    <div class="auto-container">
        <div class="sec-title">
            <h5>Testimonials</h5>
            <h2>What They Say About Us</h2>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            @foreach ($testimonials as $testimonial)
                <div class="testimonial-block-one">
                    <div class="inner-box">
                        <figure class="thumb-box"><img src="{{ asset($testimonial->image) }}" alt="" style="width: 100px"; height="10px";>
                        </figure>
                        <div class="text">
                            <p>{{ $testimonial->short_desc }}</p>
                        </div>
                        <div class="author-info">
                            <h4>{{ $testimonial->name }}</h4>
                            <span class="designation">{{ $testimonial->desination }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- testimonial-section end -->
