@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="/assets/static//img/default/no-image.jpg" alt="">
                        </div>
                        <h1>
                            {{ $user->name }}
                        </h1>
                    </div>
                </div>
            </div>

            <div>
                <div class="mb-5">
                    <h3>
                        Статьи
                    </h3>
                </div>

                @includeWhen(count($user->articles), 'basic.include.article', [
                                    'articles' => $user->articles,
                                    'show' => true
                                ])

            </div>


        </div>
    </section>
@endsection
