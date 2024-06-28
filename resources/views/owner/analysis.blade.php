{{-- <x-app-layout> --}}
{{-- </x-app-layout> --}}


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery (if not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS (if not already included) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @vite('resources/css/owner-components.css')
    @vite('resources/css/app.css')
    @vite('resources/css/owner-category.css')
    <title>analysis</title>
</head>
<body>
    <x-owner-header />
    <main>
        <div class="left-wrapper">
            <div class="owner">
                <img src="/storage/{{$owner->icon}}" alt="" />
                <p>{{$owner->username}}</p>
            </div>
            <nav>
                <div class="btn"><a href="{{route("owner.index")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m21.743 12.331-9-10c-.379-.422-1.107-.422-1.486 0l-9 10a.998.998 0 0 0-.17 1.076c.16.361.518.593.913.593h2v7a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-4h4v4a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-7h2a.998.998 0 0 0 .743-1.669z"></path></svg>home</a></div>
                <div class="btn"><a href="{{route("owner.category")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M3 2h2v20H3zm7 4h7v2h-7zm0 4h7v2h-7z"></path><path d="M19 2H6v20h13c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 18H8V4h11v16z"></path></svg>category</a></div>
                <div class="btn"><a href="{{route("owner.create")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M7.64 21.71a8 8 0 0 0 5.6-2.47l6-6c2.87-2.87 3.31-7.11 1-9.45s-6.58-1.91-9.45 1l-6 6c-2.87 2.87-3.31 7.11-1 9.45a5.38 5.38 0 0 0 3.85 1.47zm-2-9 2.78 2.79 1.42-1.42-2.79-2.79 1.41-1.41 2.83 2.83 1.42-1.42-2.83-2.83 1.41-1.41 2.83 2.83 1.42-1.42-2.79-2.78c2-1.61 4.65-1.87 6-.47s1.09 4.56-1 6.62l-6 6c-2.06 2.05-5.09 2.5-6.62 1s-1.06-4.07.55-6.08z"></path></svg>add a product</a></div>
                <div class="btn checked"><a href="{{route("owner.analysis")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M5 21h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM5 5h14l.001 14H5V5z"></path><path d="m13.553 11.658-4-2-2.448 4.895 1.79.894 1.552-3.105 4 2 2.448-4.895-1.79-.894z"></path></svg>analysis</a></div>
                <div class="btn"><a href="{{route('owner.purchaseHistory')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path></svg>purchase history</a></div>
                <div class="btn"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>log out</a></div>
            </nav>
        </div>

        <div class="content-wrapper">
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
        </div>
    </main>
</body>
</html>
