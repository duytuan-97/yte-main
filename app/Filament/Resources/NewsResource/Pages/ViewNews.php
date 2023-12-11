<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNews extends ViewRecord
{
    protected static string $resource = NewsResource::class;
    protected static ?string $title = "Tin tức";

    public function getBreadcrumbs(): array
    {
        return [];
    }

}
