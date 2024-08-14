@extends('dashboard.sidebar')
@section('content')
<div class="flex flex-col gap-12 justify-center mt-10">
    <div class="flex flex-col md:grid md:grid-cols-2 gap-12">
        <div class="rounded-lg bg-[#c4e6df] py-7 px-14">
            <h1 class="text-center font-bold">Pendaftaran Hari ini</h1>
            <h1 class="text-center font-bold">{{ $countToday }}</h1>
        </div>
        <div class="rounded-lg bg-[#c4e6df] py-7 px-14">
            <h1 class="text-center font-bold">Total Pendaftaran</h1>
            <h1 class="text-center font-bold">{{ $totalDaftar }}</h1>
        </div>
        <div class="rounded-lg bg-[#c4e6df] py-7 px-14">
            <h1 class="text-center font-bold">Daya Tampung Putra</h1>
            <h1 class="text-center font-bold">{{ $dayaTampung->putra ?? 100 }}</h1>
        </div>
        <div class="rounded-lg bg-[#c4e6df] py-7 px-14">
            <h1 class="text-center font-bold">Daya Tampung Putri</h1>
            <h1 class="text-center font-bold">{{ $dayaTampung->putri ?? 100 }}</h1>
        </div>
    </div>
    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'stafftu')
        @if (Auth::user()->role === 'admin')
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Daya Tampung</h2>
                <form action="{{ route('dashboard.updateDayaTampung') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="putra" class="block text-sm font-medium text-gray-700">Daya Tampung Putra</label>
                        <input type="number" name="putra" id="putra" value="{{ $dayaTampung->putra ?? 100 }}"
                            class="px-5 py-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="putri" class="block text-sm font-medium text-gray-700">Daya Tampung Putri</label>
                        <input type="number" name="putri" id="putri" value="{{ $dayaTampung->putri ?? 100 }}"
                            class="px-5 py-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                            Update Daya Tampung
                        </button>
                    </div>
                </form>
            </div>
        @endif
        <div class="flex flex-col gap-12 mt-12">
            <!-- Chart Jenis Kelamin -->
            <div class="w-full  bg-orange-300/10 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold mb-4">Persentase Jenis Kelamin</h2>
                <div class="w-full h-64">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>

            <!-- Chart Persebaran Asal -->
            <div class="w-full  bg-orange-300/10 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold mb-4">Persebaran Asal</h2>
                <div class="w-full h-64">
                    <canvas id="asalChart"></canvas>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->role === 'murid')
        <div>
            <h3 class="text-xl font-semibold">Hasil Kelulusan</h3>
            @if ($kelulusan !== null)
                @if ($kelulusan->status == 1)
                    <h3 class="text-xl font-bold text-green-700">Selamat anda telah Lolos!</h3>
                    <h3 class="text-xl font-bold text-black">Nilai kamu: {{$kelulusan->nilai}}</h3>
                @elseif ($kelulusan->status == 0)
                    <h3 class="text-xl font-bold text-red-400">Maaf, anda belum Lolos</h3>
                    <h3 class="text-xl font-bold text-black">Nilai kamu: {{$kelulusan->nilai}}</h3>
                @else
                    <span></span>
                @endif
            @endif
        </div>
    @endif
</div>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        });
    </script>
@elseif (session('errors'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: "Validasi gagal. Check kembali isian anda",
            });
        });
    </script>
@endif

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('genderChart').getContext('2d');
        var genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $persentase_laki_laki }}, {{ $persentase_perempuan }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.label || '';
                                var value = context.raw || 0;
                                return label + ': ' + value.toFixed(2) + '%';
                            }
                        }
                    }
                }
            }
        });

        var ctxAsal = document.getElementById('asalChart').getContext('2d');
        var asalChart = new Chart(ctxAsal, {
            type: 'bar',
            data: {
                labels: {!! json_encode($persebaran_asal->pluck('asal_kota')) !!},
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: {!! json_encode($persebaran_asal->pluck('total')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection