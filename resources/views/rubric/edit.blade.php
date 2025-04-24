@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Категория "{{$rubric->title}}"</h2>

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
                                <a href="{{route('rubric_dashboard')}}">Категории</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$rubric->title}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="form-elements-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="card-style mb-30">

                    <form class="default-form-style" action="{{route('editRubricToDB',['rubric'=>$rubric->id])}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="input-style-1">
                            <label>Наименование</label>
                            <input type="text" value="{{old('title',$rubric->title)}}"  name="title"  required>
                        </div>


                        <div class="input-style-1">
                            <label>Сортировка</label>
                            <input type="number" value="{{old('sort',$rubric->sort)}}" name="sort"   required>
                        </div>
                        <div class="select-style-1">
                            <label>Родительская категория</label>
                            <div class="select-position">
                                <select name="parent_id" id="select_category" class="user-chosen-select">
                                    <option value="">Корневая категория</option>
                                    <?
                                    $traverse = function ($rubrics, $prefix = '-') use (&$traverse) {
                                        foreach ($rubrics as $rubric) {
                                            echo "<option value=".$rubric->id." ";
                                            echo ">". PHP_EOL.$prefix.' '.$rubric->title."</option>";

                                            $traverse($rubric->children, $prefix.'-');
                                        }
                                    };

                                    $traverse($rubrics);
                                    ?>



                                </select>
                            </div>
                        </div>
                        <!-- end select -->
                        <div class="input-style-1">
                            <label>Описание</label>
                            <textarea rows="5" name="description">{{old('description',$rubric->description)}}</textarea>
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
        window.addEventListener("load", function() {
            @isset ($rubric->parent_id)
            $('#select_category option[value={{$rubric->parent_id}}]').prop('selected', true);
            @endisset

            @foreach ($depth as $ch_cat)
            $('#select_category option[value="{{$ch_cat->id}}"]').attr('disabled', 'disabled');
            @endforeach



        })
    </script>


@endsection

