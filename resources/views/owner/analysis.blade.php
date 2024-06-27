<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>売り上げ分析</h1>

                        <div class="mb-8">
                            <h2>日別売り上げ(過去３０日)</h2>
                            <canvas id="dailySalesChart" height="120"></canvas>
                        </div>

                        <div class="mb-8">
                            <h2>月別売り上げ</h2>
                            <canvas id="monthlySalesChart" height="120"></canvas>
                        </div>

                        <div class="mb-8">
                            <h2>商品ごとの売り上げ</h2>
                            <canvas id="productSalesChart" height="120"></canvas>
                        </div>

                        <div class="mb-8">
                            <h2>カテゴリーごとの売り上げ</h2>
                            <canvas id="categorySalesChart" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        var dailyLabels = {{ Js::from($dailyLabels) }};
        var dailyData = {{ Js::from($dailyData) }};

        const data = {
            labels: dailyLabels,
            datasets: [{
                label: '日別売上',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: dailyData,
            }]
        }
        const dailyConfig = {
            type: 'line',
            data: data,
            options: {}
        };

        const dailySalesChart = new Chart(
            document.getElementById('dailySalesChart'),
            dailyConfig
        );

        var monthlyLabels = {{ Js::from($monthlyLabels) }};
        var monthlyData = {{ Js::from($monthlyData) }};

        const data2 = {
            labels: monthlyLabels,
            datasets: [{
                label: '月別売上',
                backgroundColor: '#53a3e3',
                borderColor: '#53a3e3',
                data: monthlyData,
            }]
        }

        const monthlyConfig = {
            type: 'bar',
            data: data2,
            options: {}
        };

        const monthlySalesChart = new Chart(
            document.getElementById('monthlySalesChart'),
            monthlyConfig
        );

        var productLabels = {{ Js::from($productLabels) }};
        var productData = {{ Js::from($productData) }};

        const data3 = {
            labels: productLabels,
            datasets: [{
                label: '商品ごとの売上',
                backgroundColor: '#13c871',
                borderColor: '#13c871',
                data: productData,
            }]
        }
        const productConfig = {
            type: 'bar',
            data: data3,
            options: {}
        };

        const productSalesChart = new Chart(
            document.getElementById('productSalesChart'),
            productConfig
        );

        var categoryLabels = {{ Js::from($categoryLabels) }};
        var categoryData = {{ Js::from($categoryData) }};

        const data4 = {
            labels: categoryLabels,
            datasets: [{
                label: 'カテゴリーごとの売上',
                backgroundColor: '#e12a17',
                borderColor: '#e12a17',
                data: categoryData,
            }]
        }

        const categoryConfig = {
            type: 'bar',
            data: data4,
            options: {}
        };

        const categorySalesChart = new Chart(
            document.getElementById('categorySalesChart'),
            categoryConfig
        );
    </script>
</x-app-layout>
