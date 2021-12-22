@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Th3 Un1qu3 M4n</h1> <p>{{ session('status') }}</p>
        </div>
    </div>
    
@endsection