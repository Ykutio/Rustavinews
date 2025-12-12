<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Rustavi News')
            ->brandLogo(asset('RustaviNewsLogo.png'))
            ->brandLogoHeight('60px')
            ->profile()
            ->navigationGroups([
                NavigationGroup::make('AdminTools')
                    ->collapsed(),
                NavigationGroup::make('Pages')
                    ->collapsed(),
                NavigationGroup::make('Links')
                    ->collapsed(),
            ])
            ->navigationItems([
                NavigationItem::make('About Us')
                    ->url('https://rustavinews.local/', true)
                    ->icon('heroicon-o-identification')
                    ->group('Pages'),
                NavigationItem::make('Contacts')
                    ->url('https://rustavinews.local/', true)
                    ->icon('heroicon-o-phone')
                    ->group('Pages'),
                NavigationItem::make('Google')
                    ->url('https://google.com', true)
                    ->icon('heroicon-o-globe-alt')
                    ->group('Links'),
                NavigationItem::make('Youtube')
                    ->url('https://youtube.com', true)
                    ->icon('heroicon-o-play-circle')
                    ->group('Links'),
            ])
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
