@extends('dashboard.dashboard')
@section('title', 'Главная')

@section('main')

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <h2 class="mr-40">Продукты </h2>
                    <a href="{{route('product_dashboard_add')}}" class="main-btn primary-btn btn-hover btn-sm">
                        <i class="lni lni-plus mr-5"></i> Новый продукт</a>
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
                                Продукты
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
                                <h6>Position</h6>
                            </th>
                            <th>
                                <h6>Start Date</h6>
                            </th>
                            <th>
                                <h6>Salary</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @if (count($products)>0)
                            @foreach ($products as $product)
                        <tr>
                            <td>
                                <div class="employee-image">
                                    <img src="assets/images/lead/lead-1.png" alt="">
                                </div>
                            </td>
                            <td class="min-width">
                                <p>{{$product->title}}</p>
                            </td>
                            <td class="min-width">
                                <p><a href="#0">{{$product->rubric->title}}</a></p>
                            </td>
                            <td class="min-width">
                                <p>(405) 555-0128</p>
                            </td>
                            <td class="min-width">
                                <p>Project Manager</p>
                            </td>
                            <td class="min-width">
                                <p>16, Feb, 2020</p>
                            </td>
                            <td>
                                <p>$2345</p>
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
