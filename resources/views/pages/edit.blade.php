@extends('dashboard.dashboard')
@section('title', $title)

@section('main')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Редактирование страницы "{{$page->title}}" </h2>

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
                                <a href="{{route('pages_dashboard')}}">О компании</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Редактирование страницы "{{$page->title}}"
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

                    <form class="default-form-style" action="{{route('pages_update',$page->id)}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="input-style-1">
                            <label>Заголовок</label>
                            <input type="text" value="{{old('title', $page->title)}}"  name="title"  id="title" required>
                        </div>
                        <div class="input-style-1">
                            <label>URL</label>
                            <input type="text" value="{{old('url',$page->url)}}"  name="url" id="url" required>
                        </div>
                        <div class="form-check checkbox-style mb-20">
                            <input class="form-check-input" name="active" type="checkbox" value="Y" id="checkbox-1" {{$page->active=='Y'? "checked":""}}>
                            <label class="form-check-label" for="checkbox-1">
                                Активно</label>
                        </div>
                        <div class="input-style-1">
                            <label>Сортировка</label>
                            <input type="number" value="{{old('sort',$page->sort)}}" name="sort"   required>
                        </div>
                        <!-- end select -->
                        <div class="col-6">

                            <img src="{{Storage::url('media/'.$page->image)}}" class="img-thumbnail"  alt="">


                        </div>
                        <div class="input-style-1">
                            <input type="file" name="img" >
                        </div>


                        <div class="input-style-1">
                            <label>текст</label>
                            <textarea rows="5" id="editor" name="text">{{old('text',$page->content)}}</textarea>
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

            $('#title').on("input", function() {
                var url = $('#url').val();
                var converter = {
                    'а': 'a',    'б': 'b',    'в': 'v',    'г': 'g',    'д': 'd',
                    'е': 'e',    'ё': 'e',    'ж': 'zh',   'з': 'z',    'и': 'i',
                    'й': 'y',    'к': 'k',    'л': 'l',    'м': 'm',    'н': 'n',
                    'о': 'o',    'п': 'p',    'р': 'r',    'с': 's',    'т': 't',
                    'у': 'u',    'ф': 'f',    'х': 'h',    'ц': 'c',    'ч': 'ch',
                    'ш': 'sh',   'щ': 'sch',  'ь': '',     'ы': 'y',    'ъ': '',
                    'э': 'e',    'ю': 'yu',   'я': 'ya',

                    'А': 'A',    'Б': 'B',    'В': 'V',    'Г': 'G',    'Д': 'D',
                    'Е': 'E',    'Ё': 'E',    'Ж': 'Zh',   'З': 'Z',    'И': 'I',
                    'Й': 'Y',    'К': 'K',    'Л': 'L',    'М': 'M',    'Н': 'N',
                    'О': 'O',    'П': 'P',    'Р': 'R',    'С': 'S',    'Т': 'T',
                    'У': 'U',    'Ф': 'F',    'Х': 'H',    'Ц': 'C',    'Ч': 'Ch',
                    'Ш': 'Sh',   'Щ': 'Sch',  'Ь': '',     'Ы': 'Y',    'Ъ': '',
                    'Э': 'E',    'Ю': 'Yu',   'Я': 'Ya'
                };


                word = $(this).val().toLowerCase();

                var answer = '';
                for (var i = 0; i < word.length; ++i ) {
                    if (converter[word[i]] == undefined){
                        answer += word[i];
                    } else {
                        answer += converter[word[i]];
                    }
                }

                answer = answer.replace(/[^-0-9a-z]/g, '-');
                answer = answer.replace(/[-]+/g, '-');
                answer = answer.replace(/^\-|-$/g, '');


                $('#url').val(answer);


            });
        } );
    </script>
@endsection
