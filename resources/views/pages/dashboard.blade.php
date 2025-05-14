@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Новости </h2>
                    <a href="{{route('pages_dashboard_add')}}" class="main-btn primary-btn btn-hover btn-sm">
                        <i class="lni lni-plus mr-5"></i> Добавить страницу</a>
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
                                О компании
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Basic Example</h6>
                <div class="table-wrapper table-responsive">
                    <table class="table clients-table">
                        <thead>
                        <tr>
                            <th>
                                <h6>#</h6>
                            </th>
                            <th>
                                <h6>Name</h6>
                            </th>
                            <th>
                                <h6>Email</h6>
                            </th>
                            <th>
                                <h6>Phone</h6>
                            </th>
                            <th>
                                <h6>Добавлено</h6>
                            </th>
                            <th>
                                <h6>Обновлено</h6>
                            </th>
                            <th>
                                <h6>Salary</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @if (count($pages)>0)
                            @foreach ($pages as $page)


                                <tr>
                                    <td>
                                        <div class="employee-image">
                                            @if (isset($page->image))
                                                <img src="{{Storage::url($page->resizeImage($page->image,640,480))}}" alt="">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="min-width">
                                        <p>{{$page->title}}</p>
                                    </td>
                                    <td class="min-width">
                                        <p><a href="#0">{{$page->sort}}</a></p>
                                    </td>
                                    <td class="min-width">
                                        <p>(405) 555-0128</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{$page->created_at}}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{$page->updated_at}}</p>
                                    </td>
                                    <td>
                                        <div class="action">
                                            <button class="text-danger">
                                                <a href='{{route('pages_edit', ['pages' => $page->id])}}'><i class="lni lni-pencil"></i></a>
                                                <a href='{{route('pages_delete', ['pages' => $page->id])}}'><i class="lni lni-trash"></i></a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- end table row -->

                            @endforeach
                        @endif

                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
