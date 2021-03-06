<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('status') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">
                            All Brand
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src={{ asset($brand->brand_image) }} style="width: 70px; height: 40px "></td>
                                    <td>{{ $brand->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href={{ url("/brand/edit/{$brand->id}") }} class="btn btn-info">Edit</a>
                                        <a
                                            href={{ url("/brand/delete/{$brand->id}") }}
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure want to delete this item ?')"
                                        >
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Brand
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="brand_name"
                                        aria-describedby="emailHelp"
                                        name="brand_name"
                                    >
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand_image">Brand Image</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="brand_image"
                                        aria-describedby="emailHelp"
                                        name="brand_image"
                                    >
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

