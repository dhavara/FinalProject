@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="image">
            <img src="images/berzakat.jpg">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Tunaikan Kewajiban Zakat</h1>
                <h5>"Ambillah zakat dari harta mereka, guna membersihkan dan menyucikan mereka, dan berdoalah untuk
                    mereka. Sesungguhnya doamu itu (menumbuhkan) ketenteraman jiwa bagi mereka. Allah Maha Mendengar,
                    Maha Mengetahui." Q.S At-Taubah : 103</h5>
                <div class="d-flex">
                    <a href="{{ url('/login') }}" class="btn btn-success">
                        <span>Login</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <style>
        body {
            background-image: url('images/6.jpg');
            background-size: cover;
        }

        .container {
            align-items: center;
            justify-content: center;
        }

        img {
            float: left;
            max-width: 50%;
        }

        h1,h5{
            color: white;
        }
        
    </style>
@endsection
