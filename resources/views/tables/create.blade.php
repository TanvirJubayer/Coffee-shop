<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add Restaurant Table</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                     <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <a href="{{ route('tables.index') }}">
                            <div class="text-tiny">Tables</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Add Table</div></li>
                </ul>
            </div>

            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('tables.store') }}" method="POST">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title mb-10">Table Name / Number</div>
                        <input class="mb-10" type="text" placeholder="e.g. Table 1, VIP A" name="name" required="">
                    </fieldset>

                    <fieldset class="name">
                        <div class="body-title mb-10">Capacity (Persons)</div>
                        <input class="mb-10" type="number" placeholder="4" name="capacity" value="4" required="">
                    </fieldset>

                    <fieldset class="name">
                        <div class="body-title mb-10">Status</div>
                        <div class="select">
                            <select class="mb-10" name="status">
                                <option value="available">Available</option>
                                <option value="occupied">Occupied</option>
                                <option value="reserved">Reserved</option>
                            </select>
                        </div>
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save Table</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
