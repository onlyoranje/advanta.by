@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Редактирование типа параметра {{$type->type_name}} </h2>

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
                                Редактировать тип
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

                    <form class="default-form-style" action="{{route('editTypetoDB',['type'=>$type->id])}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')



                        <div class="row">

                            <div class="col-6">
                                <div class="select-style-1">
                                    <label>Тип</label>
                                    <div class="select-position">

                                        <select  name="type" class="user-chosen-select" required>
                                            <option selected disabled>- выбрать -</option>

                                            @foreach($types as $type_)
                                                <option value="{{$type_}}" @if (old('type',$type->type)==$type_) selected @endif >{{$type_}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label >Имя типа</label>

                                    <input type="text" value="{{old('type_name',$type->type_name)}}"  name="type_name"  required>
                                </div>
                            </div>
                        </div>

                        <!-- end select -->




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
