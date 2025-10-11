@extends('templates.layouts.frontend')
@section('master')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Blog Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('templates') }}">Home</a></li>
                    <li>{{ $pageTitle }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset($blog->image) }}" alt="">
                                    </figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h3>{{ $blog->title }}</h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img
                                                    src="{{ !empty($blog->user->image) ? url('upload/admin_image/' . $blog->user->image) : url('application/public/upload/no_image.jpg') }}"
                                                    alt=""></figure>
                                            <h5><a href="blog-details.html">{{ $blog['user']['name'] }}</a></h5>
                                        </li>
                                        <li>{{ $blog->created_at->format('F d, Y') }}</li>
                                    </ul>
                                    <div class="text">
                                        <p>{{ $blog->meta_description }}</p>

                                        <p>{!! $blog->description !!}</p>
                                    </div>
                                    <div class="post-tags">
                                        <ul class="tags-list clearfix">
                                            <li>
                                                <h5>Tags:</h5>
                                            </li>
                                            <li><a href="blog-details.html">Real Estate</a></li>
                                            <li><a href="blog-details.html">Interior</a></li>
                                            <li><a href="blog-details.html">Rent Home</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $comment = App\Models\Comment::where('blog_id', $blog->id)
                                ->where('parent_id', null)
                                ->limit(5)
                                ->get();
                        @endphp

                        <div class="comments-area">
                            <div class="group-title">
                                <h4>{{ count($comment) }} Comments</h4>
                            </div>
                            <div class="comment-box">
                                @foreach ($comment as $comm)
                                    <div class="comment">
                                        <figure class="thumb-box">
                                            <img src="{{ !empty($comm->user->image) ? url('upload/admin_image/' . $comm->user->image) : url('application/public/upload/no_image.jpg') }}"
                                                alt="">
                                        </figure>
                                        <div class="comment-inner">
                                            <div class="comment-info clearfix">
                                                <h5>{{ $comm->user->name }}</h5>
                                                <span>{{ $comm->created_at->format('F d, Y') }}</span>
                                            </div>
                                            <div class="text">
                                                {{-- <p>{{ $comm->subject }}</p> --}}
                                                <p>{{ $comm->message }}</p>
                                                <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $reply = App\Models\Comment::where('parent_id', $comm->id)->get();
                                    @endphp
                                    @foreach ($reply as $rep)
                                        <div class="comment replay-comment">
                                            <figure class="thumb-box">
                                                <img src="{{ !empty($rep->user->image) ? url('upload/admin_image/' . $rep->user->image) : url('application/public/upload/no_image.jpg') }}" alt="">
                                            </figure>
                                            <div class="comment-inner">
                                                <div class="comment-info clearfix">
                                                    <h5>{{ $rep->user->name }}</h5>
                                                    <span>{{ $rep->created_at->format('F d, Y') }}</span>
                                                </div>
                                                <div class="text">
                                                    <p>{{ $rep->message }}</p>
                                                    <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>


                        <div class="comments-form-area">
                            <div class="group-title">
                                <h4>Leave a Comment</h4>
                            </div>
                            @auth
                                <form action="{{ route('blog.comment.store') }}" method="post"
                                    class="comment-form default-form">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $blog->id }}">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="subject" placeholder="Subject" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Your message"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p><b>For Add Comment You need to login First <a href="{{ route('login') }}">Login Here</a></b>
                                </p>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget search-widget">
                            <div class="widget-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search-inner">
                                <form action="blog-1.html" method="post">
                                    <div class="form-group">
                                        <input type="search" name="search_field" placeholder="Search" required="">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget social-widget">
                            <div class="widget-title">
                                <h4>Follow Us On</h4>
                            </div>
                            <ul class="social-links clearfix">
                                <li><a href="blog-1.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h4>Category</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach ($category as $category)
                                        @php
                                            $blogCount = App\Models\Blog::active()
                                                ->where('category_id', $category->id)
                                                ->get();
                                        @endphp

                                        <li><a
                                                href="{{ route('blog.type.category', $category->id) }}">{{ $category->name }}<span>({{ count($blogCount) }})</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>Recent Posts</h4>
                            </div>
                            <div class="post-inner">
                                @foreach ($recentBlog as $recent)
                                    <div class="post">
                                        <figure class="post-thumb"><a
                                                href="{{ route('blog.details', $recent->slug) }}"><img
                                                    src="{{ asset($recent->image) }}" alt=""></a></figure>
                                        <h5><a href="{{ route('blog.details', $recent->slug) }}">{{ $recent->title }}</a>
                                        </h5>
                                        <span class="post-date">{{ $recent->created_at->format('F d, Y') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar-widget tags-widget">
                            <div class="widget-title">
                                <h4>Popular Tags</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="tags-list clearfix">
                                    @foreach ($tags as $tag)
                                        <li><a href="blog-details.html">{{ ucwords($tag) }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->

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
