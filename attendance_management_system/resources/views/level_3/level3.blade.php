@extends('layouts.admin')
@section('content')

<div class="container-fluid">

    <div class="btn-group btn-group-toggle float-right" role="group" data-toggle="buttons">
        <div class="dropdown show">
            <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink3s" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ _('3S') }}
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3s">
                <a class="dropdown-item" href="#">Course1</a>
                <a class="dropdown-item" href="#">Course2</a>
                <a class="dropdown-item" href="#">Course3</a>
                <a class="dropdown-item" href="#">Course4</a>
                <a class="dropdown-item" href="#">Course5</a>
                <a class="dropdown-item" href="#">Course6</a>
            </div>
        </div>

        <div class="dropdown show">
            <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink3m" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ _('3M') }}
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3m">
                <a class="dropdown-item" href="#">Course1</a>
                <a class="dropdown-item" href="#">Course2</a>
                <a class="dropdown-item" href="#">Course3</a>
                <a class="dropdown-item" href="#">Course4</a>
                <a class="dropdown-item" href="#">Course5</a>
                {{--<a class="dropdown-item" href="#">Course6</a>--}}
            </div>
        </div>

        <div class="dropdown show">
            <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink3g" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ _('3G') }}
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3g">
                <a class="dropdown-item" href="#">Course1</a>
                <a class="dropdown-item" href="#">Course2</a>
                <a class="dropdown-item" href="#">Course3</a>
            </div>
        </div>
    </div>

    <section>
        <div>
            @yield('levelcontent')
        </div>
    </section>
</div>

@endsection