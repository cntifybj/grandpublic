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
       <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">MENTIONS LÉGALES </h1>
       <ol class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
           <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
           <li class="px-[10px]"></li>
       </ol>
   </div>
 </div>
</div>
<br><br><br><br>
<div class="container mx-auto p-3">

    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Éditeur du Site :</h2>
    <p class="mb-2"><span class="font-bold">Nom de la Société :</span> MAXMAGIC</p>
    <p class="mb-2"><span class="font-bold">Adresse :</span> Quartier St Michel, Maison Adédjouman Brikissou, carré 505, Cotonou</p>
    <p class="mb-2"><span class="font-bold">Contact :</span> <a href="mailto:info@maxmagic.bj" class="text-blue-600 hover:underline">info@maxmagic.bj</a></p>
    <p class="mb-4"><span class="font-bold">Site Internet :</span> <a href="http://www.maxmagic.bj" class="text-blue-600 hover:underline">www.maxmagic.bj</a></p>

    <!-- Section Hébergeur du Site -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Hébergeur du Site :</h2>
    <p class="mb-2"><span class="font-bold">Nom de l'hébergeur :</span> MOCHAHOST</p>
    <p class="mb-2"><span class="font-bold">Adresse :</span> 2880 Zanker Road, Suite 203, San Jose, California 95134, États-Unis</p>
    <p class="mb-2"><span class="font-bold">Contact :</span> <a href="mailto:support@mochahost.com" class="text-blue-600 hover:underline">support@mochahost.com</a></p>
    <p class="mb-4"><span class="font-bold">Site Internet :</span> <a href="http://www.mochahost.com" class="text-blue-600 hover:underline">www.mochahost.com</a></p>

    <!-- Section Propriété Intellectuelle -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Propriété Intellectuelle :</h2>
    <p class="mb-4">
        Les contenus publiés sur Grand Public (textes, images, vidéos, logos, marques, etc.) sont protégés par les droits de propriété intellectuelle et sont la propriété exclusive de MAXMAGIC ou de ses partenaires. Toute reproduction, distribution, modification, adaptation ou publication des contenus sans autorisation écrite préalable est strictement interdite.
    </p>

    <!-- Section Responsabilité -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Responsabilité :</h2>
    <p class="mb-4">
        MAXMAGIC s’efforce d’assurer la mise à jour et l'exactitude des informations publiées sur Grand Public. Cependant, aucune garantie n'est donnée quant à leur exactitude ou leur exhaustivité. L’utilisateur est seul responsable de l’utilisation qu’il fait des informations disponibles sur le site. MAXMAGIC ne peut être tenu responsable des dommages directs ou indirects résultant de l’utilisation de la plateforme ou de l’impossibilité d’y accéder.
    </p>

    <!-- Section Liens Hypertextes -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Liens Hypertextes :</h2>
    <p class="mb-4">
        Le site Grand Public peut contenir des liens vers des sites tiers. Ces liens sont fournis à titre d'information. MAXMAGIC ne peut être tenu responsable du contenu de ces sites externes.
    </p>

    <!-- Section Données Personnelles -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Données Personnelles :</h2>
    <p class="mb-4">
        Pour en savoir plus sur la collecte et le traitement de vos données personnelles, consultez notre <a href="{{ route('politique.confidentialite') }}" class="text-blue-600 hover:underline">Politique de Confidentialité</a>.
    </p>

    <!-- Section Cookies -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Cookies :</h2>
    <p class="mb-4">
        Le site Grand Public utilise des cookies pour améliorer l’expérience utilisateur et analyser le trafic. Vous pouvez configurer vos préférences en matière de cookies dans les paramètres de votre navigateur.
    </p>

    <!-- Section Droit Applicable -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Droit Applicable :</h2>
    <p class="mb-4">
        Les présentes mentions légales sont régies par le droit du Bénin. En cas de litige, et à défaut de solution amiable, les tribunaux compétents seront ceux du ressort de Cotonou.
    </p>

    <!-- Section Contact -->
    <h2 class="text-2xl font-semibold mt-8 mb-4 dark:text-white">Contact :</h2>
    <p class="mb-4">
        Pour toute question, vous pouvez nous contacter à l’adresse suivante : <a href="mailto:info@maxmagic.bj" class="text-blue-600 hover:underline">info@maxmagic.bj</a>
    </p>
</div>

<br><br><br><br>
@endsection
