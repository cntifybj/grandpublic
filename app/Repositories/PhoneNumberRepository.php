<?php

namespace App\Repositories;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class PhoneNumberRepository
{

    static public function getCountryCode($phoneNumber)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            // Parse le numéro de téléphone
            $numberProto = $phoneUtil->parse($phoneNumber, null);
            // Récupérer le code pays (par exemple, "BJ" pour le Bénin)
            $countryCode = $phoneUtil->getRegionCodeForNumber($numberProto);
            return strtoupper($countryCode); // Conversion en majuscules
        } catch (NumberParseException $e) {
            return null; // Retourne null en cas d'erreur
        }
    }

    static public function getPhoneNumber($phoneNumber)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            // Parse le numéro de téléphone
            $numberProto = $phoneUtil->parse($phoneNumber, null);
            // Récupérer le numéro sans le code pays
            return $numberProto->getNationalNumber();
        } catch (NumberParseException $e) {
            return null; // Retourne null en cas d'erreur
        }
    }
}
