 <!-- category-section -->
 @php
     $property_type = App\Models\PropertyType::latest()->limit(5)->get();
 @endphp
 <section class="category-section centred">
     <div class="auto-container">
         <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
             <ul class="category-list clearfix">
                 @foreach ($property_type as $property)
                     @php
                         $proprty_count = App\Models\Property::where('ptype_id', $property->id)->get();
                     @endphp
                     <li>
                         <div class="category-block-one">
                             <div class="inner-box">
                                 <div class="icon-box"><i class="{{ $property->icon }}"></i></div>
                                 <h5><a href="{{ route('property.type.category', $property->id) }}">{{ $property->type_name }}</a></h5>
                                 <span>{{ count($proprty_count) }}</span>
                             </div>
                         </div>
                     </li>
                 @endforeach
             </ul>
             <div class="more-btn"><a href="{{ route('property.categories') }}" class="theme-btn btn-one">All Categories</a>
             </div>
         </div>
     </div>
 </section>
 <!-- category-section end -->
