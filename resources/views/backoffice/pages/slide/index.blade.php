@extends('backoffice.layouts.main')

@section('page_styles')
    <!-- Bootstrap File Input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/fileinput.min.css') }}" />
@endsection

@section('page_content')
    <div class="container mt-4">
        <div class="row">
            @foreach ($slides as $slide)
                <div class="col-md-4">
                    <div class="card" slide-id="{{ $slide->id }}">
                        <img src="{{ Storage::url($slide->image) }}" class="card-img-top" alt="{{ $slide->header }}">
                        <div class="card-body">
                            <p class="fs-6 mb-1 text-info">
                                Position : <span class="slide-position">{{ $slide->position }}</span>
                                &ensp; | &ensp;
                                Status de visibilité : <span @class([
                                    'ms-2 badge rounded-pill visibility-status' => true,
                                    'text-bg-success' => $slide->visible,
                                    'text-bg-warning' => !$slide->visible,
                                ])>
                                    @if ($slide->visible)
                                        Visible
                                    @else
                                        Masqué
                                    @endif
                                </span>
                            </p>
                            <h3 class="card-title">
                                {{ $slide->header }}
                            </h3>
                            <p class="card-text">
                                {{ $slide->text }}
                            </p>
                            <button type="button" class="btn btn-dark btn-rounded btn-sm" data-bs-toggle="offcanvas"
                                data-bs-target="#editSlide" aria-controls="editSlide">Modifier</button>
                            <button type="button" class="btn btn-danger btn-rounded btn-sm">Supprimer</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Offcanvas d'édition -->
        @include('backoffice.pages.slide.formUpdate')
    </div>
@endsection

@section('page_scripts')
    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Bootstrap File Input JS -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/buffer.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/filetype.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/fileinput.min.js') }}"></script>

    <!-- JQuery Validate Plugin -->
    <script src="{{ asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('assets/backoffice/js/pages/slide/index.js') }}"></script>
@endsection
