@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Новый сертификат </h2>

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
                                <a href="{{route('certificates_dashboard')}}">Сертификаты</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Добавить сертификат
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

                    <form class="default-form-style" action="{{route('certificates_dashboard_add_db')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="input-style-1">
                            <label>Заголовок</label>
                            <input type="text" value="{{old('title')}}"  name="title"  required>
                        </div>


                            <div class="input-style-1">
                                <label>Сортировка</label>
                                <input type="number" value="{{old('sort',500)}}" name="sort"   required>
                            </div>


                        <!-- end select -->

                        <div class="input-style-1">
                            <input type="file" name="certificates" >
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
