@extends('layouts.app')

@section('content')


    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x d-flex align-items-center w-100 auto-dismiss" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    

    <div class="accordion mb-4" id="accordionMessage">
        <div class="accordion-item border-dark">
            <h2 class="accordion-header" id="headingForm">
                <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
                    Laisser un message
                </button>
            </h2>
            <div id="collapseForm" class="accordion-collapse collapse show" aria-labelledby="headingForm" data-bs-parent="#accordionMessage">
                <div class="accordion-body">
                    {!! Form::open(['url' => 'contact/submit', 'class' => 'mb-3']) !!}
                        <div class="row mb-3">
                            <div class="input-group col">
                                {{Form::label('author', 'Auteur', ['class' => 'input-group-text'])}}
                                {{Form::text('author', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="input-group col">
                                {{Form::label('subject', 'Sujet', ['class' => 'input-group-text'])}}
                                {{Form::text('subject', '', ['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            {{Form::label('message', 'Message', ['class' => 'input-group-text'])}}
                            {{Form::textarea('message', '', ['class' => 'form-control'])}}
                        </div>
                        <div>
                            {{Form::submit('Publier', ['class' => 'btn btn-primary'])}}
                        </div>
                    {!! Form::close() !!}

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center w-100" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center">Messages</h1>

    <div class="container p-0">
        @if(count($comments) > 0)
            {{ $comments->links() }}
            <div class="row g-4">
                @foreach($comments as $comment)
                    @if(strlen($comment->message) > 1000)
                    <div class="col-12">
                    @elseif(strlen($comment->message) > 500)
                    <div class="col-lg-8 cold-md-12">
                    @else
                    <div class="col-lg-4 cold-md-6">
                    @endif
                        <div class="card rounded-0">
                            <div class="card-header">
                                <div class="row row-cols-auto justify-content-between">
                                    <div class="col fw-bold text-truncate">{{$comment->subject}}</div>
                                    <div class="col fst-italic text-secondary text-truncate">{{$comment->author}}</div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{$comment->message}}
                            </div>
                            <div class="card-footer text-end font-monospace fw-lighter">
                                {{$comment->date}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $comments->links() }}
        @endif
    </div>

@endsection