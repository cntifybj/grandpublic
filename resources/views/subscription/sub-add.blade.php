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
                <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">
                    SOUSCRIPTION</h1>
                <ol
                    class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                    <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                    <li class="px-[10px]"></li>
                </ol>
            </div>
        </div>
        </div>
        <br>
        <section class="relative pt-14 lg:pt-35">
            <div class="text-center py-3 px-4 md:px-8 mb-8 text-primary dark:text-white">
                <p class="">Accédez à des fonctionnalités exclusives en vous abonnant !</p>
                <p class="">Choisissez le plan qui vous convient et profitez d’un accès illimité à nos contenus vidéo
                    exclusifs.</p>
            </div>

            <br>
            <br>
            <div class="container flex justify-center items-center mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($subscriptions as $index => $subscription)
                        <div
                            class="relative bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden p-6 md:p-10 text-start">
                            <img src="mygp-images/logo-gp.png" alt="Logo" class="w-15 h-16 mb-4" />
                            <h1 class="font-bold text-2xl sm:text-3xl text-primary dark:text-white mb-2">
                                {{ $subscription['name'] }}</h1>
                            <h2 class="font-bold text-lg sm:text-xl text-primary dark:text-white">
                                {{ $subscription['duration'] }}</h2>
                            <p class="text-3xl sm:text-4xl font-extrabold text-primary dark:text-white mb-4">
                                {{ $subscription['price'] }} XOF</p>
                            <p class="dark:text-white text-sm sm:text-base mb-6">{{ $subscription['short_description'] }}</p>

                            @auth
                                @php
                                    $payment_link = route('sub-pay') . '?type=' . $subscription['name'];
                                @endphp
                                <button type="button" onclick="return window.location.href='{{ $payment_link }}' "
                                    class="rounded-lg block w-full {{ $loop->index === 2 ? 'bg-black' : 'bg-[#ee1a3b]' }} py-4 text-lg font-bold text-white transition-colors hover:bg-opacity-90 transform hover:-translate-y-1">
                                    Abonnez-vous
                                </button>
                            @endauth

                            @guest
                                <button onclick="showModal()"
                                    class="rounded-lg block w-full {{ $loop->index === 2 ? 'bg-black' : 'bg-[#ee1a3b]' }} py-4 text-lg font-bold text-white transition-colors hover:bg-opacity-90 transform hover:-translate-y-1">
                                    Abonnez-vous
                                </button>
                            @endguest

                        </div>
                    @endforeach
                    <br><br><br>
                    <div class="col-span-1 md:col-span-3">
                        <p class="text-center text-primary dark:text-white" style="font-size: 17px;">
                            Rejoignez Grand Public et vivez l’expérience sans limite !
                        </p>
                    </div>
                </div>

            </div>

            <!-- Modal de connexion -->
            <div id="loginModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 text-center">
                    <h2 class="text-lg font-bold text-primary dark:text-white mb-4">Connexion requise</h2>
                    <p class="mb-4 dark:text-white">Pour vous abonner, veuillez vous connecter.</p>
                    <div class="flex justify-center space-x-4">
                        <button onclick="window.location='{{ route('login_page', ['redirect' => url()->current()]) }}'"
                            class="bg-[#ee1a3b] text-white py-2 px-4 rounded-lg">
                            Connectez-vous
                        </button>
                        <button onclick="closeModal()" class="bg-black text-white py-2 px-4 rounded-lg">
                            Fermez
                        </button>
                    </div>
                </div>
            </div>
            <!-- Fin Modal -->

            <script>
                function showModal() {
                    // Stocke l'URL actuelle dans la session Laravel
                    fetch('{{ route('set.redirect') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            redirect: window.location.href
                        })
                    });

                    document.getElementById('loginModal').classList.remove('hidden');
                }


                function closeModal() {
                    document.getElementById('loginModal').classList.add('hidden');
                }
            </script>
        @endsection
