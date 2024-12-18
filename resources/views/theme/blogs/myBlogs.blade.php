@extends('theme.master')
@section('title','My Blogs')
 @section('content')

  <!--================ Hero sm banner start =================-->
  @include('theme.partials.hero',['title'=>'My Blogs'])
  <!--================ Hero sm banner end =================-->
 <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
                    @if (session('blogDeleteStatus'))
                        <div class="alert alert-success">
                         {{ session('blogDeleteStatus') }}
                       </div>
                    @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col" width="20%">Actions</th>
     </tr>
  </thead>
  <tbody>
    @if (count($blogs)>0)
      @foreach ($blogs as  $blog)
    <tr>
      <td> <a href="{{route('bloge.show',['bloge'=> $blog])}}" target="_blank">
        <p>{{$blog->name}}</p>
      </a>
      </td>
      <td>
                    <a href="{{route('bloge.edit',['bloge'=>$blog])}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                        <form action="{{route('bloge.destroy',['bloge'=>$blog])}}" method="POST" id="delete_blog" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <a href="javascript:$('form#delete_blog').submit();" class="btn btn-sm btn-danger mr-2">Delete</a>
                        </form>


      </td>
    </tr>
      @endforeach
    @endif


  </tbody>
</table>
                @if (count($blogs)>0)
                  {{$blogs->render('pagination::bootstrap-5')}}
                @endif

         </div>
      </div>

  </section>
	<!-- ================ contact section end ================= -->


@endsection
