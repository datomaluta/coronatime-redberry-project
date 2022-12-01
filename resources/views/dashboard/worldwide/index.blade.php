<x-dashboard-layout>
    <div class="mt-10 grid grid-cols-3 gap-x-6 sm:gap-x-4 gap-y-4 sm:grid-cols-2 fir">
        <x-dashboard.stat-box class="bg-brand-primary text-brand-primary sm:col-span-2" 
        name="new_cases" count="{{number_format($data['confirmed'])}}">
            <x-svgs.newcases />
        </x-dashboard.stat-box>

        <x-dashboard.stat-box class="bg-brand-secondary text-brand-secondary"
        name="recovered" count="{{number_format($data['recovered'])}}">
            <x-svgs.recovered />
        </x-dashboard.stat-box>

        <x-dashboard.stat-box class="bg-brand-tertiary text-brand-tertiary"
        name="deaths" count="{{number_format($data['deaths'])}}">
            <x-svgs.deaths />
        </x-dashboard.stat-box>
    </div>
</x-dashboard-layout>
