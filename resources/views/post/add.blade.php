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



                        <div class="select-style-1">
                            <label>Категория</label>
                            <div class="select-position">
                                <select name="rubric_id"  class="user-chosen-select">
                                    <option value="">Категория</option>
                                    <?
                                    $traverse = function ($categories, $prefix = '-') use (&$traverse) {
                                        foreach ($categories as $category) {
                                            echo "<option value=".$category." ";
                                            echo ">". PHP_EOL.$prefix.' '.$category."</option>";

                                            $traverse($rubric->children, $prefix.'-');
                                        }
                                    };

                                    $traverse($categories);
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
