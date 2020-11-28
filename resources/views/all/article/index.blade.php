@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex flex-column align-items-center justify-content-between">

                <a href="{{ route('all.userShow', $item->user->name ) }}">
                    <img src="/assets/static//img/default/no-image.jpg" alt="">
                </a>

                <h3>
                    title : {{ $item->title }}
                </h3>

                <h3>
                    text : {{ $item->text }}
                </h3>

                </div>
            </div>
        </div>
    </section>
@endsection
