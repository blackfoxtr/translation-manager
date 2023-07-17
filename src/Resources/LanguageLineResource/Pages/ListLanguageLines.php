<?php

namespace Gsarigul84\TranslationManager\Resources\LanguageLineResource\Pages;

use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Gsarigul84\TranslationManager\Actions\SynchronizeAction;
use Gsarigul84\TranslationManager\Resources\LanguageLineResource;

class ListLanguageLines extends ListRecords
{
    protected static string $resource = LanguageLineResource::class;

    public function synchronize(): void
    {
        SynchronizeAction::run($this);
    }

    protected function getActions(): array
    {
        return [
            Action::make('quick-translate')
                ->icon('heroicon-o-chevron-right')
                ->label(__('translation-manager::translations.quick-translate'))
                ->url(LanguageLineResource::getUrl('quick-translate')),

            SynchronizeAction::make('synchronize')
                ->action('synchronize'),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [10, 25, 50];
    }
}
