@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')




    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Добавить тип </h2>

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
                                <a href="{{route('parameter_type_dashboard')}}">Типы параметров</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Добавить тип
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>

    </div>



    <div class="form-elements-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">

                    <form class="default-form-style" action="{{route('addParameterToDB')}}" method="post"  enctype="multipart/form-data">
                        @csrf



                        <div class="row">

                            <div class="col-3">
                                <div class="input-style-1">
                                    <label>Наименование</label>
                                    <input type="text" value="{{old('name')}}"  name="name"  required>

                                </div>
                            </div>

                            <div class="col-3">
                                <div class="input-style-1">
                                    <label >Мера</label>
                                    <input type="text" value="{{old('measure')}}" name="measure"  >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="select-style-1">
                                    <label>Вид данных</label>
                                    <div class="select-position">
                                    <select  name='type' class="user-chosen-select" required>
                                        <option  disabled>- выбрать -</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->type}}" @if ($type->type==old('type')) selected @endif>{{$type->type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-style-1">
                            <label>Сортировка</label>
                            <input type="number" value="{{old('sort',500)}}" name="sort"   required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12" id="options" >
                                <div class="form-group">
                                    <label>Опции</label>
                                    <div id="sortable">


                                        <div class="input-group flex-nowrap mt-1 input-option input-style-3">

                                            <input name="options[]" type="text">
                                            <span class="icon" id="addon-wrapping"><i class="lni lni-circle-plus"></i></span>
                                        </div>


                                    </div>

                                    <div class="col-12">
                                        <div class="input-style-1 button mt-1">
                                            <span type="button" class="reply add-option" >Добавить строку</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            {{--Числа--}}
                            <div class="col-lg-3 col-12 limit">
                                <div class="input-style-1">
                                    <label>Минимальное значение</label>
                                    <input type="number" value="{{old('min')}}" name="min">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 limit">
                                <div class="input-style-1">
                                    <label>Максимальное значение</label>
                                    <input type="number" value="{{old('max')}}" name="max">
                                </div>
                            </div>

                        </div>

                        <!-- end select -->

                        <div class="col-lg-12 col-12">

                            {{--  <div class="form-group">
                                  <label class="control-label">Рубрики</label>--}}


                            @if (count($rubrics)>0)
                                    <?php

                                    $traverse = function ($rubrics, $prefix = '<ul>',$postfix= '</ul>') use (&$traverse) {
                                        if (count($rubrics)>0) echo '<ul>';
                                        foreach ($rubrics as $rubric) {
                                            $parent_id=$rubric->parent_id;
                                            if (!is_numeric($rubric->parent_id)) $parent_id=0;
                                            echo "<li class=\"form-check\"><input type=\"checkbox\" id=\"checkbox".$rubric->id."\" name=\"rubrics[]\" value=\"".$rubric->id."\" class=\"form-check-input\"><label class=\"form-check-label\" for=\"checkbox".$rubric->id."\">".$rubric->title."</label>";

                                            if (count($rubric->children)==0) echo "</li>";
                                            $traverse($rubric->children);
                                        }
                                        if (count($rubrics)>0) echo "</ul>";
                                    };

                                    $traverse($rubrics);

                                    ?>
                            @endif

                            {{--    </div>--}}

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
            $( "#sortable" ).sortable();
            $('#options').hide()
            $('.limit').hide()
            $("select[name='type']").change(function () {
                if ($(this).val()==='option')
                {
                    $('#options').show()
                    $('.limit').hide()
                } else if ($(this).val()==='number')
                {
                    $('.limit').show()
                    $('#options').hide()
                } else {
                    $('.limit').hide()
                    $('#options').hide()

                }
            });
          $(".add-option").on( "click",function (){
              $('#sortable').append('<div class="input-group flex-nowrap mt-1 input-option input-style-3"><input name="options[]" type="text"><span class="icon" id="addon-wrapping"><i class="lni lni-circle-plus"></i></span></div>');
          })
        });
    </script>

@endsection

