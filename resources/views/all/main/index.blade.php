@extends('layouts.app')

@section('head')
    <style>
        .relative.z-0.inline-flex.shadow-sm.rounded-md{
            display: none;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex flex-column align-items-center justify-content-between">


                    @includeWhen(count($articles), 'basic.include.article',
                                    [
                                        'articles' => $articles,
                                        'show' => true
                                    ])


                    {{ $articles->links() }}


                </div>
            </div>
        </div>
    </section>
@endsection
