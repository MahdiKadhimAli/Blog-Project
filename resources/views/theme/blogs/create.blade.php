@extends('theme.master')
@section('title','Add a new Blog')
 @section('content')

  <!--================ Hero sm banner start =================-->
  @include('theme.partials.hero',['title'=>'Add a new Blog'])
  <!--================ Hero sm banner end =================-->
 <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
             @if (session('blogCreateStatus'))
                        <div class="alert alert-success">
                         {{ session('blogCreateStatus') }}
                       </div>
                    @endif
          <form action="{{ route('bloge.store') }}" method="post" class="form-contact contact_form"   id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
             {{-- TITLE --}}
                <div class="form-group">
                  <input class="form-control border" name="name" value="{{old('name')}}"  type="text" placeholder="Enter Your Title Blog">
                   <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                    {{-- SELECTION --}}
                <div class="form-group">
                  <select class="form-control border" name="category_id" value="{{old('category_id')}}"  >
                            <option value="">Select Category</option>
                    @if (count( $categories)>0)
                        @foreach ( $categories as  $category)
                        <option value="{{$category->id}}">{{$category->name}} </option>
                        @endforeach
                    @endif
                  </select>
                   <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>
                    {{-- IMAGE --}}
                    <div class="form-group">
                  <input class="form-control border" name="image" type="file" >
                   <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                        {{-- Discriotion --}}
                <div class="form-group">
                  <textarea class="w-100 border" rows="5" name="discrimination" placeholder="Enter the Message"> {{old('discrimination')}}  </textarea>
                   <x-input-error :messages="$errors->get('discrimination')" class="mt-2" />
                </div>
</div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Submit</button>
            </div>
          </form>
      </div>

  </section>
	<!-- ================ contact section end ================= -->


@endsection
