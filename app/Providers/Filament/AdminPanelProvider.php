<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
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
            ->colors([
                'primary' => '#2d4f32', 
                'gray' => Color::Stone, 
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
                'info' => Color::Indigo,
            ])
            ->brandName('Recicla Admin')
            ->brandLogo(asset('img/logo.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('favicon.ico'))
            ->font('Urbanist') 
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                \App\Filament\Widgets\EcoEstadisticas::class,
                \App\Filament\Widgets\UltimosColaboradores::class, 
                \App\Filament\Widgets\EvolucionColaboradores::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
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

            ->renderHook(
                'panels::head.end',
                fn (): string => Blade::render('<style>
                    /*MODO CLARO*/
                    html:not(.dark) .fi-topbar, 
                    html:not(.dark) .fi-topbar-nav,
                    html:not(.dark) .fi-sidebar-header {
                        background-color: #e6f4ea !important; 
                        border-bottom: 1px solid #cce3d2 !important;
                    }
                    
                    html:not(.dark) .fi-sidebar, 
                    html:not(.dark) .fi-sidebar-nav {
                        background-color: #f4fbf7 !important;
                        border-right: 1px solid #d9ebd9 !important;
                    }
                    
                    html:not(.dark) body, 
                    html:not(.dark) .fi-layout, 
                    html:not(.dark) .fi-main-ctn, 
                    html:not(.dark) .fi-main {
                        background-color: #ffffff !important;
                    }

                    html:not(.dark) .fi-sidebar-item-label {
                        color: #374151 !important;
                    }
                    html:not(.dark) .fi-sidebar-item-icon {
                        color: #2d4f32 !important; /* Verde corporativo primario */
                    }

                    html:not(.dark) .fi-sidebar-item:hover .fi-sidebar-item-button,
                    html:not(.dark) .fi-sidebar-item-button:hover {
                        background-color: #e0ede0 !important;
                    }

                    html:not(.dark) .fi-sidebar-item.fi-active .fi-sidebar-item-button {
                        background-color: #d1e7d1 !important; 
                    }
                    html:not(.dark) .fi-sidebar-item.fi-active .fi-sidebar-item-label,
                    html:not(.dark) .fi-sidebar-item.fi-active .fi-sidebar-item-icon {
                        color: #2d4f32 !important;
                        font-weight: bold !important;
                    }

                    html:not(.dark) .fi-section, 
                    html:not(.dark) .fi-ta-ctn {
                        border-radius: 12px !important;
                        border: 1px solid #e0ede0 !important;
                    }

                    /* MODO OSCURO*/
                    html.dark .fi-topbar, 
                    html.dark .fi-topbar-nav,
                    html.dark .fi-sidebar-header {
                        background-color: #18181b !important; /* Zinc 900 */
                        border-bottom: 1px solid #27272a !important; /* Zinc 800 */
                    }
                    
                    html.dark .fi-sidebar, 
                    html.dark .fi-sidebar-nav {
                        background-color: #18181b !important; 
                        border-right: 1px solid #27272a !important;
                    }
                    
                    html.dark body, 
                    html.dark .fi-layout, 
                    html.dark .fi-main-ctn, 
                    html.dark .fi-main {
                        background-color: #09090b !important; 
                    }

                    html.dark .fi-sidebar-item-label {
                        color: #e4e4e7 !important;
                    }
                    html.dark .fi-sidebar-item-icon {
                        color: #4ade80 !important; 
                    }

                    html.dark .fi-sidebar-item:hover .fi-sidebar-item-button,
                    html.dark .fi-sidebar-item-button:hover {
                        background-color: rgba(74, 222, 128, 0.08) !important;
                    }

                    html.dark .fi-sidebar-item.fi-active .fi-sidebar-item-button {
                        background-color: rgba(22, 101, 52, 0.5) !important; 
                    }
                    html.dark .fi-sidebar-item.fi-active .fi-sidebar-item-label {
                        color: #4ade80 !important;
                        font-weight: bold !important;
                    }
                    
                    html.dark .fi-section, 
                    html.dark .fi-ta-ctn {
                        border-radius: 12px !important;
                        border: 1px solid #27272a !important;
                    }
                </style>')
            )
            
            ->renderHook(
                'panels::user-menu.before',
                fn (): string => Blade::render('
                    <div class="flex items-center mr-4 pr-3 font-semibold text-[#2d4f32] dark:text-[#4ade80] border-r border-[#cce3d2] dark:border-zinc-700">
                        {{ auth()->user()?->name }}
                    </div>
                ')
            );
    }
}