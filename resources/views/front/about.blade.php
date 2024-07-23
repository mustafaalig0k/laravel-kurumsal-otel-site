@extends("layouts.front")

@section("title", "Ürün Listesi")

@push("css")
@endpush

@section("body")
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Anasayfa</a>  /  Kurumsal</span>
                    <h3>HAKKIMIZDA</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h6>| Hakkımızda</h6>
                    </div>
                    <p>
                        1500'lerden beri kullanılmakta olan standard Lorem Ipsum metinleri ilgilenenler için yeniden üretilmiştir.
                        Çiçero tarafından yazılan 1.10.32 ve 1.10.33 bölümleri de 1914 H. Rackham çevirisinden alınan İngilizce sürümleri
                        eşliğinde özgün biçiminden yeniden üretilmiştir. Yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz.
                        Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır.
                        Virginia'daki Hampden-Sydney College'dan Latince profesörü Richard McClintock, Bu kitap, ahlak kuramı üzerine bir
                        tezdir ve Rönesans döneminde çok popüler olmuştur. Lorem Ipsum pasajının ilk satırı olan "Lorem ipsum dolor sit
                        amet" 1.10.32 sayılı bölümdeki bir satırdan gelmektedir.
                    </p>
                    <div class="col-lg-6 img-fluid">
                        <img src="{{asset('assets/images/room-caro1.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("js")
@endpush
