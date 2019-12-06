@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as a patient!
                    <br>
                    Hi {{ Auth::user()->name }}
                    <br>
                    Email: {{ Auth::user()->email }}
                    <br>
                     <a href="{{ route('patient.visits.index') }}">View your visits </a>
                     {{-- <a href="{{ route('patient.visits.index', $patient->id) }}">View your visits </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
