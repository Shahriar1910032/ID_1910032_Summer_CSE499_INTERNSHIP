<!--Page Title-->
<section class="page-title centred"
    style="background-image: url('{{ asset('application/public/frontend/assets/images/background/page-title-5.jpg') }}');">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{ $pageTitle }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                <li>{{ $pageTitle }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
