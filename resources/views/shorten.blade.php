@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Test task</h1>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="url-address" class="form-label">Input URL</label>
                <input type="email" name="address" class="form-control" id="url-address">
                <span class="invalid-feedback d-none text-danger" id="error">URL was invalid</span>
            </div>
        </div>
        <div class="col-12" >
            <div class="mb-3 d-none" id="sh-link">
                <button class="btn btn-success" id="copy" type="button">Copy</button>

                {{--                    <input type="email" class="form-control " id="short-link">--}}
            </div>
        </div>
        <div class="col-12 text-center">
            <button type="submit" id="getUrl" class="btn btn-primary">Generate shorten link</button>
            <a href="{{ asset('statistics') }}" class="btn btn-primary">Statistics</a>
        </div>

    </div>
</div>

@endsection
