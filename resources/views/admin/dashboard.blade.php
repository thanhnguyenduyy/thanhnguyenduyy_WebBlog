@extends('layouts.admin', ['currentView' => 'dashboard'])

@section('content')
<div class="space-y-8 animate-in">
    <div class="flex justify-between items-end">
        <div>
            <h2 class="text-3xl font-serif font-medium text-zinc-900 dark:text-white mb-2">Dashboard Overview</h2>
            <p class="text-zinc-500 dark:text-zinc-400 text-sm">Welcome back, Nguyễn Duy Thanh. Here is your portfolio activity.</p>
        </div>
        <div class="text-right">
            <p class="text-xs text-zinc-500 uppercase tracking-widest mb-1">Last Updated</p>
            <p class="text-zinc-600 dark:text-zinc-300 font-mono text-sm">{{ now()->format('M d, Y • H:i A') }}</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($stats as $stat)
        <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-6 rounded-xl hover:border-brand-blue/30 transition-colors shadow-sm dark:shadow-none">
            <div class="flex justify-between items-start mb-4">
                <span class="text-zinc-500 dark:text-zinc-400 text-sm font-medium uppercase tracking-wider">{{ $stat['label'] }}</span>
                <span class="flex items-center text-xs font-bold px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-900 {{ $stat['trend'] === 'up' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                    @if($stat['trend'] === 'up')
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>
                    @endif
                    {{ $stat['change'] }}
                </span>
            </div>
            <h3 class="text-4xl font-serif text-zinc-900 dark:text-white">{{ $stat['value'] }}</h3>
        </div>
        @endforeach
    </div>

    <!-- Traffic Analytics -->
    <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-6 rounded-xl shadow-sm dark:shadow-none">
        <h3 class="text-lg font-medium text-zinc-900 dark:text-white mb-6 font-serif">Traffic Analytics</h3>
        <div class="h-[300px] w-full">
            <canvas id="trafficChart"></canvas>
        </div>
    </div>

    <!-- Bottom Sections -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Recent Messages -->
        <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-6 rounded-xl shadow-sm dark:shadow-none">
            <h3 class="text-zinc-900 dark:text-white font-serif mb-4 flex items-center justify-between">
                <span>Recent Messages</span>
                <a href="{{ route('admin.inbox.index') }}" class="text-xs text-brand-blue cursor-pointer hover:underline">View All</a>
            </h3>
            <div class="space-y-4">
                @forelse([] as $message) <!-- To be implemented with real data -->
                @empty
                    @for($i = 0; $i < 3; $i++)
                    <div class="flex items-start space-x-3 p-3 bg-zinc-50 dark:bg-zinc-900/50 rounded-lg border border-zinc-100 dark:border-zinc-800/50 hover:border-zinc-300 dark:hover:border-zinc-700 transition-colors">
                        <div class="w-8 h-8 rounded-full bg-zinc-200 dark:bg-zinc-800 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-500 dark:text-zinc-400"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-zinc-900 dark:text-white font-medium">Collaboration Inquiry</p>
                            <p class="text-xs text-zinc-500 mt-1 line-clamp-1">Hi, I saw your Aperture Engine project and I'd love to discuss...</p>
                        </div>
                        <span class="text-[10px] text-zinc-500 dark:text-zinc-600 ml-auto whitespace-nowrap">2h ago</span>
                    </div>
                    @endfor
                @endforelse
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white dark:bg-brand-panel border border-zinc-200 dark:border-brand-border p-6 rounded-xl shadow-sm dark:shadow-none">
            <h3 class="text-zinc-900 dark:text-white font-serif mb-4 flex items-center justify-between">
                <span>System Status</span>
            </h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.6)]"></div>
                        <span class="text-sm text-zinc-700 dark:text-zinc-300">Vercel Edge Network</span>
                    </div>
                    <span class="text-xs text-green-600 dark:text-green-500 font-mono">OPERATIONAL</span>
                </div>
                <div class="flex items-center justify-between p-3 border-t border-dashed border-zinc-200 dark:border-zinc-800">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.6)]"></div>
                        <span class="text-sm text-zinc-700 dark:text-zinc-300">Database (MySQL)</span>
                    </div>
                    <span class="text-xs text-green-600 dark:text-green-500 font-mono">OPERATIONAL</span>
                </div>
                <div class="flex items-center justify-between p-3 border-t border-dashed border-zinc-200 dark:border-zinc-800">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 rounded-full bg-yellow-500 shadow-[0_0_8px_rgba(234,179,8,0.6)]"></div>
                        <span class="text-sm text-zinc-700 dark:text-zinc-300">Storage Usage</span>
                    </div>
                    <span class="text-xs text-yellow-600 dark:text-yellow-500 font-mono">82% FULL</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('trafficChart').getContext('2d');
    const chartData = @json($chartData);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Views',
                data: chartData.views,
                borderColor: '#00A3FF',
                borderWidth: 2,
                backgroundColor: (context) => {
                    const canvas = context.chart.canvas;
                    const ctx = canvas.getContext('2d');
                    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
                    gradient.addColorStop(0, 'rgba(0, 163, 255, 0.3)');
                    gradient.addColorStop(1, 'rgba(0, 163, 255, 0)');
                    return gradient;
                },
                fill: true,
                tension: 0.4,
                pointRadius: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#18181b',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#27272A',
                    borderWidth: 1,
                    cornerRadius: 8,
                    padding: 12
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#71717a', font: { size: 12 } }
                },
                y: {
                    grid: { color: '#52525b', opacity: 0.1, drawTicks: false },
                    ticks: { color: '#71717a', font: { size: 12 }, padding: 10 }
                }
            }
        }
    });
</script>
@endpush
