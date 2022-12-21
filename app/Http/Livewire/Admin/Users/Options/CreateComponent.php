<?php

namespace App\Http\Livewire\Admin\Users\Options;

use App\Http\Validators\Admin\Users\CreateValidator;
use App\Models\Country;
use App\Models\Level;
use App\Models\User;
use App\Utils\Uploader\ImageUploader;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CreateComponent extends Component
{
    use WithFileUploads, SEOToolsTrait;

    public $username;
    public $email;
    public $password;
    public $account_type;
    public $level;
    public $country;
    public $fullname;
    public $headline;
    public $description;
    public $balance;
    public $avatar;
    public $status = 'active';

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_user'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.users.options.create', [
            'countries' => $this->countries,
            'levels'    => $this->levels,
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get countries
     *
     * @return object
     */
    public function getCountriesProperty()
    {
        return Country::where('is_active', true)->orderBy('name', 'asc')->get();
    }


    /**
     * Get levels
     *
     * @return object
     */
    public function getLevelsProperty()
    {
        return Level::orderBy('title', 'asc')->get();
    }


    /**
     * Create new user
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Get level
            $level = Level::where('id', $this->level)->firstOrFail();

            // This level must be same as account type
            if ($level->account_type !== $this->account_type) {
                
                // Error
                $this->dispatchBrowserEvent('alert',[
                    "message" => __('messages.t_selected_level_not_valid_for_account_type'),
                    "type"    => "error"
                ]);

                return;

            }

            // Check if request has avatar image
            if ($this->avatar) {
                $avatar_id = ImageUploader::make($this->avatar)
                                            ->resize(100)
                                            ->folder('avatars')
                                            ->handle();
            } else {
                $avatar_id = null;
            }

            // create new user
            $user                    = new User();
            $user->uid               = uid();
            $user->username          = $this->username;
            $user->email             = $this->email;
            $user->password          = Hash::make($this->password);
            $user->account_type      = $this->account_type;
            $user->level_id          = $this->level;
            $user->country_id        = $this->country;
            $user->fullname          = $this->fullname;
            $user->headline          = $this->headline;
            $user->description       = $this->description;
            $user->status            = $this->status;
            $user->balance_available = $this->balance;
            $user->avatar_id         = $avatar_id;
            $user->save();

            // Reset form
            $this->reset();

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_account_has_been_created'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_something_went_wrong'),
                "type"    => "error"
            ]);

            throw $th;

        }
    }
    
}
