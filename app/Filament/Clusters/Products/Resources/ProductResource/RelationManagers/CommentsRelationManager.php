<?php

namespace App\Filament\Clusters\Products\Resources\ProductResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required()
                    ->searchable(),

                Forms\Components\Toggle::make('is_visible')
                    ->default(true)
                    ->label('Approved for public'),

                Forms\Components\RichEditor::make('content')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('customer.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('Visibility')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->after(function ($record) {
                        /** @var User $user */
                        $user = auth()->user();

                        Notification::make()
                            ->title('New comment')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text')
                            ->body("{$record->customer->name} commented on product ({$record->commentable->name}).")
                            ->sendToDatabase($user);
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('title'),
                TextEntry::make('customer.name'),
                IconEntry::make('is_visible')
                    ->boolean()
                    ->label('Visibility'),
                TextEntry::make('content')
                    ->html()
                    ->prose(),
            ])
            ->columns(1);
    }
}
