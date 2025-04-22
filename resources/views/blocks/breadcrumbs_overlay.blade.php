<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">@yield('title')</h1>
                    <p>@yield('description')</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="/">Главная</a></li>
                    <li>@yield('title')</li>
                </ul>
            </div>
        </div>
    </div>
</div>
