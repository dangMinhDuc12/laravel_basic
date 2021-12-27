<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Update Brand
                        </div>
                        <div class="card-body">
                            <form action={{ url("/category/update/{$brand->id}") }} method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="brand_name"
                                        aria-describedby="emailHelp"
                                        name="brand_name"
                                        value='{{ $brand->brand_name }}'
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
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

