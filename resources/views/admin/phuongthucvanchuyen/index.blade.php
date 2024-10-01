@extends('admin.layout')

@section('css')
@endsection

@section('content')

    <div class="content-page">

        <div class="content">

            <!-- Start Content-->
            <div class="container">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">{{ $title }}</h4>
                    </div>
                </div>

                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <a href="{{ route('phuongthucvanchuyens.create') }}" class="btn btn-success">Thêm Phương Thức
                                    Vận Chuyển</a>
                            </div>
                            <!-- Hiển thị thông báo thành công -->
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissable fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close justify-content-center" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div><!-- end card header -->

                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-striped mb-0">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Kiểu Vận Chuyển</th>
                                                <th scope="col">Giá Vận Chuyển</th>
                                                <th scope="col">Hành Động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($phuongthucvanchuyens as $index => $item)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>
                                                        {{ $item->kieu_van_chuyen }}
                                                    </td>
                                                    <td>{{ number_format($item->gia_ship) }} VNĐ</td>
                                                    <!-- Hiển thị giá ship -->

                                                    <td>
                                                        {{-- <a href="{{ route('phuongthucvanchuyens.edit', $item->id) }}">
                                                            <i
                                                                class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i>
                                                        </a> --}}
                                                        <form
                                                            action="{{ route('phuongthucvanchuyens.destroy', $item->id) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('Bạn có muốn xóa kiểu vận chuyển này không?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none;">
                                                                <i
                                                                    class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        {{ $phuongthucvanchuyens->links() }}
                    </div>

                </div>

            </div> <!-- container-fluid -->

        </div>
    </div>

@section('js')
    <!-- Include your JS files here -->
@endsection
@endsection