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
                            <form
                                action={{ url("/brand/update/{$brand->id}") }}
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
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
                                <div class="form-group">
                                    <img src={{ asset($brand->brand_image) }} style="width: 400px; height: 200px"" ">
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

