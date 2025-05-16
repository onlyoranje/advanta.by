@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Категории </h2>
                    <a href="{{route('rubric_dashboard_add')}}" class="main-btn primary-btn btn-hover btn-sm">
                        <i class="lni lni-plus mr-5"></i> Новая категория</a>
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

                            <li class="breadcrumb-item active" aria-current="page">
                                Категории
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>


    <div class="col-lg-6">
        <div class="card-style mb-30">

            <div class="table-wrapper table-responsive">
                <table class="table striped-table">
                    <thead>
                    <tr>

                        <th>
                            <h6>Наименование категории</h6>
                        </th>
                        <th>
                            <h6>Кол-во продуктов</h6>
                        </th>
                        <th>
                            <h6>Действия</h6>
                        </th>
                    </tr>
                    <!-- end table row-->
                    </thead>
                    <tbody>
                    @if (count($rubrics)>0)
                            <?php
                        $traverse = function ($rubrics, $prefix = '&emsp;') use (&$traverse) {
                        foreach ($rubrics as $rubric){
                            ?>
                    <tr>

                        <td>
                            <p>{!! $prefix !!} {{$rubric->title}}</p>
                        </td>
                        <td>

                            <p>{{(count($rubric->products)>0) ? count($rubric->products):"0"}}</p>
                        </td>
                        <td>
                            <div class="action">
                                <button class="text-danger">
                                    <a href='{{route('rubric_dashboard_edit', ['rubric' => $rubric->id])}}'><i class="lni lni-pencil"></i></a>
                                    <a href='{{route('rubric_dashboard_delete', ['rubric' => $rubric->id])}}'><i class="lni lni-trash"></i></a>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- end table row -->
                                <?php
                                $traverse($rubric->children, $prefix.'-');
                            }
                            };

                                $traverse($rubrics);
                                ?>
                    @endif
                    <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->
            </div>
        </div>
        <!-- end card -->
    </div>
   </div>



@endsection
