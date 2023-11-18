<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Expense;
use App\Models\Revenues;
use App\Policies\BankPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\ExpensePolicy;
use App\Policies\RevenuesPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Bank::class => BankPolicy::class,
        Revenues::class=>RevenuesPolicy::class,
        Company::class=>CompanyPolicy::class,
        Expense::class=>ExpensePolicy::class

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
