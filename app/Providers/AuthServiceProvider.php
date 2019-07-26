<?php

namespace App\Providers;

use App\Admin\Sections\Cities;
use App\Admin\Sections\Contacts;
use App\Admin\Sections\Permissions;
use App\Admin\Sections\Roles;
use App\Admin\Sections\Users;
use App\Policies\DefaultSectionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Zeus\Admin\Cms\Sections\ZeusAdminComments;
use Zeus\Admin\Cms\Sections\ZeusAdminFiles;
use Zeus\Admin\Cms\Sections\ZeusAdminMenus;
use Zeus\Admin\Cms\Sections\ZeusAdminPages;
use Zeus\Admin\Cms\Sections\ZeusAdminPosts;
use Zeus\Admin\Cms\Sections\ZeusAdminTags;
use Zeus\Admin\Cms\Sections\ZeusAdminTerms;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Cities::class => DefaultSectionPolicy::class,
        Contacts::class => DefaultSectionPolicy::class,
        Permissions::class => DefaultSectionPolicy::class,
        Roles::class => DefaultSectionPolicy::class,
        Users::class => DefaultSectionPolicy::class,
        ZeusAdminComments::class => DefaultSectionPolicy::class,
        ZeusAdminFiles::class => DefaultSectionPolicy::class,
        ZeusAdminMenus::class => DefaultSectionPolicy::class,
        ZeusAdminPages::class => DefaultSectionPolicy::class,
        ZeusAdminPosts::class => DefaultSectionPolicy::class,
        ZeusAdminTags::class => DefaultSectionPolicy::class,
        ZeusAdminTerms::class => DefaultSectionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
