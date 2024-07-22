@extends('layout.main')

@section('the_content')
    <div class="container my-2">
        <div class="row">
            <div class="col">
                <a href="{{ route('beer-list') }}" class="btn btn-primary" >
                    Vedi tutte le birre
                </a>
            </div>
        </div>
    </div>
@endsection