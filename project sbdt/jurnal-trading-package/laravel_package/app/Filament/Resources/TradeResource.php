<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TradeResource\Pages;
use App\Models\Trade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class TradeResource extends Resource
{
    protected static ?string $model = Trade::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    protected static ?string $navigationLabel = 'Trades';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('pair')
                ->options([
                    'XAUUSD' => 'XAUUSD (Gold)',
                    'BTCUSD' => 'BTCUSD (Bitcoin)',
                ])
                ->required(),
            Forms\Components\DatePicker::make('tanggal')->required(),
            Forms\Components\TextInput::make('metode'),
            Forms\Components\Select::make('arah')
                ->options(['BUY' => 'BUY', 'SELL' => 'SELL']),
            Forms\Components\TextInput::make('timeframe'),
            Forms\Components\TextInput::make('lot')->numeric(),
            Forms\Components\TextInput::make('entry')->numeric(),
            Forms\Components\TextInput::make('sl')->numeric(),
            Forms\Components\TextInput::make('tp')->numeric(),
            Forms\Components\Select::make('hasil_wl')
                ->label('Hasil')
                ->options(['WIN' => 'WIN', 'LOSS' => 'LOSS']),
            Forms\Components\TextInput::make('hasil_rp')->numeric()->label('Hasil (Rp)'),
            Forms\Components\Select::make('emosi')
                ->options([
                    'Tenang' => 'Tenang',
                    'Percaya Diri' => 'Percaya Diri',
                    'Ragu' => 'Ragu',
                    'FOMO' => 'FOMO',
                    'Revenge' => 'Revenge',
                    'Serakah' => 'Serakah',
                ]),
            Forms\Components\Textarea::make('alasan_entry')->columnSpanFull(),
            Forms\Components\Textarea::make('catatan')->columnSpanFull(),
            Forms\Components\TextInput::make('screenshot')->label('Link Screenshot')->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal')->date('d M Y')->sortable(),
                BadgeColumn::make('pair')
                    ->colors([
                        'warning' => 'XAUUSD',
                        'primary' => 'BTCUSD',
                    ]),
                TextColumn::make('metode')->limit(20),
                TextColumn::make('arah'),
                BadgeColumn::make('hasil_wl')
                    ->label('Hasil')
                    ->colors([
                        'success' => 'WIN',
                        'danger' => 'LOSS',
                    ]),
                TextColumn::make('hasil_rp')->label('Hasil (Rp)')->money('idr')->sortable(),
                TextColumn::make('emosi'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pair')->options([
                    'XAUUSD' => 'XAUUSD',
                    'BTCUSD' => 'BTCUSD',
                ]),
                Tables\Filters\SelectFilter::make('hasil_wl')->label('Hasil')->options([
                    'WIN' => 'WIN',
                    'LOSS' => 'LOSS',
                ]),
            ])
            ->defaultSort('tanggal', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrades::route('/'),
            'create' => Pages\CreateTrade::route('/create'),
            'edit' => Pages\EditTrade::route('/{record}/edit'),
        ];
    }
}
