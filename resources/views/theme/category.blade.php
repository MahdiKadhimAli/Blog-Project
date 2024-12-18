


@extends('theme.master')
@section('title','Category - '.$categoryName)
@section('category-active','active')
@section('content')
<!--================ Hero sm Banner start =================-->
  @include('theme.partials.hero',['title'=>$categoryName])

  <!--================ Hero sm Banner end =================-->


  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            @if (isset($blogs) && count($blogs)>0)
                @foreach ($blogs as $blog )
                   <div class="col-md-6">
              <div class="single-recent-blog-post card-view">
                <div class="thumb">
                  <img class="card-img rounded-0" src="{{asset("storage/blogs/$blog->image")}}" alt="">
                  <ul class="thumb-info">
                    <li><a href="#"><i class="ti-user"></i>{{$blog->user->name}}</a></li>
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
            </div>
                @endforeach
            @endif


          </div>
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
            @if (isset($blogs) && count($blogs)>0)
             {{$blogs->render('pagination::bootstrap-5')}}
            @endif
            </div>
          </div>
        </div>

        <!-- Start Blog Post Siddebar -->
        @include('theme.partials.sidebar')
        <!-- End Blog Post Siddebar -->
      </div>
  </section>
  <!--================ End Blog Post Area =================-->
@endsection
