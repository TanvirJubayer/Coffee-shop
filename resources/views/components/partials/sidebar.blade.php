                <!-- section-menu-left -->
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{ route('admin.dashboard') }}" id="site-logo-inner">
                            <img class="" id="logo_header" alt=""
                                src="{{ asset('images') }}/logo/logo.png"
                                data-light="{{ asset('images') }}/logo/logo.png"
                                data-dark="{{ asset('images') }}/logo/logo-dark.png">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="section-menu-left-wrap">
                        <div class="center">
                            <div class="center-item">
                                <div class="center-heading">Main Home</div>
                                <ul class="menu-list">
                                    <li class="menu-item active">
                                        <a href="{{ route('admin.dashboard') }}" class="">
                                            <div class="icon"><i class="icon-grid"></i></div>
                                            <div class="text">Dashboard</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('pos.index') }}" class="">
                                            <div class="icon"><i class="icon-monitor"></i></div>
                                            <div class="text">POS System</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="center-item">
                                <div class="center-heading">Management</div>
                                <ul class="menu-list">
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-shopping-cart"></i></div>
                                            <div class="text">Menu Management</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="{{ route('products.index') }}" class="">
                                                    <div class="text">Product List</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{ route('products.create') }}" class="">
                                                    <div class="text">Add Product</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{ route('categories.index') }}" class="">
                                                    <div class="text">Categories</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-layers"></i></div>
                                            <div class="text">Inventory</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="{{ route('inventory.index') }}" class="">
                                                    <div class="text">Stock List</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{ route('suppliers.index') }}" class="">
                                                    <div class="text">Suppliers</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-file-plus"></i></div>
                                            <div class="text">Orders</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="oder-list.html" class="">
                                                    <div class="text">Order List</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="oder-detail.html" class="">
                                                    <div class="text">Order Detail</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-user"></i></div>
                                            <div class="text">Staff Management</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="all-user.html" class="">
                                                    <div class="text">All Staff</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="add-new-user.html" class="">
                                                    <div class="text">Add New Staff</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="all-roles.html" class="">
                                                    <div class="text">Roles</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="report.html" class="">
                                            <div class="icon"><i class="icon-pie-chart"></i></div>
                                            <div class="text">Reports</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="center-item">
                                <div class="center-heading">System</div>
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a href="setting.html" class="">
                                            <div class="icon"><i class="icon-settings"></i></div>
                                            <div class="text">Settings</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bot text-center">
                            <div class="wrap">
                                <div class="mb-20">
                                    <img src="{{ asset('images') }}/menu-left/img-bot.png" alt="">
                                </div>
                                <div class="mb-20">
                                    <h6>Hi, how can we help?</h6>
                                    <div class="text">Contact us if you have any assistance, we will contact you as
                                        soon as possible</div>
                                </div>
                                <a href="#" class="tf-button w-full">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /section-menu-left -->
