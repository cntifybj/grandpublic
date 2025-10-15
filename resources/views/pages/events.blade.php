{{-- resources/views/videos/events.blade.php --}}

@extends('layouts.app')

@section('content')
    <main id="main-content" class="grow lg:pt-0">
        @livewire('video-filter', ['videoCategory' => 'events'])
    </main>

    <style>
        .main-content {
            background-color: #111827
        }

        .slide-container {
            position: relative;
            overflow: hidden;
            height: 160px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease-in-out;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            margin-top: -20px;
        }

        @media (max-width: 768px) {
            .slide-container {
                height: 100px;
            }
        }

        @media (min-width: 1025px) {
            .slide-container {
                height: 150px;
            }
        }

        @media (max-width: 1023px) {
            #videoGrid {
                margin-top: 50px;
            }
        }

        @-moz-document url-prefix() {
            h1.text-[#ee1a3b] {
                padding-top: 50px;
            }

            .firefox-bottom-space {
                top: 70px;
            }

            #videoGrid {
                margin-top: 40px !important;
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(238, 26, 59, 0.1);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(238, 26, 59, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(238, 26, 59, 0);
            }
        }

        input:focus {
            animation: pulse 2s infinite;
        }

        nav[aria-label="Pagination"] span[aria-current="page"] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #ee1a3b;
            padding: 0.375rem 0.75rem;
            color: white;
            border-radius: 0.375rem;
        }

        nav[aria-label="Pagination"] a {
            padding: 0.375rem 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
        }

        nav[aria-label="Pagination"] a:hover {
            background-color: #ee1a3b;
            color: white;
        }
    </style>
@endsection
