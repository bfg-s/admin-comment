<?php

namespace Admin\Extend\AdminComment;

use Admin\ExtendProvider;
use Admin\Core\ConfigExtensionProvider;
use Admin\Extend\AdminComment\Extension\Config;
use Admin\Extend\AdminComment\Extension\Install;
use Admin\Extend\AdminComment\Extension\Navigator;
use Admin\Extend\AdminComment\Extension\Uninstall;
use Exception;

/**
 * Class ServiceProvider
 * @package Admin\Extend\AdminComment
 */
class ServiceProvider extends ExtendProvider
{
    /**
     * Extension ID name
     * @var string
     */
    public static string $name = "bfg/admin-comment";

    /**
     * Extension call slug
     * @var string
     */
    static string $slug = "bfg_admin_comment";

    /**
     * Extension description
     * @var string
     */
    public static string $description = "Bfg admin comment complect";

    /**
     * @var string
     */
    protected string $navigator = Navigator::class;

    /**
     * @var string
     */
    protected string $install = Install::class;

    /**
     * @var string
     */
    protected string $uninstall = Uninstall::class;

    /**
     * @var ConfigExtensionProvider|string
     */
    protected string|ConfigExtensionProvider $config = Config::class;

    /**
     * @return void
     * @throws Exception
     */
    public function boot(): void
    {
        parent::boot();

        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}

