@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Insurance Companies
                    <a href="{{ route('admin.insurances.create') }}" class="btn btn-primary float-right">Add</a>
                </div>
                <div class="card-body">
                    @if (count($insurances) ===0)
                    <p>There are no insurance companies!</p>
                    @else
                    <table id="table-insurances" class="table table hover">
                        <thead>
                            <th>Name</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($insurances as $insurance)
                            <tr data-id="{{ $insurance->id }}">
                                <td>{{ $insurance->name }}</td>

                                <td>
                                    <a href="{{ route('admin.insurances.show', $insurance->id) }}" class="btn btn-default">View</a>
                                    <a href="{{ route('admin.insurances.edit', $insurance->id) }}" class="btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.insurances.destroy', $insurance->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
