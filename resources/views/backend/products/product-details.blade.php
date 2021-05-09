@extends('frontend.layouts.master')
@section('content')
<!-- Product Detail Start -->
<div class="product-detail">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-8">
            <div class="product-detail-top">
               <div class="row align-items-center">
                  <div class="col-md-5">
                     <div class="product-slider-single normal-slider">
                        @php
                        foreach($detailsData->images as $image){
                        $img =$image->image;
                        }
                        $Product_images = json_decode($img);
                        @endphp
                        @foreach ($Product_images as $imj)
                        <img src="{{asset('uploads/'.$imj)}}" alt="Product Image" style="max-width: 100%;
                           height: 300px;">
                        @endforeach
                     </div>
                     <div class="product-slider-single-nav normal-slider">
                        @foreach ($Product_images as $imj)
                        <div class="slider-nav-img">
                           <img src="{{asset('uploads/'.$imj)}}" alt="Product Image" style="max-width: 100%;
                              height:100px;"> 
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="col-md-7">
                     <div class="product-content">
                        <div class="title">
                           <h2>{{$detailsData->title}}</h2>
                        </div>
                        <div class="ratting">
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                        </div>
                        <div class="price">
                           <h4>Price:</h4>
                           <p>
                              @if ($detailsData->offer_price==0)
                              ${{$detailsData->price}}
                              @else 
                              ${{$detailsData->offer_price}}
                              @endif
                              @if ($detailsData->offer_price!=0)
                              <span>${{$detailsData->price}}</span>
                              @else
                              @endif
                           </p>
                        </div>
                        <div class="quantity">
                           <h4>Quantity:</h4>
                           <div class="qty">
                              <button class="btn-minus"><i class="fa fa-minus"></i></button>
                              <input type="text" name="quantity" value="{{$detailsData->quantity}}">
                              <button class="btn-plus"><i class="fa fa-plus"></i></button>
                           </div>
                        </div>
                        <div class="p-size">
                           <h4>Size:</h4>
                           <div class="btn-group btn-group-sm">
                              <button type="button" class="btn">S</button>
                              <button type="button" class="btn">M</button>
                              <button type="button" class="btn">L</button>
                              <button type="button" class="btn">XL</button>
                           </div>
                        </div>
                        <div class="p-color">
                           <h4>Color:</h4>
                           <div class="btn-group btn-group-sm">
                              <button type="button" class="btn">White</button>
                              <button type="button" class="btn">Black</button>
                              <button type="button" class="btn">Blue</button>
                           </div>
                        </div>
                        <div class="action">
                           <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                           <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row product-detail-bottom">
               <div class="col-lg-12">
                  <ul class="nav nav-pills nav-justified">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div id="description" class="container tab-pane active">
                        <h4>Product description</h4>
                        <p>
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo. 
                        </p>
                     </div>
                     <div id="specification" class="container tab-pane fade">
                        <h4>Product specification</h4>
                        <ul>
                           <li>Lorem ipsum dolor sit amet</li>
                           <li>Lorem ipsum dolor sit amet</li>
                           <li>Lorem ipsum dolor sit amet</li>
                           <li>Lorem ipsum dolor sit amet</li>
                           <li>Lorem ipsum dolor sit amet</li>
                        </ul>
                     </div>
                     <div id="reviews" class="container tab-pane fade">
                        <div class="reviews-submitted">
                           <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                           <div class="ratting">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                           </div>
                           <p>
                              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                           </p>
                        </div>
                        <div class="reviews-submit">
                           <h4>Give your Review:</h4>
                           <div class="ratting">
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                           </div>
                           <div class="row form">
                              <div class="col-sm-6">
                                 <input type="text" placeholder="Name">
                              </div>
                              <div class="col-sm-6">
                                 <input type="email" placeholder="Email">
                              </div>
                              <div class="col-sm-12">
                                 <textarea placeholder="Review"></textarea>
                              </div>
                              <div class="col-sm-12">
                                 <button>Submit</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="product">
               <div class="section-header">
                  <h1>Related Products</h1>
               </div>
               <div class="row align-items-center product-slider product-slider-1">
                  @foreach ($relatedProducts as $product)
                  <div class="col-lg-3">
                     <div class="product-item">
                        <div class="product-title">
                           <a href="#">{{$product->title}}</a>
                           <div class="ratting">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                           </div>
                        </div>
                        <div class="product-image">
                           <a href="product-detail.html">
                           @php
                           $findProduct = App\Models\Product::find($product->id);
                           foreach ($findProduct->images as $key => $img) {
                           $x = $img->image;
                           }
                           $y = json_decode($x);
                           foreach ($y as $key => $z) {
                           $xy= $z;
                           }
                           @endphp
                           <img src="{{asset('uploads/'.$xy)}}"  alt="" style="max-width: 100%;
                              height: 300px;"> 
                           </a>
                           <div class="product-action">
                              <a href="#"><i class="fa fa-cart-plus"></i></a>
                              <a href="#"><i class="fa fa-heart"></i></a>
                              <a href="{{route('product.details',$product->id)}}"><i class="fa fa-search"></i></a>
                           </div>
                        </div>
                        <div class="product-price">
                           <h3><span>$</span>  @if ($product->offer_price==0)
                              {{$product->price}}
                              @else 
                              {{$product->offer_price}}
                              @endif
                           </h3>
                           <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <!-- Side Bar Start -->
         <div class="col-lg-4 sidebar">
            <div class="sidebar-widget category">
               <h2 class="title">Category</h2>
               <nav class="navbar bg-light">
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        @foreach ($categories as $category)
                        <a class="nav-link" href="#">{{$category->name}}</a>
                        @endforeach
                     </li>
                  </ul>
               </nav>
            </div>
            <div class="sidebar-widget widget-slider">
               <div class="sidebar-slider normal-slider">
                @foreach ($relatedProducts as $product)
              
                   <div class="product-item">
                      <div class="product-title">
                         <a href="#">{{$product->title}}</a>
                         <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                         </div>
                      </div>
                      <div class="product-image">
                         <a href="product-detail.html">
                         @php
                         $findProduct = App\Models\Product::find($product->id);
                         foreach ($findProduct->images as $key => $img) {
                         $x = $img->image;
                         }
                         $y = json_decode($x);
                         foreach ($y as $key => $z) {
                         $xy= $z;
                         }
                         @endphp
                         <img src="{{asset('uploads/'.$xy)}}"  alt="" style="max-width: 100%;
                            height: 300px;"> 
                         </a>
                         <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="{{route('product.details',$product->id)}}"><i class="fa fa-search"></i></a>
                         </div>
                      </div>
                      <div class="product-price">
                         <h3><span>$</span>  @if ($product->offer_price==0)
                            {{$product->price}}
                            @else 
                            {{$product->offer_price}}
                            @endif
                         </h3>
                         <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                      </div>
                   </div>
               
                @endforeach
               </div>
            </div>
            <div class="sidebar-widget brands">
               <h2 class="title">Our Brands</h2>
               <ul>
                  <li><a href="#">Nulla </a><span>(45)</span></li>
                  <li><a href="#">Curabitur </a><span>(34)</span></li>
                  <li><a href="#">Nunc </a><span>(67)</span></li>
                  <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                  <li><a href="#">Fusce </a><span>(89)</span></li>
                  <li><a href="#">Sagittis</a><span>(28)</span></li>
               </ul>
            </div>
            <div class="sidebar-widget tag">
               <h2 class="title">Tags Cloud</h2>
               @foreach ($detailsData->tags as $tag)
                   <a href="#">{{$tag->name}}</a>
               @endforeach
               
               
            </div>
         </div>
         <!-- Side Bar End -->
      </div>
   </div>
</div>
<!-- Product Detail End -->
<!-- Brand Start -->
<div class="brand">
   <div class="container-fluid">
      <div class="brand-slider">
         <div class="brand-item"><img src="{{asset('backend/images/products/')}}/frontend/img/brand-1.png" alt=""></div>
         <div class="brand-item"><img src="{{asset('backend/images/products/')}}/frontend/img/brand-2.png" alt=""></div>
         <div class="brand-item"><img src="{{asset('backend/images/products/')}}/frontend/img/brand-3.png" alt=""></div>
         <div class="brand-item"><img src="{{asset('backend/images/products/')}}/frontend/img/brand-4.png" alt=""></div>
         <div class="brand-item"><img src="{{asset('backend/images/products/')}}/frontend/img/brand-5.png" alt=""></div>
         <div class="brand-item"><img src="{{asset('backend/images/products/')}}/frontend/img/brand-6.png" alt=""></div>
      </div>
   </div>
</div>
<!-- Brand End -->
@endsection
@section('scripts')
<script src="/frontend/lib/easing/easing.min.js"></script>
<script src="/frontend/lib/slick/slick.min.js"></script>
<!-- Template Javascript -->
<script src="/frontend/js/main.js"></script>
@endsection