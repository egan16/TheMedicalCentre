@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Doctor</h1>
            <div class="card">
                <div class="card-header">
                    Doctor: {{ $doctor->user->name }}
                </div>
                <div class="card-body">
                    <table class="table table hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $doctor->user->email }}</td>
                            </tr>

                            <tr>
                                <td>Address</td>
                                <td>{{ $doctor->user->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $doctor->user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Start date</td>
                                <td>{{ $doctor->start_date }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h1>{{ $doctor->user->name }}'s Visits</h1>
    @foreach ($visits as $visit)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Visit: {{ $visit->date }}
                </div>
                <div class="card-body">
                    <table class="table table hover">
                        <tbody>
                            <tr>
                                <td>Date</td>
                                <td>{{ $visit->date }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ $visit->time }}</td>
                            </tr>
                            <tr>
                                <td>Duration (minutes)</td>
                                <td>{{ $visit->duration }}</td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td>{{ $visit->cost }}</td>
                            </tr>
                            <tr>
                                <td>Doctor</td>
                                <td>{{ $visit->doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Patient</td>
                                <td>{{ $visit->patient->user->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
