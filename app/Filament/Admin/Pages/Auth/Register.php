<?php

namespace App\Filament\Admin\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms;

class Register extends BaseRegister
{    
    /**
     * @return array<int | string, string | Form>
     */
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        Forms\Components\TextInput::make('dni')
                            ->required()
                            ->maxLength(20),
                        $this->getEmailFormComponent(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(10),
                        Forms\Components\DatePicker::make('birth_date')
                            ->required(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        Forms\Components\FileUpload::make('avatar')
                            ->required()
                            ->image(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
}