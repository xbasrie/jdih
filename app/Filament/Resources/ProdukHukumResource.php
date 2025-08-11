<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProdukHukum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukHukumResource\Pages;
use App\Filament\Resources\ProdukHukumResource\RelationManagers;

class ProdukHukumResource extends Resource
{
    protected static ?string $model = ProdukHukum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Produk Hukum';

    protected static ?int $navigationSort = 1; // Menentukan urutan navigasi, jika ada resource lain yang ingin diurutkan

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nomor_peraturan')->required(),
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama') // 'kategori' adalah nama fungsi relasi, 'nama' adalah kolom yang ditampilkan
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('tentang')->required()->maxLength(255),
                TextInput::make('tahun')->required()->numeric(),
                Textarea::make('konten')->columnSpanFull(),
                FileUpload::make('path_file')
                    ->label('Upload File (PDF)')
                    ->directory('dokumen-hukum') // Folder penyimpanan di storage
                    ->storeFileNamesIn('nama_file') // Simpan nama asli file ke kolom 'nama_file'
                    ->required()
                    ->acceptedFileTypes(['application/pdf']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_peraturan')->searchable(),
                TextColumn::make('kategori.nama')->sortable()->searchable(),
                TextColumn::make('tentang')->searchable(),
                TextColumn::make('tahun')->sortable(),
                TextColumn::make('konten')->sortable(),
                TextColumn::make('nama_file')->label('Nama File'),
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
            'index' => Pages\ListProdukHukums::route('/'),
            'create' => Pages\CreateProdukHukum::route('/create'),
            'edit' => Pages\EditProdukHukum::route('/{record}/edit'),
        ];
    }
}
