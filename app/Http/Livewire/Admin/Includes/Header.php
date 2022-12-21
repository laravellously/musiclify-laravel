<?php

namespace App\Http\Livewire\Admin\Includes;

use App\Models\Gig;
use App\Models\Refund;
use App\Models\ReportedGig;
use App\Models\ReportedUser;
use App\Models\User;
use App\Models\UserPortfolio;
use App\Models\UserWithdrawalHistory;
use App\Models\VerificationCenter;
use Livewire\Component;

class Header extends Component
{

    public $pending_gigs;
    public $pending_users;
    public $pending_verifications;
    public $pending_withdrawals;
    public $pending_portfolios;
    public $pending_refunds;
    public $reported_gigs;
    public $reported_users;
    
    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Count pending gigs
        $this->pending_gigs          = Gig::where('status', 'pending')->count();

        // Count pending users
        $this->pending_users         = User::where('status', 'pending')->count();

        // Count pending verification
        $this->pending_verifications = VerificationCenter::where('status', 'pending')->count();

        // Count pending withdrawals
        $this->pending_withdrawals   = UserWithdrawalHistory::where('status', 'pending')->count();

        // Count pending portfolios
        $this->pending_portfolios    = UserPortfolio::where('status', 'pending')->count();

        // Count pending refunds
        $this->pending_refunds       = Refund::where('status', 'pending')->count();

        // Count reported gigs
        $this->reported_gigs         = ReportedGig::where('status', 'pending')->count();

        // Count reported users
        $this->reported_users        = ReportedUser::where('is_seen', false)->count();
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin.includes.header');
    }
    
}
