@extends('theme.master')
@section('title','index')
@section('home-active','active')
@section('content')
  <main class="site-main">
    <!--================Hero Banner start =================-->
    <section class="mb-30px">
      <div class="container">
        <div class="hero-banner">
          <div class="hero-banner__content">
            <h3>Tours & Travels</h3>
            <h1>Amazing Places on earth</h1>
            <h4>December 12, 2018</h4>
          </div>
        </div>
      </div>
    </section>
    <!--================Hero Banner end =================-->


 <!--================ Blog slider start =================-->
    <section>
      <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/blog-slider/blog-slide1.png" alt="">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="#">Fashion</a>
              <h3><a href="#">New york fashion week's continued the evolution</a></h3>
              <p>2 days ago</p>
            </div>
          </div>
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/blog-slider/blog-slide2.png" alt="">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="#">Fashion</a>
              <h3><a href="#">New york fashion week's continued the evolution</a></h3>
              <p>2 days ago</p>
            </div>
          </div>
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/blog-slider/blog-slide3.png" alt="">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="#">Fashion</a>
              <h3><a href="#">New york fashion week's continued the evolution</a></h3>
              <p>2 days ago</p>
            </div>
          </div>
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/blog-slider/blog-slide1.png" alt="">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="#">Fashion</a>
              <h3><a href="#">New york fashion week's continued the evolution</a></h3>
              <p>2 days ago</p>
            </div>
          </div>
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/blog-slider/blog-slide2.png" alt="">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="#">Fashion</a>
              <h3><a href="#">New york fashion week's continued the evolution</a></h3>
              <p>2 days ago</p>
            </div>
          </div>
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/blog-slider/blog-slide3.png" alt="">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="#">Fashion</a>
              <h3><a href="#">New york fashion week's continued the evolution</a></h3>
              <p>2 days ago</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Blog slider end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            @if (count($blogs) > 0 )
@foreach ($blogs as $blog)
   <div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid" src="{{asset("storage/blogs/$blog->image")}}" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>{{$blog->user->name}}</a></li>
                  <li><a href="#"><i class="ti-notepad"></i>{{$blog->created_at->format('d M Y')}}</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="{{route('bloge.show',['bloge'=> $blog])}}">
                  <h3>{{$blog->name}}</h3>
                </a>
                <p>{{$blog->discrimination}}</p>
                <a class="button" href="{{route('bloge.show',['bloge'=> $blog])}}">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
@endforeach
            @endif
            <div class="row">
              <div class="col-lg-12">
                  {{-- <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-left"></i>
                                  </span>
                              </a>
                          </li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-right"></i>
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </nav> --}}
                  {{$blogs->render('pagination::bootstrap-5')}}
              </div>
            </div>
          </div>

              @include('theme.partials.sidebar')

        </div>
    </section>
    <!--================ End Blog Post Area =================-->
    </main>
    @endsection
