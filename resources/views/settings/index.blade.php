<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Settings</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Settings</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif

                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="business-tab" data-bs-toggle="tab" data-bs-target="#business" type="button" role="tab" aria-controls="business" aria-selected="true">Business Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tax-tab" data-bs-toggle="tab" data-bs-target="#tax" type="button" role="tab" aria-controls="tax" aria-selected="false">Tax & Currency</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="receipt-tab" data-bs-toggle="tab" data-bs-target="#receipt" type="button" role="tab" aria-controls="receipt" aria-selected="false">Receipt Settings</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="system-tab" data-bs-toggle="tab" data-bs-target="#system" type="button" role="tab" aria-controls="system" aria-selected="false">System</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="settingsTabContent">
                        <!-- Business Settings -->
                        <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                            <h5 class="mb-4">Business Information</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Business Name</label>
                                    <input type="text" name="settings[business_name]" class="form-control" value="{{ \App\Models\Setting::get('business_name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="settings[business_email]" class="form-control" value="{{ \App\Models\Setting::get('business_email') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="settings[business_phone]" class="form-control" value="{{ \App\Models\Setting::get('business_phone') }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="settings[business_address]" class="form-control" rows="2">{{ \App\Models\Setting::get('business_address') }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Business Logo</label>
                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                    @if(\App\Models\Setting::get('business_logo'))
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . \App\Models\Setting::get('business_logo')) }}" alt="Logo" style="height: 50px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Tax & Currency -->
                        <div class="tab-pane fade" id="tax" role="tabpanel" aria-labelledby="tax-tab">
                            <h5 class="mb-4">Tax & Currency Configuration</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Tax Rate (%)</label>
                                    <input type="number" step="0.01" name="settings[tax_rate]" class="form-control" value="{{ \App\Models\Setting::get('tax_rate') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Currency Symbol</label>
                                    <input type="text" name="settings[currency_symbol]" class="form-control" value="{{ \App\Models\Setting::get('currency_symbol') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Currency Position</label>
                                    <select name="settings[currency_position]" class="form-select">
                                        <option value="before" {{ \App\Models\Setting::get('currency_position') == 'before' ? 'selected' : '' }}>Before Amount ($100)</option>
                                        <option value="after" {{ \App\Models\Setting::get('currency_position') == 'after' ? 'selected' : '' }}>After Amount (100$)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Receipt Settings -->
                        <div class="tab-pane fade" id="receipt" role="tabpanel" aria-labelledby="receipt-tab">
                            <h5 class="mb-4">Receipt Customization</h5>
                            
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Receipt Header Text</label>
                                    <textarea name="settings[receipt_header]" class="form-control" rows="2">{{ \App\Models\Setting::get('receipt_header') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Receipt Footer Text</label>
                                    <textarea name="settings[receipt_footer]" class="form-control" rows="2">{{ \App\Models\Setting::get('receipt_footer') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="hidden" name="settings[receipt_show_logo]" value="0">
                                        <input class="form-check-input" type="checkbox" name="settings[receipt_show_logo]" value="1" id="showLogo" {{ \App\Models\Setting::get('receipt_show_logo') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="showLogo">
                                            Show Logo on Receipt
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- System Settings -->
                        <div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
                            <h5 class="mb-4">System Settings</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Low Stock Alert Threshold</label>
                                    <input type="number" name="settings[low_stock_threshold]" class="form-control" value="{{ \App\Models\Setting::get('low_stock_threshold') }}">
                                    <div class="form-text">Default threshold for products that don't have a specific override.</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="hidden" name="settings[auto_print_receipt]" value="0">
                                        <input class="form-check-input" type="checkbox" name="settings[auto_print_receipt]" value="1" id="autoPrint" {{ \App\Models\Setting::get('auto_print_receipt') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="autoPrint">
                                            Auto Print Receipt after Order
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <button type="submit" class="tf-button style-1">
                            <i class="icon-save"></i> Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
