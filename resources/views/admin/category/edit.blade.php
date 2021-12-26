<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Update Category Name
                        </div>
                        <div class="card-body">
                            <form action={{ url("/category/update/{$category->id}") }} method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="category"
                                        aria-describedby="emailHelp"
                                        name="category_name"
                                        value='{{ $category->category_name }}'
                                    >
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

