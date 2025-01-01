@extends($templatePath.'.layout')

@section('title', '404 - Không tìm thấy trang')

@section('block_main')
<div class="error-page min-h-screen flex items-center justify-center bg-gray-100">
    <div class="text-center">
        <h1 class="text-9xl font-bold text-gray-800">404</h1>
        <h2 class="text-2xl font-semibold text-gray-600 mt-4">Không tìm thấy trang</h2>
        <p class="text-gray-500 mt-4 mb-8">Trang bạn đang tìm kiếm không tồn tại hoặc đã bị di chuyển.</p>
        <a href="{{ route('home') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
            Về trang chủ
        </a>
    </div>
</div>
@endsection
