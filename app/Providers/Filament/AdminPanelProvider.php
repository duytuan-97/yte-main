<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Contracts\Plugin;
use Filament\Navigation\MenuItem;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationItem;
use App\Filament\Resources\NewsResource;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\ProductTypeResource;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])

            ->navigationGroups([
                NavigationGroup::make()
                ->label('QUYỀN'),
                NavigationGroup::make()
                ->label('TIN TỨC'),
                NavigationGroup::make()
                ->label('SẢN PHẨM'),
            ])
            ->navigationItems([
                NavigationItem::make('User')
                ->icon('heroicon-o-user')
                ->label('Người dùng')
                ->group('QUYỀN')
                ->url(fn (): string => UserResource::getUrl())
                ->hidden(fn(): bool => ! auth()->user()->can('view User')),
                NavigationItem::make('Permission')
                ->icon('heroicon-o-lock-closed')
                ->label('Quyền')
                ->group('QUYỀN')
                ->url(fn (): string => PermissionResource::getUrl())
                ->hidden(fn(): bool => ! auth()->user()->can('view Permission')),
                NavigationItem::make('ProductType')
                ->icon('heroicon-o-queue-list')
                ->label('Loại sản phẩm')
                ->group('SẢN PHẨM')
                ->url(fn (): string => ProductTypeResource::getUrl())
                ->hidden(fn(): bool => ! auth()->user()->can('view Product Type')),
                NavigationItem::make('Product')
                ->icon('heroicon-o-rectangle-stack')
                ->label('Sản phẩm')
                ->group('SẢN PHẨM')
                ->url(fn (): string => ProductResource::getUrl())
                ->hidden(fn(): bool => ! auth()->user()->can('view Product')),
                NavigationItem::make('News')
                ->icon('heroicon-o-ticket')
                ->label('Tin tức')
                ->group('TIN TỨC')
                ->url(fn (): string => NewsResource::getUrl())
                ->hidden(fn(): bool => ! auth()->user()->can('view News')),
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
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->plugins([
                \Awcodes\Curator\CuratorPlugin::make()
                    ->label('Media')
                    ->pluralLabel('Media')
                    ->navigationIcon('heroicon-o-photo')
                    ->navigationGroup('Content')
                    ->navigationSort(3)
                    ->navigationCountBadge()
                    ->resource(\App\Filament\Resources\ProductResource::class)
            ]);
            // ->plugin(FilamentSpatieRolesPermissionsPlugin::make());
        //     ->tenantMenuItems([
        //     MenuItem::make()
        //     ->label('Roles')
        //     ->hidden(fn (): bool => ! auth()->user()->can('view-permissions'))
        // ]);
    }
}
