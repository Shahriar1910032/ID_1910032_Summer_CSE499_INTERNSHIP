
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

        success: function (data) {
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

// Show wishlist Customer Dashboard
function wishlist() {
    // let routeUrl = "{{ route('wishlist.property') }}";
    $.ajax({
        type: "GET",
        dataType: 'json',

        url: "{{ route('wishlist.property') }}",


        success: function (response) {
            // console.log(response);
            $('#wishQty').text(response.wishQty);

            var rows = ""
            $.each(response.wishlist, function (key, value) {
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

        success: function (data) {
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
