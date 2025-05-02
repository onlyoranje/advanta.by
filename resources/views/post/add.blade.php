@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Новый продукт </h2>

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
                                <a href="{{route('posts_dashboard')}}">Новости</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Добавить новость
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

                    <form class="default-form-style" action="{{route('post_dashboard_add_db')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="input-style-1">
                            <label>Заголовок</label>
                            <input type="text" value="{{old('title')}}"  name="title"  required>
                        </div>


<div class="row">
    @if (count($categories)>0)
    <div class="col-6">
        <div class="select-style-1">
            <label>Категория</label>
            <div class="select-position">
                <select name="rubric_id"  class="user-chosen-select">
                    @if (isset($categories))
                        @foreach ($categories as $category)
                            <option value="{{$category}}">{{$category}}</option>
                        @endforeach
                    @endif



                </select>
            </div>
        </div>
    </div>
    @endif
    <div class="col-6">
        <div class="input-style-1">

        <label>Новая категория</label>
        <input type="text" value="{{old('new_category')}}"  name="new_category">
    </div>
    </div>
</div>

                        <!-- end select -->

                        <div class="col-12">
                            <input type="file" name="file" >
                        </div>
                        <div class="input-style-1">
                            <label>Предварительный текст</label>
                            <textarea rows="5" name="preview_text">{{old('preview_text')}}</textarea>
                        </div>

                        <div class="input-style-1">
                            <label>текст</label>
                            <textarea rows="5" id="editor" name="text">{{old('text')}}</textarea>
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
    <script>
        window.addEventListener("load", function(){

            ClassicEditor
                .create( document.querySelector( '#editor' ), {

                    ckfinder: {
                        uploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                    },
                    mediaEmbed: {
                        previewsInData: true
                    }


                } )
                .catch( error => {
                    console.error( error );
                } );
            ClassicEditor.replace( 'Resolution', {
                height: 500
            } );

        } );
    </script>
@endsection
