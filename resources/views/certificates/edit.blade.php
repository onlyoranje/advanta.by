@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Редактирование {{$certificates->title}} </h2>

                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('certificates_dashboard')}}">Фото и видео</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Редактирование {{$certificates->title}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>

    </div>



    <div class="form-elements-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="card-style mb-30">

                    <form class="default-form-style" action="{{route('media_dashboard_update',$media->id)}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="input-style-1">
                            <label>Заголовок</label>
                            <input type="text" value="{{old('title',$media->title)}}"  name="title"  required>
                        </div>


                        <div class="input-style-1">
                            <label>Сортировка</label>
                            <input type="number" value="{{old('sort',$media->sort)}}" name="sort"   required>
                        </div>


                        <!-- end select -->
                        <div class="col-6">
                            @if (strstr($media->type, '/', true)=='image')
                                <img src="{{Storage::url('media/'.$media->url)}}" class="img-thumbnail"  alt="">
                            @endif
                            @if (strstr($media->type, '/', true)=='video')

                                    <video width="320" height="240" controls>
                                        <source src="{{Storage::url('media/'.$media->url)}}" type="{{$media->type}}">

                                        Your browser does not support the video tag.
                                    </video>

                                @endif

                        </div>
                        <div class="col-12 mt-20">
                            <input type="file" name="media1" >
                        </div>


                        <div class="input-style-1">
                            <label>текст</label>
                            <textarea rows="5"name="text">{{old('text',$media->content)}}</textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="main-btn primary-btn btn-hover">
                                Сохранить
                            </button>
                        </div>
                    </form>
                    <!-- end select -->
                </div>
            </div>
        </div>
    </div>

@endsection
