@extends("layouts.auth")

@section("title", "PanuPanel Kayıt Sayfası")
@push('css') @endpush

@section("body")
    <div class="auth-form-wrapper px-4 py-5">
        <a href="#" class="noble-ui-logo d-block mb-2">Otel<span>PANEL</span></a>
        <h5 class="text-muted fw-normal mb-4">Hesap Oluşturma Ekranı</h5>
        <form class="forms-sample" action="{{ route('register') }}" method="POST" ID="registerForm">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Kullanıcı Adı</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Kullanıcı Adı" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Adresi</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parola</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="Password">
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Parola Tekrarı</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"  id="password_confirmation" name="password_confirmation" placeholder="Parola Tekrarı">
                @error('password_confirmation')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="authCheck" name="remember">
                <label class="form-check-label" for="authCheck">
                    Beni Hatırla
                </label>
            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-primary text-white me-2 mb-2 mb-md-0 px-5" id="btnRegister">Kayıt Ol</a>
{{--                <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">--}}
{{--                    <i class="btn-icon-prepend" data-feather="twitter"></i>--}}
{{--                    Sign up with twitter--}}
{{--                </button>--}}
            </div>
            <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Zaten kullanıcı mısınız? Oturum Aç</a>
        </form>
    </div>

@endsection


@push('js')
    <script src="{{ asset('assets/js/auth/register.js') }}"></script>
@endpush

