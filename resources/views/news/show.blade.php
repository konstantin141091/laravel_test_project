@extends('layouts.main')

@section('content')

    <div class="news margin-bottom-30">
        <div class="news__img"> <img src="https://placehold.it/770x410" alt="poster">

        </div>

        <div class="news__title margin-bottom-30 margin-top-30">
            <h3>{{ $news->title }}</h3>
        </div>
        <div class="news__text">
            <p align="justify">{{ $news->text }}</p>
        </div>
        <div class="news__links flex">
            <h3 class="margin-right-20">Share:</h3>
            <ul class="flex ul margin-0 padding-0">
                <li><a href="#"><img src="{{ asset('assets/img/icon-ins.png') }}" alt="social"></a></li>
                <li><a href="#"><img src="{{ asset('assets/img/icon-fb.png') }}" alt="social"></a></li>
                <li><a href="#"><img src="{{ asset('assets/img/icon-tw.png') }}" alt="social"></a></li>
                <li><a href="#"><img src="{{ asset('assets/img/icon-yo.png') }}" alt="social"></a></li>
            </ul>
        </div>
    </div>

@endsection



