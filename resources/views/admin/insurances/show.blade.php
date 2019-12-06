@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Insurance Company: {{ $insurance->name }}

                </div>
                <div class="card-body">

                    <table class="table table hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $insurance->name }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <a href="{{ route('admin.insurances.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.insurances.edit', $insurance->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.insurances.destroy', $insurance->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
