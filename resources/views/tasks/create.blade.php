@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="name" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>

                                <div class="col-md-6">
                                    <select name="priority"  id="" class="form-control" required>
                                        <option value="">Please select ...</option>
                                        <option value="high" >high</option>
                                        <option value="medium" >medium</option>
                                        <option value="low" >low</option>
                                    </select>
                                    @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Timestamp') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="datetime" class="form-control @error('time') is-invalid @enderror"  name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>
                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
