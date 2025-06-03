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
                                <a href="{{route('posts_dashboard')}}">Контакты</a>
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

                    <form class="default-form-style" action="{{route('contacts_dashboard_edit')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="input-style-1">
                            <label>Наименование организации</label>
                            <input type='text' name="company_name" value="{{old('company_name',$contacts->company_name)}}"   required>
                        </div>

                        <div class="input-style-1">
                            <label>УНП</label>
                            <input type='text' name="UNP" value="{{old('UNP',$contacts->UNP)}}"   required>
                        </div>



                       <div class="input-style-1">
                            <label>Адрес</label>
                            <textarea rows="2" name="address">{{old('address',$contacts->address)}}</textarea>
                        </div>
                        <div class="input-style-1">
                            <label>GPS координаты (пример: 52.101268,23.698156)</label>
                            <input type='text' name="coordinates" value="{{old('company_name',$contacts->coordinates)}}"    required>
                        </div>

                        <div class="input-style-1">
                            <label>Телефоны</label>
                            <div id="phones">
                            @if (isset($contacts->phones))
                            @php($phones = unserialize($contacts->phones))
                            @foreach($phones as $key=>$phone)
                                @if (strlen($phone)>3)
                            <input type='text' name="phones[{{$key}}]" value="{{old('phones['.$key.']',$phone)}}" >
                                    @endif
                            @endforeach
                            @else
                                <input type='text' name="phones[]" value="{{old('phones[]')}}" >
                            @endif
                            </div>
                            <div class="main-btn active-btn btn-hover" id="add-phone">Добавить телефон</div>
                        </div>
                        <div class="input-style-1">
                            <label>e-mail</label>
                            <input type='email' name="email" value="{{old('email',$contacts->email)}}"    required>

                        </div>
                        <div class="input-style-1">
                            <label>Банковские реквизиты</label>
                            <textarea rows="2"  name="bank">{{old('bank',$contacts->bank)}}</textarea>
                        </div>
                        <div class="input-style-1">
                            <label>Код CRM-формы</label>
                            <textarea rows="2"  name="crm_form">{{old('crm_form',$contacts->crm_form)}}</textarea>
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

            $("#add-phone").on( "click",function (){
                $('#phones').append('<input type=\'text\' name="phones[]">');
            })
        });
    </script>
@endsection


