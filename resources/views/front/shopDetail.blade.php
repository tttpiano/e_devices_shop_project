@extends('front.layouts.master')
@section('main-container')
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}}">Home</a>
                            <a href="">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{$sDetail->images[0]->url}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{$sDetail->images[0]->url}}"
                                 src="{{$sDetail->images[0]->url}}" alt="">
                            <img data-imgbigurl="{{$sDetail->images[0]->url}}"
                                 src="{{$sDetail->images[0]->url}}" alt="">
                            <img data-imgbigurl="{{$sDetail->images[0]->url}}"
                                 src="{{$sDetail->images[0]->url}}" alt="">
                            <img data-imgbigurl="{{$sDetail->images[0]->url}}"
                                 src="{{$sDetail->images[0]->url}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$sDetail->name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{number_format($sDetail->price)}} Đ</div>
                        <p>{{$sDetail->description}}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a data-product-id="{{$sDetail->id}}"  class="primary-btn add-to-cart ">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">Description</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                   aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{$sDetail->description}}</p>
                                    <p>Hệ Điều Hành: {{$sDetail->openratingSystems}}</p>
                                    <p>Hãng        : {{$sDetail->brand->name}}</p>
                                    <p>Ram         : {{$sDetail->ram->size}}</p>
                                    <p>Bộ nhớ trong: {{$sDetail->internalMemory->size}}</p>

                                </div>
                            </div>

                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="row">
                                    <!-- Reviews -->

                                    <div class="col-md-6">


                                        <div id="reviews">
                                            <ul class="reviews">
                                                @foreach ($ratings as $rating)
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">{{ $rating->user->name }}</h5>
                                                            <p class="date">{{ $rating->created_at}}</p>
                                                            <div class="review-rating">
                                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$rating->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o "></i>
                                                                @endif
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        @if ($rating->comment)
                                                            <div class="review-body">
                                                                <p>{{ $rating->comment }}</p>
                                                            </div>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form" action="{{route('ratings.store', $sDetail->id) }}" method="POST">
                                                @csrf
                                                <textarea class="input" style="width: 500px;" name="comment" id="comment" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars" name="rating" id="rating">
                                                        <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $re)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">

                        <div class="product__item__pic set-bg" data-setbg="{{$re->images[0]->url}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$re -> name}}</a></h6>
                            <h5>{{number_format($re->price)}} Đ</h5>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
