@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit task') }} - {{$task->name}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update',$task->id) }}">
                            @csrf
                           @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ old('name',$task->name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>

                                <div class="col-md-6">
                                    <select name="priority"  id="" class="form-control" required>
                                        <option value="">Please select ...</option>
                                        <option value="high" @if($task->priority == 'high') selected @endif>high</option>
                                        <option value="medium" @if($task->priority == 'medium') selected @endif>medium</option>
                                        <option value="low" @if($task->priority == 'low') selected @endif>low</option>
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
                                    <input id="time" type="datetime" class="form-control @error('time') is-invalid @enderror"  name="time" value="{{ old('time',$task->time) }}" required autocomplete="time" >
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
