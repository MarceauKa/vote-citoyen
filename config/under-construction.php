<?php

return [

    /*
     * Activate under construction mode.
     */
    'enabled' => env('UNDER_CONSTRUCTION_ENABLED', true),

    /*
     * Hash for the current pin code
     */
    'hash' => env('UNDER_CONSTRUCTION_HASH', null),

    /*
     * Under construction title.
     */
    'title' => 'Bientôt !',

    /*
     * Back button translation.
     */
    'back-button' => 'effacer',

    /*
    * Show button translation.
    */
    'show-button' => 'voir',

    /*
     * Hide button translation.
     */
    'hide-button' => 'cacher',

    /*
     * Show loader.
     */
    'show-loader' => true,

    /*
     * Redirect url after a successful login.
     */
    'redirect-url' => '/',

    /*
     * Enable throttle (max login attempts).
     */
    'throttle' => true,

        /*
        |--------------------------------------------------------------------------
        | Throttle settings (only when throttle is true)
        |--------------------------------------------------------------------------
        |
        */

        /*
        * Set the amount of digits (max 6).
        */
        'total_digits' => 4,

        /*
         * Set the maximum number of attempts to allow.
         */
        'max_attempts' => 3,

        /*
         * Show attempts left.
         */
        'show_attempts_left' => false,

        /*
         * Attempts left message.
         */
        'attempts_message' => 'Essais restant : %i',

        /*
         * Too many attempts message.
         */
        'seconds_message' => 'Trop de tentatives, patientez %i secondes.',

        /*
         * Set the number of minutes to disable login.
         */
        'decay_minutes' => 5,

        /*
         * Prevent the site from being indexed by Robots when locked
         */
        'lock_robots' => true,
];
