@extends('layouts.admin')
@section('pagetitle','level-update')
@section('content')
<link href="{{ asset('css/level-update.css') }}" rel="stylesheet">

<div class="cards-list">

    <div class="card 1">
        <div class="card_image" style="background:#6eadd4;"></div>
        <div class="card_title">
            <a href="#" class="title-white" onclick="Updatefour()">4</a>
        </div>
    </div>

    <div class="card 2">
        <div class="card_image" style="background:#4aada9;"></div>
        <div class="card_title">
            <a href="#" class="title-white" data-toggle="modal" data-target="#level3">3</a>
        </div>
    </div>

    <div class="card 3">
        <div class="card_image" style="background:#6eadd4;"></div>
        <div class="card_title">
            <a href="#" class="title-white" data-toggle="modal" data-target="#level2">2</a>
        </div>
    </div>

    <div class="card 4">
        <div class="card_image" style="background:#4aada9;"></div>
        <div class="card_title">
            <a href="#" class="title-white" onclick="Updateone()">1</a>
        </div>
    </div>

</div>

<div class="modal fade bd-example-modal-lg" id="level3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Level-3 to Level-4</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" style="color:green">
                    <p>First, are you update level 4? (first you are update level 4 then update level 3)</p>
                </div>
                <h2>Whose go to level-3S to level-4S</h2>
                <form action="{{ url('/level-3/update') }}" Method="POST">
                @csrf
                    <div class="form-group row">
                        {{--<label for="threetofour" class="col-lg-3 col-form-label text-lg-right">Attendance Mark</label>--}}
                        @foreach($students_3s as $student)
                            <label for="{{ $student -> st_regno }}" class="col-lg-3 col-md-5 text-center list-inline-item.">
                                <input id="{{ $student -> st_regno }}" class="required" name="threetofour[]" type="checkbox" value="{{ $student -> st_id }}"
                                {{-- in_array($student -> st_regno, old('threetofour', optional($attendance3SStudent)->threetofour) ?: []) ? 'checked' : '' --}}>
                                {{ $student -> st_regno }}
                            </label>
                        @endforeach
                    </div>
                    <div class="form-group row justify-content-end">
                        <button class="btn btn-info" type="submit">Upgrade</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="level2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Level-3 to Level-4</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" style="color:green">
                    <p>First, are you update level 3? (first you are update level 3 then update level 2)</p>
                </div>
                <h2>Whose go to level-2G to level-3M</h2>
                <form action="{{ url('/level-2/update') }}" Method="POST">
                @csrf
                    <div class="form-group row">
                        {{--<label for="twotothree" class="col-lg-3 col-form-label text-lg-right">Attendance Mark</label>--}}
                        @foreach($students_2g as $student)
                            <label for="{{ $student -> st_regno }}" class="col-lg-3 col-md-5 text-center list-inline-item.">
                                <input id="{{ $student -> st_regno }}" class="required" name="twotothree[]" type="checkbox" value="{{ $student -> st_id }}"
                                {{-- in_array($student -> st_regno, old('twotothree', optional($attendance3SStudent)->threetofour) ?: []) ? 'checked' : '' --}}>
                                {{ $student -> st_regno }}
                            </label>
                        @endforeach
                    </div>
                    <div class="form-group row justify-content-end">
                        <button class="btn btn-info" type="submit">Upgrade</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    function Updatefour() {
        if (confirm("Are you sure you want to update this level 4?")) {
            window.location.href = "{{ url('/level-4/update') }}";
        } else {
            window.location.href = "{{ url('/level/update') }}";
        }
    }

    function Updateone() {
        if (confirm("First, are you update level 2? (first you are update level 2 then update level 1)")) {
            window.location.href = "{{ url('/level-1/update') }}";
        } else {
            window.location.href = "{{ url('/level/update') }}";
        }
    }
</script>



{{--<div class="col-md-6">
                <div class="item d-flex align-items-center">
                    <div class="con">
                        <div class="cardz">
                            <div class="face face1">
                                <div class="content">
                                    <div class="icon" style="background:#4aada9;">
                                        <i class="faa">Level</i>
                                    </div>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content align-items-center">
                                    <div class="content">
                                        <form action="{{ url('/seme-update') }}" method="POST">
@csrf
<div class="form-group row">
    <label for="semester" class="col-lg-12 col-form-label text-center">
        <h1>{{ __('LEVEL') }}</h1>
        <hr />
    </label>
</div>
<div class="content">
    <a class="btn btn-lg" href="{{ url('/level-update') }}" role="button"
        style="background:#00FF7F; color:#FFF;">{{ __('Update') }}</a>
</div>
</form>
</div>

</div>
</div>
</div>
</div>
</div>
</div>--}}
@endsection
