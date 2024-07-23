@extends("layouts.front")

@section("title", "Belgelerimiz")

@push("css")
@endpush

@section("body")
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Anasayfa</a>  /  Kurumsal</span>
                    <h3>BELGELERİMİZ</h3>
                </div>
            </div>
        </div>
    </div>
 <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <img src="{{asset('assets/images/belge1.png')}}" class="img-fluid" alt="Resim 1">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <img src="{{asset('assets/images/belge2.jpg')}}" class="img-fluid" alt="Resim 2">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <img src="{{asset('assets/images/belge3.png')}}" class="img-fluid" alt="Resim 3">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <img src="{{asset('assets/images/belge4.jpg')}}" class="img-fluid" alt="Resim 4">
            </div>
        </div>
    </div>
 </section>
@endsection

@push("js")
@endpush
