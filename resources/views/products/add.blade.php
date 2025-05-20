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
                                <a href="{{route('product_dashboard')}}">Продукты</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Новый продукт
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

                    <form class="default-form-style" action="{{route('addProductToDB')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="input-style-1">
                            <label>Наименование</label>
                            <input type="text" value="{{old('title')}}"  name="title"  required>
                        </div>


                        <div class="input-style-1">
                            <label>Сортировка</label>
                            <input type="number" value="{{old('sort',500)}}" name="sort"   required>
                        </div>
                        <div class="select-style-1">
                            <label>Категория</label>
                            <div class="select-position">
                                <select name="rubrics_id"  class="user-chosen-select">
                                    <option value="">Категория</option>
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

                        <div class="col-12">
                            <input type="file" name="file" >
                        </div>
                        <div class="input-style-1">
                            <label>Описание</label>
                            <textarea rows="5" name="content">{{old('content')}}</textarea>
                        </div>
                        <div class="col-12">

                        @if (count($parameters)>0)
                            @foreach($parameters as $parameter)
                                @if ($parameter->type == 'option')
                                    <div class="col-6 input-parameter" style="display:none" id="parameter_{{$parameter->id}}">
                                        <div class="select-style-1 mb-3">
                                            <label>{{$parameter->name}}<? if ($parameter->measure) echo', '.$parameter->measure?></label>
                                            <div class="select-position">
                                            <select name="parameter[{{$parameter->id}}]" >
                                                <option disabled selected>- выбрать -</option>
                                                @php
                                                    $options = json_decode($parameter->options);
                                                @endphp
                                                @foreach($options as $option)
                                                    <option value="{{$option}}">{{$option}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        </div>
                                    </div>
                                @elseif ($parameter->type == 'checkbox')
                                    <div class="col-6 input-parameter" style="display:none" id="parameter_{{$parameter->id}}">

                                        <div class="form-check checkbox-style checkbox-success mb-20">

                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input width-auto" name="parameter[{{$parameter->id}}]" value="Y">
                                                <label class="form-check-label">{{$parameter->name}}<? if ($parameter->measure) echo', '.$parameter->measure?></label>
                                            </div>
                                        </div>

                                    </div>
                                @elseif ($parameter->type == 'number')
                                    <div class="col-6 input-parameter" style="display:none" id="parameter_{{$parameter->id}}">
                                        <div class="input-style-1 mb-3">
                                            <label>{{$parameter->name}}<? if ($parameter->measure) echo', '.$parameter->measure?>
                                            </label>
                                            <input type="{{$parameter->type}}" step="0.01" name="parameter[{{$parameter->id}}]" class="form-control" @if ($parameter->max) max="{{$parameter->max}}" @endif @if ($parameter->min)min="{{$parameter->min}}" @endif>
                                        </div>
                                    </div>

                                @else
                                    <div class="col-6 input-parameter" style="display:none" id="parameter_{{$parameter->id}}">
                                        <div class="mb-3">
                                            <label class="form-label">{{$parameter->name}}<? if ($parameter->measure) echo', '.$parameter->measure?>
                                            </label>
                                            <input type="{{$parameter->type}}" name="parameter[{{$parameter->id}}]" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
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


            window.json_parameter_rubric = @json($parameter_rubric);


            $("input[name*='parameter']").change(function () {
                if (typeof ($(this).attr("min"))!= "undefined")
                {
                    var min = $(this).attr("min");
                    if ($(this).val()<=min) $(this).val(min)
                    console.log(min+' '+$(this).val)
                }

                if (typeof ($(this).attr("max"))!= "undefined")
                {
                    var max = $(this).attr("max");
                    if ($(this).val()>=max) $(this).val(max)
                    console.log(max+' '+$(this).val)
                }
            });

            $("select[name='rubrics_id']").change(function () {
                Parameter_Rubric($(this).val())

            })


        })


    </script>
@endsection
