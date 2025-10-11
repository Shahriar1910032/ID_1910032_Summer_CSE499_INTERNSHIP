<!-- news-section -->
@php
    $blogs = App\Models\Blog::active()->latest()->get();
@endphp
<section class="news-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>News & Article</h5>
            <h2>Stay Update With Realshed</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{ route('blog.details', $blog->slug) }}"><img
                                            src="{{ asset($blog->image) }}" alt=""></a></figure>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <h4><a href="{{ route('blog.details', $blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 50) }}</a></h4>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                   
                                            <figure class="author-thumb"><img
                                                    src="{{ (!empty($blog->user->image)) ? url('upload/admin_image/'.$blog->user->image) : url('application/public/upload/no_image.jpg') }}"
                                                    alt=""></figure>
                                            <h6>{{ $blog['user']['name'] }}</h6>
                                       
                                    </li>
                                    <li>{{ $blog->created_at->format('F d, Y') }}</li>
                                </ul>
                                <div class="text">
                                    <p>{{ \Illuminate\Support\Str::limit($blog->meta_description, 100) }}</p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('blog.details', $blog->slug) }}" class="theme-btn btn-two">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- news-section end -->
