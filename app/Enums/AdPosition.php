<?php

namespace App\Enums;


enum AdPosition: string
{
    case PopUp = 'pop-up';

    // celui au dessus des vidéos dans les catégories
    case SlideCategoryPage = 'slide-category-page';


    // celui au dessus de la vidéo
    case BannerPageVideo = 'banner-page-video';

    // celui en dessous de la vidéo
    case SlidePageVideo = 'slide-page-video';


    case StartVideo = 'start-video';
    case EndVideo = 'end-video';

    // celui sur la home page de l'application mobile
    case AppHomePage = 'app-home-page';

    // celui dans un pop-up pour myGP de l'application mobile
    case AppMyGPPage = 'app-mygp-page';

    public function label(): string
    {
        return match ($this) {
            self::PopUp => 'Dans un Pop-Up',
            self::SlideCategoryPage => 'Au dessus des vidéos dans les catégories',
            self::BannerPageVideo => 'Dans le slide au dessus de la vidéo',
            self::SlidePageVideo => 'Dans le slide en dessous la vidéo',
            self::StartVideo => '15 secondes après le début de la vidéo',
            self::EndVideo => 'À la fin de la vidéo',
            self::AppHomePage => 'Sur la page d\'accueil de l\'application mobile',
            self::AppMyGPPage => 'Dans un pop-up au niveau de myGP dans l\'application mobile',
        };
    }

    public function inVideo(): bool
    {
        return match ($this) {
            self::PopUp => false,
            self::SlideCategoryPage => false,
            self::BannerPageVideo => false,
            self::SlidePageVideo => false,
            self::StartVideo => true,
            self::EndVideo => true,
            self::AppHomePage => false,
            self::AppMyGPPage => false,
        };
    }
}
