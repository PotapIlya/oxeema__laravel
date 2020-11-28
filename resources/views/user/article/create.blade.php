@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex align-items-center justify-content-between">

                    <form method="POST" action="{{ route('user.article.store') }}" class="d-flex flex-column">
                        @csrf
                        @method('POST')

                        <label for="">
                            <input name="title" placeholder="title" type="text">
                        </label>

                        <textarea name="text" id="" cols="30" rows="10"></textarea>

                        <button type="submit">Send</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
