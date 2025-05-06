@extends('dashboard.dashboard')
@section('title', 'Редактирование параметра '.$parameter->name)

@section('main')




    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Редактирование параметра "{{$parameter->name}}" </h2>

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
                                Редактирование параметра "{{$parameter->name}}"
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

                    <form class="default-form-style" action="{{route('editParameterToDB',['parameter'=>$parameter->id])}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')


                        <div class="row">

                            <div class="col-3">
                                <div class="input-style-1">
                                    <label>Наименование</label>
                                    <input type="text" value="{{old('name',$parameter->name)}}"  name="name"  required>

                                </div>
                            </div>

                            <div class="col-3">
                                <div class="input-style-1">
                                    <label >Мера</label>
                                    <input type="text" value="{{old('measure',$parameter->measure)}}" name="measure"  >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="select-style-1">
                                    <label>Вид данных</label>
                                    <div class="select-position">
                                        <select  name='type' class="user-chosen-select" required>
                                            <option  disabled>- выбрать -</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->type}}" <?php if ($type->type==old('type',$parameter->type)) echo 'selected' ?>>{{$type->type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-style-1">
                                    <label>Сортировка</label>
                                    <input type="number" value="{{old('sort',$parameter->sort)}}" name="sort"   required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12" id="options" >
                                <div class="form-group">
                                    <label>Опции</label>

                                    <div id="sortable">
                                        @php $options = json_decode($parameter->options, true);

                                                            if(!is_array($options)) $options[]='';
                                        @endphp
                                        @foreach ($options as $option_value )
                                            <div class="input-group flex-nowrap mt-1 input-option input-style-3">
                                                                <span class="input-group-text" id="addon-wrapping">
                                                                 <i class="lni lni-circle-plus"></i></span>
                                                <input name="options[]" type="text" value="{{$option_value}}">
                                            </div>
                                        @endforeach

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
                                    <input type="number" value="{{old('min',$parameter->min)}}" name="min">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 limit">
                                <div class="input-style-1">
                                    <label>Максимальное значение</label>
                                    <input type="number" value="{{old('min',$parameter->max)}}" name="max">
                                </div>
                            </div>

                        </div>

                        <!-- end select -->

                        <div class="col-lg-12 col-12">

                            {{--  <div class="form-group">
                                  <label class="control-label">Рубрики</label>--}}



                            @if (count($rubrics)>0)
                                    <?php
                                    //
                                    $pr= $parameter->rubrics->pluck('id')->toArray();

                                    $traverse = function ($rubrics, $prefix = '<ul>',$postfix= '</ul>') use ($pr, &$traverse) {

                                        if (count($rubrics)>0) echo '<ul>';
                                        foreach ($rubrics as $rubric) {
                                            $parent_id=$rubric->parent_id;
                                            if (!is_numeric($rubric->parent_id)) $parent_id=0;
                                            echo "<li class=\"form-check\"><input type=\"checkbox\" id=\"checkbox".$rubric->id."\" name=\"rubrics[]\" value=\"".$rubric->id."\" class=\"form-check-input\"";
                                            if (in_array($rubric->id, $pr )) echo "checked";
                                            echo "><label class=\"form-check-label\" for=\"checkbox".$rubric->id."\">".$rubric->title."</label>";


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
            @if ($parameter->type!=='option') $('#options').hide(); @endif
            @if ($parameter->type!=='number') $('.limit').hide(); @endif

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




