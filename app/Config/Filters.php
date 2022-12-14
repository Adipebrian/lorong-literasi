<?php

namespace Config;

use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\Honeypot;
use Myth\Auth\Filters\RoleFilter;
use CodeIgniter\Config\BaseConfig;
use Myth\Auth\Filters\LoginFilter;
use CodeIgniter\Filters\DebugToolbar;
use Myth\Auth\Filters\PermissionFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'login'      => LoginFilter::class,
        'role'       => RoleFilter::class,
        'permission' => PermissionFilter::class,
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
            // 'login'
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
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
    public $filters = [
        // 'login' => ['before' => ['user/*','konfirmasi/*','mybook/*','notif/*','peminjaman/*','pengembalian/*','poin/*','pushnotif/*']],
    ];
}
