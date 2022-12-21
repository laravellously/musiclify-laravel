<?php

use Illuminate\Support\Facades\Route;

// Main (Livewire)
Route::namespace('App\Http\Livewire\Main')->group(function() {

    // Home
    Route::namespace('Home')->group(function() {
    
        // Home
        Route::get('/', HomeComponent::class);
    
    });

    // Blog
    Route::namespace('Blog')->prefix('blog')->group(function() {

        // Index
        Route::get('/', BlogComponent::class);

        // Article
        Route::get('{slug}', ArticleComponent::class);

    });

    // Sellers
    Route::namespace('Sellers')->prefix('sellers')->group(function() {

        // Index
        Route::get('/', SellersComponent::class);

    });

    // Redirect
    Route::namespace('Redirect')->prefix('redirect')->group(function() {

        // To
        Route::get('/', RedirectComponent::class);

    });

    // Newsletter
    Route::namespace('Newsletter')->prefix('newsletter')->group(function() {

        // Verify
        Route::get('verify', VerifyComponent::class);

    });
    
    // Authentication 
    Route::namespace('Auth')->middleware('guest')->prefix('auth')->group(function() {

        // Register
        Route::get('register', RegisterComponent::class);

        // Login
        Route::get('login', LoginComponent::class)->name('login');

        // Verify
        Route::get('verify', VerifyComponent::class);

        // Request verification
        Route::get('request', RequestComponent::class);

        // Password
        Route::namespace('Password')->prefix('password')->group(function() {

            // Reset
            Route::get('reset', ResetComponent::class);

            // Update
            Route::get('update', UpdateComponent::class);

        });

        // Social media
        Route::namespace('Social')->group(function() {

            // Github
            Route::namespace('Github')->prefix('github')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Linkedin
            Route::namespace('Linkedin')->prefix('linkedin')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Google
            Route::namespace('Google')->prefix('google')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Facebook
            Route::namespace('Facebook')->prefix('facebook')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Twitter
            Route::namespace('Twitter')->prefix('twitter')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

        });

    });

    // Logout
    Route::namespace('Auth')->middleware('auth')->prefix('auth')->group(function() {

        // Logout
        Route::get('logout', LogoutComponent::class);

    });

    // Service
    Route::namespace('Service')->prefix('service')->group(function() {

        // Slug
        Route::get('{slug}', ServiceComponent::class)->name('service');

    });

    // Cart
    Route::namespace('Cart')->prefix('cart')->group(function() {

        // cart
        Route::get('/', CartComponent::class);

    });

    // Checkout
    Route::namespace('Checkout')->prefix('checkout')->middleware('auth')->group(function() {

        // Checkout
        Route::get('/', CheckoutComponent::class);

        // Callback
        Route::namespace('Callback')->prefix('callback')->group(function() {

            // Stripe
            Route::get('stripe', StripeComponent::class);

            // Flutterwave
            Route::get('flutterwave', FlutterwaveComponent::class);

            // VNPay
            Route::get('vnpay', VnpayComponent::class);

            // Paytabs
            Route::get('paytabs', PaytabsComponent::class);

        });

    });

    // Account
    Route::namespace('Account')->prefix('account')->middleware('auth')->group(function() {

        // Settings
        Route::namespace('Settings')->group(function() {

            // Index
            Route::get('settings', SettingsComponent::class);

        });

        // Password
        Route::namespace('Password')->group(function() {

            // Index
            Route::get('password', PasswordComponent::class);

        });

        // Profile
        Route::namespace('Profile')->group(function() {

            // Index
            Route::get('profile', ProfileComponent::class);

        });

        // Verification center
        Route::namespace('Verification')->group(function() {

            // Index
            Route::get('verification', VerificationComponent::class);

        });

        // Orders
        Route::namespace('Orders')->prefix('orders')->group(function() {

            // All
            Route::get('/', OrdersComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Requirements
                Route::get('requirements', RequirementsComponent::class);

                // Delivered work
                Route::get('files', FilesComponent::class);

            });

        });

        // Reviews
        Route::namespace('Reviews')->prefix('reviews')->group(function() {

            // Reviews
            Route::get('/', ReviewsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Create
                Route::get('create/{itemId}', CreateComponent::class);

                // Preview
                Route::get('preview/{id}', PreviewComponent::class);

                // Edit
                Route::get('edit/{id}', EditComponent::class);

            });

        });

        // Favorite list
        Route::namespace('Favorite')->prefix('favorite')->group(function() {

            // List
            Route::get('/', FavoriteComponent::class);

        });

        // Billing
        Route::namespace('Billing')->prefix('billing')->group(function() {

            // Billing
            Route::get('/', BillingComponent::class);

        });

        // Refunds
        Route::namespace('Refunds')->prefix('refunds')->group(function() {

            // Refund
            Route::get('/', RefundsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Request
                Route::get('request/{id}', RequestComponent::class);

                // Details
                Route::get('details/{id}', DetailsComponent::class);

            });

        });

        // Deposit
        Route::namespace('Deposit')->prefix('deposit')->group(function() {

            // Deposit
            Route::get('/', DepositComponent::class);

            // History
            Route::get('history', HistoryComponent::class);

        });

    });

    // Create
    Route::namespace('Create')->middleware('auth')->group(function() {

        // Service
        Route::get('create', CreateComponent::class);

    });

    // Start selling
    Route::namespace('Become')->prefix('start_selling')->group(function() {

        // Become seller
        Route::get('/', SellerComponent::class);

    });

    // Seller dashboard
    Route::namespace('Seller')->prefix('seller')->middleware('seller')->group(function() {

        // Home
        Route::namespace('Home')->prefix('home')->group(function() {

            // Index
            Route::get('/', HomeComponent::class);

        });

        // Gigs
        Route::namespace('Gigs')->prefix('gigs')->group(function() {

            // Index
            Route::get('/', GigsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Analytics
                Route::get('analytics/{id}', AnalyticsComponent::class);

                // Edit
                Route::get('edit/{id}', EditComponent::class);

            });

        });

        // Reviews
        Route::namespace('Reviews')->prefix('reviews')->group(function() {

            // Index
            Route::get('/', ReviewsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Details
                Route::get('details/{id}', DetailsComponent::class);

            });

        });

        // Orders
        Route::namespace('Orders')->prefix('orders')->group(function() {

            // Index
            Route::get('/', OrdersComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Details
                Route::get('details/{id}', DetailsComponent::class);

                // Deliver
                Route::get('deliver/{id}', DeliverComponent::class);

                // Requirements
                Route::get('requirements/{id}', RequirementsComponent::class);

            });

        });

        // Portfolio
        Route::namespace('Portfolio')->prefix('portfolio')->group(function() {

            // Index
            Route::get('/', PortfolioComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Create
                Route::get('create', CreateComponent::class);

                // Edit
                Route::get('edit/{id}', EditComponent::class);

            });

        });

        // Earnings
        Route::namespace('Earnings')->prefix('earnings')->group(function() {

            // Index
            Route::get('/', EarningsComponent::class);

        });

        // Withdrawals
        Route::namespace('Withdrawals')->prefix('withdrawals')->group(function() {

            // Index
            Route::get('/', WithdrawalsComponent::class);

            // Settings
            Route::get('settings', SettingsComponent::class);

            // Create
            Route::get('create', CreateComponent::class);

        });

        // Refunds
        Route::namespace('Refunds')->prefix('refunds')->group(function() {

            // Index
            Route::get('/', RefundsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Details
                Route::get('details/{id}', DetailsComponent::class);

            });

        });

    });

    // Help
    Route::namespace('Help')->prefix('help')->group(function() {

        // Contact
        Route::namespace('Contact')->group(function() {

            // Index
            Route::get('contact', ContactComponent::class);

        });

    });

    // Categories
    Route::namespace('Categories')->prefix('categories')->group(function() {

        // Parent category
        Route::get('{parent}', CategoryComponent::class);

        // Subcategory
        Route::get('{parent}/{subcategory}', SubcategoryComponent::class);

    });

    // Profile
    Route::namespace('Profile')->prefix('profile')->group(function() {

        // Username
        Route::get('{username}', ProfileComponent::class);

        // Portfolio
        Route::get('{username}/portfolio', PortfolioComponent::class);

    });

    // Projects
    Route::namespace('Projects')->prefix('projects')->group(function() {

        // Project
        Route::get('{slug}', ProjectComponent::class);

    });

    // Hire
    Route::namespace('Hire')->prefix('hire')->group(function() {

        // skill
        Route::get('{keyword}', HireComponent::class);

    });

    // Messages
    Route::namespace('Messages')->prefix('messages')->middleware('auth')->group(function() {

        // Index
        Route::get('/', MessagesComponent::class);

        // New
        Route::get('new/{username}', NewComponent::class);

        // Conversation
        Route::get('{conversationId}', ConversationComponent::class);

    });

    // Search
    Route::namespace('Search')->prefix('search')->group(function() {

        // Keyword
        Route::get('/', SearchComponent::class);

    });

    // Page
    Route::namespace('Page')->prefix('page')->group(function() {

        // Index
        Route::get('{slug}', PageComponent::class);

    });

    // Reviews
    Route::namespace('Reviews')->prefix('reviews')->group(function() {

        // Index
        Route::get('{id}', ReviewsComponent::class);

    });

});

