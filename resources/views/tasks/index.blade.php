@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header row">
                      <div class="col">  {{ __('Tasks') }}</div>
                      <div class="col d-flex justify-content-end"><a href="{{route('tasks.create')}}"><i class="fa fa-plus green " data-toggle="tooltip" title="create"></i></a> </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                          <task-component></task-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>

        $(document).ready(function () {
            $(".deleteRecord").click(function () {
                Swal.fire({
                    title: 'alert!',
                    text: "Are your sure delete this Task?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.value) {
                        var id = $(this).data("id");
                        var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax(
                            {
                                url: "/tasks/" + $(this).data("id"),
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": token,
                                },
                                success: function (result) {
                                    var delayInMilliseconds = 1000; //1 second
                                    Swal.fire(
                                        'delete!',
                                        'Task is deleted',
                                        'success'
                                    )
                                    setTimeout(function() {

                                        window.location.replace('/tasks');
                                    }, delayInMilliseconds);

                                }
                            });


                    }
                    else{
                        Swal.fire(
                            'delete!',
                            'You abort deleted',
                            'error'
                        )
                    }
                });

            });
        });
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
@endpush
