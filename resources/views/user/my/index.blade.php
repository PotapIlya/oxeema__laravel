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
                           {{ Auth::user()->name }}
                       </h1>

                       <a href="{{ route('user.article.create') }}">Create</a>

                   </div>

                   <div>
                       <a href="{{ route('user.my.edit', Auth::user()->name) }}" class="h2">Edit</a>
                   </div>
               </div>
            </div>

            <div>
               <div class="mb-5">
                   <h3>
                       Статьи
                   </h3>
               </div>

                @includeWhen(count($articles), 'basic.include.article', compact('articles'))

            </div>


        </div>
    </section>
@endsection
