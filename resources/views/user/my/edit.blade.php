@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex flex-column align-items-center justify-content-between">

{{--                   @dd($user)--}}

                    <div>
                        <h3>
                            Name : {{ $user->name }}
                        </h3>
                    </div>
                    <div>
                        <h3>
                            Email : {{ $user->email }}
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
