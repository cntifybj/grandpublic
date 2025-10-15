@extends('layouts.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <main id="main-content" class="grow lg:pt-0">
        <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20"> <!-- Taille augmentée légèrement -->
            <div class="container">
                <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl uppercase">Vérification Paiement</h1>
                <ol
                    class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                    <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                    <li class="px-[10px]"></li>
                </ol>
            </div>
        </div>
        </div>
        <br><br><br>
        <main id="main-content" class="grow lg:pt-0">
            <section class="pt-14 pb-24 lg:pb-40 lg:pt-20">
                <div class="container">
                    <div class="max-w-3xl mx-auto mt-16 p-8 bg-white shadow-xl rounded-lg">
                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-[#ee1a3b] mb-6">Votre paiement est en cours de traitement</h2>
                            <p class="text-xl text-gray-600 mb-6">Nous avons bien reçu votre demande de paiement et elle est en cours de vérification. Vous pouvez continuer à naviguer sur notre site pendant ce temps.</p>
                            <div class="mt-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-16 w-16 text-[#ee1a3b] mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-opacity=".25" stroke-width="2"></circle>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M4 12a8 8 0 0116 0 8 8 0 01-16 0"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
            </section>
        </main>
        <br>
        <br>
        <br>
    @endsection
