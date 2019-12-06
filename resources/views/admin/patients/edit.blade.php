@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Edit patient</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>

                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.patients.update', $patient->id) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">



                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $patient->user->name) }}" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $patient->user->email) }}" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $patient->user->password) }}" />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $patient->user->address) }}" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $patient->user->phone) }}" />
                        </div>
                        <div class="form-group">
                            <label for="is_insured">Are you insured?</label>
                            <input type="radio" class="form-control" id="is_insured" name="is_insured" value="1" checked="checked">Yes
                            <input type="radio" class="form-control" id="is_insured" name="is_insured" value="0">No
                        </div>

                        <div class="form-group">
                            <label for="phone">Insurance Policy Number</label>
                            <input type="text" class="form-control" id="insurance_policy_no" name="insurance_policy_no" value="{{ old('insurance_policy_no', $patient->insurance_policy_no) }}" />
                        </div>

                        
                        <div class="form-group">
                            <label for="insurance">Insurance company</label>
                            <select name="insurance_id">
                                @foreach ($insurances as $insurance)
                                <option value="{{ $insurance->id }}" {{ (old('insurance_id', $patient->insurance_id) == $insurance->id) ? "selected" : "" }}>
                                    {{ $insurance->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('admin.patients.index') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
