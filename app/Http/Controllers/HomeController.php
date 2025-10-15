<?php

namespace App\Http\Controllers;

use App\Enums\VideoCategory;
use App\Models\Advisory;
use App\Models\Payment;
use App\Models\Slide;
use App\Models\Subscription;
use App\Models\UserSubscription;
use App\Models\Video;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // Afficher la page d'accueil
    public function index()
    {
        $categories = VideoCategory::cases();

        $videosByCategory = [];

        foreach ($categories as $category) {
            $videosByCategory[$category->value] = Video::where('category', $category->value)->orderByDesc('publication_date')->limit(15)->get();
        }

        $latest_videos = Video::orderByDesc('publication_date')->limit(10)->get();

        return view('home', [
            'slides' => Slide::where('visible', true)->orderByDesc('position')->limit(3)->get(),
            'latest_videos' => $latest_videos,
            'videosByCategory' => $videosByCategory,
        ]);
    }

    // Afficher la page à propos
    public function about()
    {
        return view('pages.about');
    }

    // Afficher la page des vidéos
    public function videos()
    {
        return view('pages.videos', [
            'videos' => Video::all(),
        ]);
    }

    public function getVideoOrdered(string $category, string $order_by)
    {
        $videos = Video::whereCategory($category)->orderBy('publication_date', $order_by)->paginate(9);
        return response()->json([
            'html' => view('pages.videos_result', ['videos' => $videos])->render(),
            'status' => 200,
        ]);
    }

    // Afficher la page des vidéos
    public function opinion()
    {
        $advisories = Advisory::where('position', 'slide-category-page')->where('visible', 1)->get();

        $advisoriesImagesUrl = [];

        if ($advisories->count() > 0) {
            foreach ($advisories as $advisory) {
                $advisoriesImagesUrl[] = Storage::url($advisory->file);
            };
        }

        return view('pages.opinion', [
            'videos' => Video::where('category', 'opinion')->orderByDesc('publication_date')->paginate(3),

            'advisoriesImagesUrl' => $advisoriesImagesUrl,
        ]);
    }

    public function events()
    {
        $advisories = Advisory::where('position', 'slide-category-page')->where('visible', 1)->get();

        $advisoriesImagesUrl = [];

        if ($advisories->count() > 0) {
            foreach ($advisories as $advisory) {
                $advisoriesImagesUrl[] = Storage::url($advisory->file);
            };
        }

        return view('pages.events', [
            'videos' => Video::where('category', 'events')->orderByDesc('publication_date')->paginate(3),
            'advisoriesImagesUrl' => $advisoriesImagesUrl,
        ]);
    }
    public function portrait()
    {
        $advisories = Advisory::where('position', 'slide-category-page')->where('visible', 1)->get();

        $advisoriesImagesUrl = [];

        if ($advisories->count() > 0) {
            foreach ($advisories as $advisory) {
                $advisoriesImagesUrl[] = Storage::url($advisory->file);
            };
        }

        return view('pages.portrait', [
            'videos' => Video::where('category', 'portrait')->orderByDesc('publication_date')->paginate(3),
            'advisoriesImagesUrl' => $advisoriesImagesUrl,
        ]);
    }

    public function insolite()
    {
        $advisories = Advisory::where('position', 'slide-category-page')->where('visible', 1)->get();

        $advisoriesImagesUrl = [];

        if ($advisories->count() > 0) {
            foreach ($advisories as $advisory) {
                $advisoriesImagesUrl[] = Storage::url($advisory->file);
            };
        }

        return view('pages.insolite', [
            'videos' => Video::where('category', 'insolite')->orderByDesc('publication_date')->paginate(3),
            'advisoriesImagesUrl' => $advisoriesImagesUrl,
        ]);
    }

    public function videoWatch(string $slug)
    {
        // Récupération de la vidéo par ID
        $video = Video::where('slug', $slug)->firstOrFail()->load('comments');

        $headImages = Advisory::where('position', 'banner-page-video')->where('visible', 1)->get();

        $bottomImages = Advisory::where('position', 'slide-page-video')->where('visible', 1)->get();

        // Retourne la vue avec la vidéo
        return view('pages.video-watch', compact('video', 'headImages', 'bottomImages'));
    }

    public function incrementView(int $videoId)
    {
        // Récupération de la vidéo par ID
        $video = Video::find($videoId);

        if ($video) {
            $video->views += 1;
            $video->save();
            return response()->json();
        } else {
            return response()->json([], 500);
        }
    }

    public function live()
    {
        return view('pages.live');
    }

    // Afficher la page de contact
    public function contact()
    {
        return view('pages.contact');
    }

    // Afficher la page de compte utilisateur
    public function account()
    {
        return view('pages.account');
    }

    // Afficher la page de souscription
    public function subPage(Request $request)
    {
        $paid_videos = $request
            ->user()
            ->payments()
            ->whereNotNull('video_id')
            ->where('isPaymentSucces', true)
            ->with('video') // Charge la relation "video" directement avec les paiements
            ->get();

        $subscriptions = $request->user()->userSubscriptions;

        return view('subscription.sub-page', compact('paid_videos', 'subscriptions'));
    }

    // Afficher la page d'ajout de souscription
    public function subAdd()
    {
        $subscriptions = [];
        foreach (Subscription::all() as $subscription) {
            $subscription = $subscription->toArray();
            $subscription['duration'] = $this->formatToYearMonth($subscription['duration']);
            $subscriptions[] = $subscription;
        }

        return view('subscription.sub-add', compact('subscriptions'));
    }

    // Afficher la page de paiement de souscription
    public function subPay(Request $request)
    {
        if ($request->input('type')) {
            $subscription = Subscription::whereName($request->input('type'))->firstOrFail();
            $subscription = $subscription->toArray();

            if (!$request->input('id')) {
                $subscription['duration'] = $this->formatToYearMonth($subscription['duration']);
                return view('subscription.sub-pay', compact('subscription'));

                /**
                 * Create a Transaction object with the data
                 */
            } else {
                // Configuration de FedaPay
                FedaPay::setApiKey(config('services.fedapay.api_key'));
                FedaPay::setEnvironment(config('services.fedapay.environment'));

                $transaction = Transaction::retrieve($request->input('id'));

                if ($transaction->wasPaid()) {
                    $payment = Payment::where('transaction_id', $request->input('id'))->firstOrFail();
                    $payment->acheved = true;
                    $payment->save();

                    $user_subscription = UserSubscription::create([
                        'user_id' => auth()->user()->id,
                        'start_date' => now(),
                        'end_date' => now()->addMonths($subscription['duration']),
                        'amount_paid' => $subscription['price'],
                        'expired' => false,
                    ]);

                    return view('subscription.sub-pay', compact('subscription'))->with('success');
                } else {
                    return view('subscription.sub-pay', compact('subscription'))->with('error');
                }
            }
        }
    }

    public function mentionsLegales()
    {
        return view('pages.mentions-legales');
    }

    public function politiqueConfidentialite()
    {
        return view('pages.politique-confidentialite');
    }

    public function conditionsUtilisation()
    {
        return view('pages.conditions-utilisation');
    }

    public function formatToYearMonth($months)
    {
        if (is_numeric($months)) {
            $nb_year = (int) floor($months / 12);
            $nb_month = $months % 12;

            $nb_year = $nb_year > 1 ? $nb_year . ' ans' : ($nb_year === 1 ? '1 an' : null);
            $nb_month = $nb_month >= 1 ? $nb_month . ' mois' : null;

            if ($nb_year && $nb_month) {
                return $nb_year . ' et ' . $nb_month;
            }

            return $nb_year ?? ($nb_month ?? 'N/A');
        }

        return 'N/A';
    }
}
