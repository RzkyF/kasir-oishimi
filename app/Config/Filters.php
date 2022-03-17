<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'adminfilter' => \App\Filters\AdminFilter::class,
        'kasirfilter' => \App\Filters\KasirFilter::class,
        'ownerfilter' => \App\Filters\OwnerFilter::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'adminfilter' => ['except' => [
                'auth', 'auth/*',
                '/'
            ]],
            'kasirfilter' => ['except' => [
                'auth', 'auth/*',
                '/'
            ]],
            'ownerfilter' => ['except' => [
                'auth', 'auth/*',
                '/'
            ]],
        ],
        'after' => [
            // 'toolbar',
            // 'honeypot',
            // 'secureheaders',
            'adminfilter' => ['except' => [
                'home', 'home/*',
                'user', 'user/*',
                'level', 'level/*',
                'food', 'food/*',
                'drink', 'drink/*',
                'transaksi', 'transaksi/*',
            ]],
            'kasirfilter' => ['except' => [
                'home', 'home/*',
                'transaksi', 'transaksi/*',
            ]],
            'ownerfilter' => ['except' => [
                'home', 'home/*',
                'transaksi', 'transaksi/*',
            ]],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
