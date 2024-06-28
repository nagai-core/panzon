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
    <title>category</title>
</head>
<body>
    <x-owner-header />
    <main>
        {{-- <x-owner-nav  :ownerName="$owner->username" :url="$owner->icon"/> --}}
            <div class="left-wrapper">
                <div class="owner">
                    <img src="/storage/{{$owner->icon}}" alt="" />
                    <p>{{$owner->username}}</p>
                </div>
                <nav>
                    <div class="btn"><a href="{{route("owner.index")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m21.743 12.331-9-10c-.379-.422-1.107-.422-1.486 0l-9 10a.998.998 0 0 0-.17 1.076c.16.361.518.593.913.593h2v7a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-4h4v4a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-7h2a.998.998 0 0 0 .743-1.669z"></path></svg>home</a></div>
                    <div class="btn checked"><a href="{{route("owner.category")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M3 2h2v20H3zm7 4h7v2h-7zm0 4h7v2h-7z"></path><path d="M19 2H6v20h13c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 18H8V4h11v16z"></path></svg>category</a></div>
                    <div class="btn"><a href="{{route("owner.create")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M7.64 21.71a8 8 0 0 0 5.6-2.47l6-6c2.87-2.87 3.31-7.11 1-9.45s-6.58-1.91-9.45 1l-6 6c-2.87 2.87-3.31 7.11-1 9.45a5.38 5.38 0 0 0 3.85 1.47zm-2-9 2.78 2.79 1.42-1.42-2.79-2.79 1.41-1.41 2.83 2.83 1.42-1.42-2.83-2.83 1.41-1.41 2.83 2.83 1.42-1.42-2.79-2.78c2-1.61 4.65-1.87 6-.47s1.09 4.56-1 6.62l-6 6c-2.06 2.05-5.09 2.5-6.62 1s-1.06-4.07.55-6.08z"></path></svg>add a product</a></div>
                    <div class="btn"><a href="{{route("owner.analysis")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M5 21h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM5 5h14l.001 14H5V5z"></path><path d="m13.553 11.658-4-2-2.448 4.895 1.79.894 1.552-3.105 4 2 2.448-4.895-1.79-.894z"></path></svg>analysis</a></div>
                    <div class="btn"><a href="{{route('owner.purchaseHistory')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path></svg>purchase history</a></div>
                    <div class="btn"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>log out</a></div>
                </nav>
            </div>
            <div class="content-wrapper">
                @if ($categories->isEmpty())
                    <p>No categories found.</p>
                @else
                <ul>
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('owner.category.show', ['categoryname' => $category->name] ) }}">
                                {{ $category->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="button">
                    <button type="button" data-toggle="modal" data-target="#addCategoryModal">
                        追加する
                    </button>
                </div>
            </div>
            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryModalLabel">カテゴリ追加</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- フォーム -->
                            <form method="post" action="{{ route('owner.category.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="category">カテゴリ名</label>
                                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">追加</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>
</html>
