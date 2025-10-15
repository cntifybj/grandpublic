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
                <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">VOTRE HISTORIQUE</h1>
                <ol
                    class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                    <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                    <li class="px-[10px]"></li>
                </ol>
            </div>
        </div>
        </div>
        <br><br>
        <style>
            :root {
                --primary: #ee1a3b;
                --secondary: #ff4d6d;
                --text-primary: #1f2937;
                --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
            }

            .video-history,
            .subscription-history {

                backdrop-filter: blur(25px);
                border-radius: 1rem;
                padding: 1rem;
                box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.1);
                margin-bottom: 2rem;
            }

            .video-list,
            .subscription-list {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .video-item,
            .subscription-item {
                display: flex;
                flex-wrap: wrap;
                align-items: center;

                padding: 1rem;
                border-radius: 0.75rem;
                border: 1px solid rgba(0, 0, 0, 0.05);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transition: transform 0.2s;
                gap: 1rem;
            }

            .video-item:hover,
            .subscription-item:hover {
                transform: scale(1.01);
            }

            .thumbnail {
                width: 80px;
                height: 80px;
                border-radius: 0.5rem;
                object-fit: cover;
            }

            .video-info,
            .subscription-info {
                flex: 1;
                min-width: 200px;
            }

            .status {
                font-weight: 600;
                padding: 0.25rem 0.5rem;
                border-radius: 0.5rem;
                font-size: 0.85rem;
            }

            .status.active {
                color: #059669;

            }

            .status.inactive {
                color: var(--primary);

            }

            .watch-button {
                background: var(--gradient);
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 0.5rem;
                text-decoration: none;
                font-weight: 700;
                font-size: 0.9rem;
                box-shadow: 0 4px 8px rgba(238, 26, 59, 0.25);
                display: inline-flex;
                align-items: center;
                white-space: nowrap;
            }

            .watch-button::after {
                content: '→';
                margin-left: 0.5rem;
                font-size: 1rem;
            }

            @media (max-width: 640px) {

                .video-item,
                .subscription-item {
                    flex-direction: column;
                    align-items: flex-start;
                    text-align: center;
                }

                .thumbnail {
                    width: 100%;
                    height: 160px;
                    margin-bottom: 1rem;
                }

                .video-info,
                .subscription-info {
                    width: 100%;
                    text-align: left;
                }

                .watch-button {
                    width: 100%;
                    justify-content: center;
                    margin-top: 1rem;
                }
            }
        </style>

        <div class="container mx-auto p-4 dark:bg-gray-900 overflow-hidden">
            <div class="dark:text-white video-history">
                <h2 class="dark:text-white text-2xl md:text-3xl font-bold text-start text-primary mb-4">Vos vidéos payées
                </h2>
                <div class="video-list overflow-hidden">
                    @forelse ($paid_videos as $payment)
                        <div class="video-item">
                            <img src="{{ $payment->video->video_thumbnail }}" alt="Thumbnail" class="thumbnail">
                            <div class="video-info">
                                <h4 class="dark:text-white text-lg font-semibold text-primary">
                                    {{ $payment->video->title }}
                                </h4>
                                <p class="dark:text-white meta">Date d'achat:
                                    <span>{{ \Carbon\Carbon::create($payment->created_at)->format('d F Y') }}</span>
                                </p>
                            </div>
                            <a href="{{ route('video-watch', ['slug' => $payment->video->slug]) }}"
                                class="dark:text-white watch-button">Regardez la vidéo</a>
                        </div>
                    @empty
                        <div class="text-start">
                            <p class="dark:text-white text-lg font-semibold">Aucune vidéo payée disponible pour l'instant.
                            </p>
                            <p class="dark:text-white">Explorez notre collection et commencez à acheter vos vidéos préférées
                                dès maintenant !</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="subscription-history">
                <h3 class="dark:text-white text-2xl md:text-3xl font-bold text-start text-primary mb-4">Vos abonnements</h3>
                <div class="subscription-list">
                    @forelse ($subscriptions as $subscription)
                        <div class="subscription-item">
                            <div class="subscription-info">
                                <p class="dark:text-white text-sm font-medium text-gray-600 dark:text-white mb-2">
                                    <strong>Date
                                        d'abonnement :</strong>
                                    {{ \Carbon\Carbon::create($subscription->start_date)->format('d F Y') }}
                                </p>
                                <p class="dark:text-white text-sm font-medium text-gray-600 dark:text-white mb-4">
                                    <strong>Date
                                        de fin :</strong>
                                    {{ \Carbon\Carbon::create($subscription->end_date)->format('d F Y') }}
                                </p>
                                <p class="dark:text-white text-sm font-medium text-gray-600 dark:text-white mb-4">
                                    <strong>Statut
                                        :</strong> <span
                                        class="font-semibold {{ $subscription->expired ? 'text-[#ee1a3b] dark:text-[#ee1a3b]' : 'text-green-400 dark:text-green-400' }}">{{ $subscription->expired ? 'Désactivé' : 'Active' }}</span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="text-start">
                            <p class="dark:text-white text-lg font-semibold">Vous n'avez souscrit à aucun abonnement pour
                                l'instant.</p>
                            <p class="dark:text-white">Abonnez-vous pour profiter d'un accès exclusif à nos contenus et
                                services premium !</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @endsection