// Uploads
Route::namespace('App\Http\Controllers\Uploads')->prefix('uploads')->group(function() {

    // Documents
    Route::namespace('Documents')->prefix('documents')->group(function() {

        // Doc
        Route::get('{uid}', 'DocumentController@download');

    });

    // Order requirements
    Route::namespace('Requirements')->prefix('requirements')->middleware('auth')->group(function() {

        // Order requirements
        Route::get('{orderId}/{itemId}/{reqId}/{fileId}', 'RequirementsController@download');

    });

    // Order delivered work
    Route::namespace('Delivered')->prefix('delivered')->middleware('auth')->group(function() {

        // Order delivered
        Route::get('{orderId}/{itemId}/{workId}/{fileId}', 'DeliveredController@download');

    });

    // Verifications
    Route::namespace('Verifications')->prefix('verifications')->group(function() {

        // File
        Route::get('{id}/{type}/{fileId}', 'VerificationsController@download');

    });

});

// Deposit callback
Route::namespace('App\Http\Controllers\Main\Account\Deposit')->prefix('account/deposit/callback')->middleware('auth')->group(function() {

    // Stripe
    Route::get('stripe', 'StripeController@callback');

    // Flutterwave
    Route::get('flutterwave', 'FlutterwaveController@callback');

    // Cashfree
    Route::post('cashfree/token', 'CashfreeController@token');
    Route::post('cashfree', 'CashfreeController@callback');

    // Mollie
    Route::get('mollie', 'MollieController@redirect');
    Route::get('mollie/webhook', 'MollieController@webhook');

    // VNPay
    Route::get('vnpay', 'VNPayController@callback');

    // Paytabs
    Route::get('paytabs/webhook', function(Request $request) {

        \Log::alert($request->all());

    });

});

// Payment methods callback
Route::namespace('App\Http\Controllers\Main\Callback')->prefix('callback')->middleware('auth')->group(function() {

    // Paymob
    Route::get('paymob', 'PaymobController@callback');

    // Paytabs
    Route::get('paytabs/deposit', 'PaytabsController@deposit');
    Route::get('paytabs/checkout', 'PaytabsController@checkout');

    // Jazzcash
    Route::post('jazzcash', 'JazzcashController@callback');

});

// Cashfree checkout callback
Route::post('checkout/callback/cashfree/token', 'App\Http\Controllers\Main\Checkout\CashfreeController@token');

// Mollie checkout callback
Route::get('checkout/callback/mollie/redirect', 'App\Http\Controllers\Main\Checkout\MollieController@redirect');
Route::get('checkout/callback/mollie/webhook', 'App\Http\Controllers\Main\Checkout\MollieController@webhook');