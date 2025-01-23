@extends('main')
@section('title', 'categoryies')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-12 m-2">
                    <!-- Kategoriya Yaratish Tugmasi -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                        Create
                    </button>

                    <!-- Modal Boshlanishi -->
                    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('categories.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Name input -->
                                        <div class="mb-3">
                                            <label for="categoryName" class="form-label">Category name</label>
                                            <input type="text" class="form-control" id="categoryName" name="name"
                                                placeholder="Kategoriya nomini kiriting" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $category)
                                        <tr>

                                            <td>{{ $category->id }}</td>
                                            {{-- <td>{{ $categories->perPage() * ($categories->currentPage() - 1) + $loop->iteration }} --}}
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#updateCategoryModal{{ $category->id }}">
                                                    Update
                                                </button>

                                                <!-- Modal Boshlanishi -->
                                                <div class="modal fade" id="updateCategoryModal{{ $category->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="updateCategoryModalLabel{{ $category->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('categories.update', $category->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="createCategoryModalLabel{{ $category->id }}">
                                                                        Create Category</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Name input -->
                                                                    <div class="mb-3">
                                                                        <label for="categoryName"
                                                                            class="form-label">Category name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="categoryName" name="name"
                                                                            placeholder="Kategoriya nomini kiriting"
                                                                            required value="{{ $category->name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="DELETE" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $categories->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
