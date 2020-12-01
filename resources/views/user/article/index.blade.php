@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <a class="h1" href="{{ route('user.article.create') }}">
                    Create
                </a>

                <div class="col-md-8 d-flex flex-column align-items-center justify-content-between">


                    @includeWhen(count($articles), 'basic.include.article', compact('articles'))

                </div>
            </div>
        </div>
    </section>
@endsection
