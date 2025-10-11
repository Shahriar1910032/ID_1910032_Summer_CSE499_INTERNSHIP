<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{ $pageTitle . ' |' . ' Property-Seek' }}</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('application/public/frrontend/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('application/public/frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('application/public/frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/color/theme-color.css') }}" id="jssDefault"
        rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('application/public/frontend/assets/css/responsive.css') }}" rel="stylesheet">

    {{-- jQuery cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!-- Toaster message -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- End Toaster message -->

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">

        @include('templates.partials.header')

        @yield('master')

        @include('templates.partials.footer')



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->

    <script src="{{ asset('application/public/frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/owl.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/validation.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/nav-tool.js') }}"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('application/public/frontend/assets/js/gmaps.js') }}"></script>
    <script src="{{ asset('application/public/frontend/assets/js/map-helper.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('application/public/frontend/assets/js/script.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        // $.ajaxSetup({...})
        // এটি jQuery-এর একটি ফাংশন যা global AJAX settings define করে। অর্থাৎ, যেকোনো AJAX request এর জন্য এই header ব্যবহার হবে।
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        // Add to wishlist
        function addToWishList(property_id) {
            let url = "{{ route('addToWishlist', ':id') }}";
            url = url.replace(':id', property_id);

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: url,

                success: function(data) {
                    wishlist();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }
    </script>
    <script type="text/javascript">
        function wishlist() {
            // let routeUrl = "{{ route('wishlist.property') }}";
            $.ajax({
                type: "GET",
                dataType: 'json',

                url: "{{ route('wishlist.property') }}",


                success: function(response) {
                    // console.log(response);
                    $('#wishQty').text(response.wishQty);

                    var rows = ""
                    $.each(response.wishlist, function(key, value) {
                        let imgPath = "{{ asset('application/public/upload/property/thumbnail') }}/" +
                            value.property.thumbnail;
                        // console.log(imgPath); 

                        rows += `<div class="deals-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                              
                                <figure class="image"><img src="${imgPath}" alt=""></figure>
                                
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">Featured</span>
                                <div class="buy-btn"><a href="property-details.html"> ${value.property.property_status}</a></div>
                            </div>
                            <div class="lower-content">
                                <div class="title-text">
                                    <h4><a href="property-details.html">${value.property.name}</a></h4>
                                </div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>Start From</h6>
                                        <h4>$${value.property.lower_price}</h4>
                                    </div>
                                    <div class="author-box pull-right">
                                        <figure class="author-thumb">
                                            <img src="assets/images/feature/author-1.jpg" alt="">
                                            <span>Michael Bean</span>
                                        </figure>
                                    </div>
                                </div>
                                <p>${value.property.short_desc}</p>
                                <ul class="more-details clearfix">
                                    <li><i class="icon-14"></i>${value.property.bedrooms} Beds</li>
                                    <li><i class="icon-15"></i>${value.property.bathrooms} Baths</li>
                                    <li><i class="icon-16"></i>${value.property.property_size} Sq Ft</li>
                                </ul>
                                <div class="other-info-box clearfix">
                                    <div class="btn-box pull-left"><a href="property-details.html"
                                            class="theme-btn btn-two">See Details</a></div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a type="submit" class="text-body" id="${value.id}" onclick="wishListRemove(this.id)"><i class="fa fa-trash"></i></a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>`
                    });
                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();

        //Wish List Remove Start
        function wishListRemove(id) {
            let url = "{{ route('wish.list.remove', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: url,

                success: function(data) {
                    wishlist();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }
    </script>

    {{-- //Compare --}}
    <script type="text/javascript">
        function addToCompare(property_id) {
            let url = "{{ route('add.to.compare', ':id') }}";
            url = url.replace(':id', property_id);

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: url,

                success: function(data) {
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }

        function compare() {
            $.ajax({
                type: "GET",
                dataType: 'json',

                url: "{{ route('get.compare.property') }}",

                success: function(response) {

                    var rows = ""
                    $.each(response.compare, function(key, value) {
                        // console.log(imgPath); 

                        rows += ` <tr>
                            <th>Property Info</th>
                            <th>
                                <figure class="image-box"><img src="{{ asset('application/public/frontend/assets/images/resource/table-img-1.jpg') }}" alt="">
                                </figure>
                                <div class="title">${value.property.name}</div>
                                <div class="price">$${value.property.lower_price}</div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <p>City</p>
                            </td>
                            <td>
                                <p>${value.property.city}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Area</p>
                            </td>
                            <td>
                                <p>${value.property.property_size}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Rooms</p>
                            </td>
                            <td>
                                <p>${value.property.bedrooms}</p>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <p>Bathrooms</p>
                            </td>
                            <td>
                                <p>${value.property.bathrooms}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Action</p>
                            </td>
                            <td>
                                <a type="submit" class="text-body" id="${value.id}" onclick="compareListRemove(this.id)"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr> `
                    });
                    $('#compare').html(rows);
                }
            })
        }
        compare();

        //Compare List Remove Start
        function compareListRemove(id) {
            let url = "{{ route('compare.list.remove', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: url,

                success: function(data) {
                    compare();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }
    </script>
</body><!-- End of .page_wrapper -->

</html>
