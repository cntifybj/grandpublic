<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header pt-4" data-background-color="dark">

            <a href="{{ route('backoffice.index') }}" class="logo">
                <img src="{{ asset('mygp-images/LogoGP.png') }}" alt="navbar brand" class="navbar-brand" height="65px"
                    style="margin-left:70px; border-radius:50%">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>

        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                {{-- <li @class([
                    'nav-item',
                    'active' => request()->routeIs('backoffice.index'),
                ])>
                    <a href="{{ route('backoffice.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li> --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Sections</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#videos">
                        <i class="fas fa-video"></i>
                        <p>Vidéos</p>
                        <span class="caret"></span>
                    </a>
                    <div @class([
                        'collapse' => true,
                        'show' => request()->routeIs([
                            'backoffice.videos.index',
                            'backoffice.videos.create',
                        ]),
                    ]) id="videos">
                        <ul class="nav nav-collapse">
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs('backoffice.videos.index'),
                            ])>
                                <a href="{{ route('backoffice.videos.index') }}">
                                    <i class="fas fa-list"></i>
                                    <span class="sub-item">Liste des vidéos</span>
                                </a>
                            </li>
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs('backoffice.videos.create'),
                            ])>
                                <a href="{{ route('backoffice.videos.create') }}">
                                    <i class="fas fa-plus-circle"></i>
                                    <span class="sub-item">Ajouter une nouvelle vidéo</span>
                                </a>
                            </li>
                            {{-- <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-cog"></i>
                                    <span class="sub-item">Paramètres de vidéos</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#users">
                        <i class="fas fa-users"></i>
                        <p>Utilisateurs</p>
                        <span class="caret"></span>
                    </a>
                    <div @class([
                        'collapse' => true,
                        'show' => request()->routeIs(['backoffice.user.index', 'backoffice.user_message.index']),
                    ]) id="users">
                        <ul class="nav nav-collapse">
                            <li class="ms-3">
                                <a href="{{ route('backoffice.user.index') }}">
                                    <i class="fas fa-list"></i>
                                    <span class="sub-item">Liste des utilisateurs</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="{{ route('backoffice.user_message.index') }}">
                                    <i class="fas fa-list"></i>
                                    <span class="sub-item">Messages (Formulaire de Contact)</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="{{ route('backoffice.user.center_of_interest.index') }}">
                                    <i class="fas fa-list"></i>
                                    <span class="sub-item">Centres d'intérêt (Appli mobile)</span>
                                </a>
                            </li>
                            {{-- <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="sub-item">Ajouter un utilisateur</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-users-cog"></i>
                                    <span class="sub-item">Groupes d’utilisateurs</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-key"></i>
                                    <span class="sub-item">Droits et permissions</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-file-import"></i>
                                    <span class="sub-item">Importer des utilisateurs</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#comments">
                        <i class="fas fa-users"></i>
                        <p>Commentaires</p>
                        <span class="caret"></span>
                    </a>
                    <div @class([
                        'collapse' => true,
                        'show' => request()->routeIs(['backoffice.comment.index']),
                    ]) id="comments">
                        <ul class="nav nav-collapse">
                            <li class="ms-3">
                                <a href="{{ route('backoffice.comment.index') }}">
                                    <i class="fas fa-list"></i>
                                    <span class="sub-item">Liste des commentaires</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#subscribings">
                        <i class="fas fa-dollar-sign"></i>
                        <p>Abonnements</p>
                        <span class="caret"></span>
                    </a>
                    <div @class([
                        'collapse' => true,
                        'show' => request()->routeIs([
                            'backoffice.user_subscription.index',
                            'backoffice.subscription.index',
                        ]),
                    ]) id="subscribings">
                        <ul class="nav nav-collapse">
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs(['backoffice.user_subscription.index']),
                            ])>
                                <a href="{{ route('backoffice.user_subscription.index') }}">
                                    <i class="fas fa-list-alt"></i>
                                    <span class="sub-item">Tous les abonnements</span>
                                </a>
                            </li>
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs(['backoffice.subscription.index']),
                            ])>
                                <a href="{{ route('backoffice.subscription.index') }}">
                                    <i class="fas fa-tasks"></i>
                                    <span class="sub-item">Gestion des plans</span>
                                </a>
                            </li>
                            {{-- <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-receipt"></i>
                                    <span class="sub-item">Facturation des abonnés</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#notifs">
                        <i class="fas fa-bell"></i>
                        <p>Notifications</p>
                        <span class="caret"></span>
                    </a>
                    <div @class(['collapse' => true, 'show' => request()->routeIs([])]) id="notifs">
                        <ul class="nav nav-collapse">
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-paper-plane"></i>
                                    <span class="sub-item">Notifications envoyées</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-plus-circle"></i>
                                    <span class="sub-item">Créer une notification</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-envelope-open-text"></i>
                                    <span class="sub-item">Modèles de notification</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-cogs"></i>
                                    <span class="sub-item">Paramètres de notification</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#slides">
                        <i class="fas fa-images"></i>
                        <p>Slides</p>
                        <span class="caret"></span>
                    </a>
                    <div @class([
                        'collapse' => true,
                        'show' => request()->routeIs([
                            'backoffice.slides.index',
                            'backoffice.slides.create',
                            'backoffice.slide.sort_page',
                        ]),
                    ]) id="slides">
                        <ul class="nav nav-collapse">
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs(['backoffice.slides.index']),
                            ])>
                                <a href="{{ route('backoffice.slides.index') }}">
                                    <i class="fas fa-th-list"></i>
                                    <span class="sub-item">Toutes les slides</span>
                                </a>
                            </li>
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs(['backoffice.slides.create']),
                            ])>
                                <a href="{{ route('backoffice.slides.create') }}">
                                    <i class="fas fa-plus-square"></i>
                                    <span class="sub-item">Ajouter une slide</span>
                                </a>
                            </li>
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs(['backoffice.slides.sort_page']),
                            ])>
                                <a href="{{ route('backoffice.slide.sort_page') }}">
                                    <i class="fas fa-sort"></i>
                                    <span class="sub-item">Organiser les slides</span>
                                </a>
                            </li>
                            {{-- <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-sliders-h"></i>
                                    <span class="sub-item">Paramètres des slides</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#advisories">
                        <i class="fas fa-images"></i>
                        <p>Publicités</p>
                        <span class="caret"></span>
                    </a>
                    <div @class([
                        'collapse' => true,
                        'show' => request()->routeIs([
                            'backoffice.advisories.index',
                            'backoffice.advisories.create',
                        ]),
                    ]) id="advisories">
                        <ul class="nav nav-collapse">
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs(['backoffice.advisories.index']),
                            ])>
                                <a href="{{ route('backoffice.advisories.index') }}">
                                    <i class="fas fa-th-list"></i>
                                    <span class="sub-item">Toutes les pubs</span>
                                </a>
                            </li>
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs(['backoffice.advisories.create']),
                            ])>
                                <a href="{{ route('backoffice.advisories.create') }}">
                                    <i class="fas fa-plus-square"></i>
                                    <span class="sub-item">Ajouter une pub</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @php
                    $current_user_id = request()->cookie('staff_member_id');
                    $current_user = \App\Models\StaffMember::findOrFail($current_user_id);

                    $is_super_admin = $current_user->role === 'super_admin';
                @endphp
                @if ($is_super_admin)
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#admins">
                            <i class="fas fa-user-shield"></i>
                            <p>Administrateurs</p>
                            <span class="caret"></span>
                        </a>
                        <div @class([
                            'collapse' => true,
                            'show' => request()->routeIs(['backoffice.staff.index']),
                        ]) id="admins">
                            <ul class="nav nav-collapse">
                                <li @class([
                                    'ms-3' => true,
                                    'active' => request()->routeIs('backoffice.staff.index'),
                                ])>
                                    <a href="{{ route('backoffice.staff.index') }}">
                                        <i class="fas fa-list-alt"></i>
                                        <span class="sub-item">Gestion des comptes Admins</span>
                                    </a>
                                </li>
                                {{-- <li class="ms-3">
                                    <a href="#">
                                        <i class="fas fa-shield-alt"></i>
                                        <span class="sub-item">Rôles et permissions</span>
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a href="#">
                                        <i class="fas fa-history"></i>
                                        <span class="sub-item">Historique des actions</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                @endif
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#app_notifs">
                        <i class="fas fa-bell"></i>
                        <p>Notifications</p>
                        <span class="caret"></span>
                    </a>
                    <div @class([
                        'collapse' => true,
                        'show' => request()->routeIs(['backoffice.app_notifs.index']),
                    ]) id="app_notifs">
                        <ul class="nav nav-collapse">
                            <li @class([
                                'ms-3' => true,
                                'active' => request()->routeIs('backoffice.app_notifs.index'),
                            ])>
                                <a href="{{ route('backoffice.app_notifs.index') }}">
                                    <i class="fas fa-list-alt"></i>
                                    <span class="sub-item">Gestion des notifications (Application mobile)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#settings">
                        <i class="fas fa-cogs"></i>
                        <p>Paramètres</p>
                        <span class="caret"></span>
                    </a>
                    <div @class(['collapse' => true, 'show' => request()->routeIs([])]) id="settings">
                        <ul class="nav nav-collapse">
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-sliders-h"></i>
                                    <span class="sub-item">Paramètres généraux</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-lock"></i>
                                    <span class="sub-item">Sécurité et confidentialité</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-credit-card"></i>
                                    <span class="sub-item">Paiements et facturation</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-bell"></i>
                                    <span class="sub-item">Paramètres de notification</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-code"></i>
                                    <span class="sub-item">Intégrations API</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#stats">
                        <i class="fas fa-chart-bar"></i>
                        <p>Statistiques</p>
                        <span class="caret"></span>
                    </a>
                    <div @class(['collapse' => true, 'show' => request()->routeIs([])]) id="stats">
                        <ul class="nav nav-collapse">
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-user-check"></i>
                                    <span class="sub-item">Utilisateurs actifs</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-eye"></i>
                                    <span class="sub-item">Vidéos vues</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-dollar-sign"></i>
                                    <span class="sub-item">Abonnements</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-bell"></i>
                                    <span class="sub-item">Notifications envoyées</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-coins"></i>
                                    <span class="sub-item">Revenus générés</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#logs">
                        <i class="fas fa-file-alt"></i>
                        <p>Logs</p>
                        <span class="caret"></span>
                    </a>
                    <div @class(['collapse' => true, 'show' => request()->routeIs([])]) id="logs">
                        <ul class="nav nav-collapse">
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-clipboard-list"></i>
                                    <span class="sub-item">Journal d’activité</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span class="sub-item">Journal des erreurs</span>
                                </a>
                            </li>
                            <li class="ms-3">
                                <a href="#">
                                    <i class="fas fa-plug"></i>
                                    <span class="sub-item">Historique des connexions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('backoffice.auth.do_logout') }}">
                        <i class="icon-logout"></i>
                        <p>Déconnexion</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
