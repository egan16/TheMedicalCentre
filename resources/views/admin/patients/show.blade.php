@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Patient details</h1>
            <div class="card">
                <div class="card-header">
                    {{ $patient->user->name }}
                </div>
                <div class="card-body">
                    <table class="table table hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $patient->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $patient->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $patient->user->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $patient->user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Insured</td>
                                <td>{{ $patient->is_insured }}</td>
                            </tr>
                            <tr>
                                <td>Insurance Policy Number</td>
                                <td>{{ $patient->insurance_policy_no }}</td>
                            </tr>
                            <tr>
                                <td>Insurance company</td>
                                <td>{{ $patient->insurance->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h1>{{ $patient->user->name }}'s Visits</h1>
    @foreach ($visits as $visit)
    <br>
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
                    <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Back</a>
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
