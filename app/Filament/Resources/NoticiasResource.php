<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoticiasResource\Pages;
use App\Filament\Resources\NoticiasResource\RelationManagers;
use App\Models\Noticias;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoticiasResource extends Resource
{
    protected static ?string $model = Noticias::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('tituloNoticia'),
                Forms\Components\Textarea::make('contenidoNoticia'),
                Forms\Components\FileUpload::make('fotoNoticia')->image()->imageEditor(),
                Select::make('new_id')
                    ->relationship(name: 'noticiaCategorias', titleAttribute: 'name')->multiple()->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tituloNoticia'),
                Tables\Columns\TextColumn::make('contenidoNoticia'),
                Tables\Columns\ImageColumn::make('fotoNoticia')->width(200)->height(120),
                Tables\Columns\TextColumn::make('noticiaCategorias.name')->badge(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticias::route('/create'),
            'edit' => Pages\EditNoticias::route('/{record}/edit'),
        ];
    }
}
