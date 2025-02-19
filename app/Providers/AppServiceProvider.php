<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Services\UserService::class
        );

        $this->app->bind(
            \App\Interfaces\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );

        $this->app->bind(
            \App\Interfaces\DeviceTypeRepositoryInterface::class,
            \App\Repositories\DeviceTypeRepository::class
        );

        $this->app->bind(
            \App\Interfaces\DeviceRepositoryInterface::class,
            \App\Repositories\DeviceRepository::class
        );

        $this->app->bind(
           \App\Interfaces\DeviceRepositoryInterface::class,
            \App\Services\DeviceService::class
        );

		$this->app->bind(
			\App\Interfaces\DeviceAssignRepositoryInterface::class,
			\App\Repositories\DeviceAssignRepository::class
		);

		$this->app->bind(
			\App\Interfaces\LocationRepositoryInterface::class,
			\App\Repositories\LocationRepository::class
		);

		$this->app->bind(
			\App\Interfaces\LocationNameRepositoryInterface::class,
			\App\Repositories\LocationNameRepository::class
		);

		$this->app->bind(
			\App\Interfaces\MqttServiceInterface::class,
			\App\Services\MqttService::class
		);

		$this->app->bind(
			\App\Interfaces\DeviceLogsRepositoryInterface::class,
			\App\Repositories\DeviceLogsRepository::class
		);

		$this->app->bind(
			\App\Interfaces\DeviceDataRepositoryInterface::class,
			\App\Repositories\DeviceDataRepository::class
		);

		$this->app->bind(
			\App\Interfaces\DashboardServiceInterface::class,
			\App\Services\DashboardService::class
		);

		$this->app->bind(
			\App\Interfaces\NotificationRepositoryInterface::class,
			\App\Repositories\NotificationRepository::class
		);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
