<?php

namespace App\Filament\Admin\Pages;

use App\Mail\TestMail;
use App\Settings\MailSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Mail;
use Throwable;

use function Filament\Support\is_app_url;

class ManageMail extends SettingsPage
{
    protected static string $settings = MailSetting::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'fluentui-mail-settings-20';

    protected static ?string $navigationGroup = 'General Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->fillForm();
    }

    protected function fillForm(): void
    {
        $this->callHook('beforeFill');

        $data = $this->mutateFormDataBeforeFill(app(static::getSettings())->toArray());

        $this->form->fill($data);

        $this->callHook('afterFill');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Configuration')
                            ->label('Configuration')
                            ->icon('fluentui-calendar-settings-32-o')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\Select::make('driver')->label('Driver')
                                            ->options([
                                                'smtp' => 'SMTP (Recommended)',
                                                'mailgun' => 'Mailgun',
                                                'ses' => 'Amazon SES',
                                                'postmark' => 'Postmark',
                                                'log' => 'logging (Development only)',
                                            ])
                                            // ->native(false)
                                            ->required()
                                            ->columnSpan(2),
                                        Forms\Components\TextInput::make('host')->label('Host')
                                            ->required(),
                                        Forms\Components\TextInput::make('port')->label('Port')
                                            ->required(),
                                        Forms\Components\Select::make('encryption')->label('Encryption')
                                            ->options([
                                                'ssl' => 'SSL',
                                                'tls' => 'TLS',
                                                'null' => 'Null',
                                            ])
                                            // ->native(false)
                                            ->required(),
                                        Forms\Components\TextInput::make('timeout')->label('Timeout'),
                                        Forms\Components\TextInput::make('username')->label('Username'),
                                        Forms\Components\TextInput::make('password')->label('Password')
                                            ->password()
                                            ->revealable(),
                                    ])
                                    ->columns(3),
                            ]),
                    ])
                    ->columnSpan([
                        'md' => 2,
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('From (Sender)')
                            ->label('From (Sender)')
                            ->icon('fluentui-person-mail-48-o')
                            ->schema([
                                Forms\Components\TextInput::make('from_address')->label('Email')
                                    ->required(),
                                Forms\Components\TextInput::make('from_name')->label('Name')
                                    ->required(),
                            ]),

                        Forms\Components\Section::make('Mail to')
                            ->label('Mail to')
                            ->schema([
                                Forms\Components\TextInput::make('mail_to')
                                    ->label('Mail to')
                                    ->hiddenLabel()
                                    ->placeholder('Receiver email..'),
                                //                                    ->required(),
                                Forms\Components\Actions::make([
                                    Forms\Components\Actions\Action::make('Send Test Mail')
                                        ->label('Send Test Mail')
                                        ->action('sendTestMail')
                                        ->color('primary')
                                        ->icon('fluentui-mail-alert-28-o'),
                                ])->fullWidth(),
                            ]),
                    ])
                    ->columnSpan([
                        'md' => 1,
                    ]),
            ])
            ->columns(3)
            ->statePath('data');
    }

    public function save(?MailSetting $settings = null): void
    {
        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            $data = $this->mutateFormDataBeforeSave($data);

            $this->callHook('beforeSave');

            $settings->fill($data);
            $settings->save();

            $settings->loadMailSettingsToConfig($data);

            $this->callHook('afterSave');

            $this->sendSuccessNotification('Mail Settings updated.');

            $this->redirect(static::getUrl(), navigate: FilamentView::hasSpaMode() && is_app_url(static::getUrl()));
        } catch (Throwable $th) {
            $this->sendErrorNotification('Failed to update settings. '.$th->getMessage());
            throw $th;
        }
    }

    public function sendTestMail(?MailSetting $settings = null): void
    {
        $data = $this->form->getState();

        //        $settings->loadMailSettingsToConfig($data);
        try {
            $mailTo = $data['mail_to'];
            $mailData = [
                'title' => 'This is a test email to verify SMTP settings',
                'body' => 'This is for testing email using smtp.',
            ];

            Mail::to($mailTo)->send(new TestMail($mailData));

            $this->sendSuccessNotification('Mail Sent to: '.$mailTo);
        } catch (\Exception $e) {
            $this->sendErrorNotification($e->getMessage());
        }
    }

    public function sendSuccessNotification($title)
    {
        Notification::make()
            ->title($title)
            ->success()
            ->send();
    }

    public function sendErrorNotification($title)
    {
        Notification::make()
            ->title($title)
            ->danger()
            ->send();
    }
}
