<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="contact-info">
                            <div class="single-head">
                                <h3 class="inner-title">Наши контакты</h3>
                                <div class="single-info">
                                    <i class="lni lni-home"></i>
                                    <ul>

                                        <li>{{$contact->company_name}}</li>
                                        <li>УНП {{$contact->UNP}}</li>
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="lni lni-map-marker"></i>
                                    <ul>
                                        <span>Адрес</span>
                                        <li>{{$contact->address}}</li>

                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="lni lni-phone"></i>
                                    <ul>
                                        <span>Контакные телефоны</span>
                                        @if (is_array($phones))
                                        @foreach ($phones as $phone)
                                            <li><a href="tel:{{$phone}}">{{$phone}}</a></li>
                                        @endforeach
                                            @endif
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="lni lni-envelope"></i>
                                    <ul>
                                        <span>Электронная почта</span>
                                        <li><a href='mailto:{{$contact->email}}'>{{$contact->email}}</a></li>

                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="lni lni-money-protection"></i>
                                    <ul>
                                        <span>Бансковские реквизиты</span>
                                        <li>{{$contact->bank}}</li>

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <h3 class="inner-title left">Напишите нам</h3>
                            {!! $contact->crm_form !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
