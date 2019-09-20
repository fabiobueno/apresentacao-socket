@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="app">
                <messages user="{{ Auth::user()->id }}"></messages>
            </div>
        </div>
    </div>
</div>
@endsection
