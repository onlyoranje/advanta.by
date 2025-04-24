<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title d-flex align-items-center flex-wrap">
                <h2 class="mr-40">{{$title}}</h2>

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
                            {{$title}}
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

                @if (count($errors_form)>0)
                    @foreach ($errors_form as $error)
                        <div class="alert alert-warning" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @else
                    <form class="form-ad" action="{{route($route, $id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group button mb-0">
                                    <button type="submit" class="main-btn danger-btn btn-hover">Удалить</button>
                                </div>
                            </div>

                        </div>

                    </form>
                @endif
            </div>
            </div>
            </div>
            </div>
