@extends('dashboard.dashboard')
@section('title', 'Dashboard')
@push('style')
    <link rel="stylesheet" href="assets/libs/nouislider/nouislider.min.css">

    <!-- gridjs css -->
    <link rel="stylesheet" href="assets/libs/gridjs/theme/mermaid.min.css">
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Create Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate
                action="{{ route('blogs.add-blog') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Base Example -->
                        <div class="accordion" id="default-accordion-example">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="#" class="btn btn-success"
                                                    id="addproduct-btn"> Add
                                                    Product</a>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#default-accordion-example">
                                    <div class="accordion-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="product-title-input"> Title</label>
                                                    <input type="hidden" class="form-control" id="formAction"
                                                        name="formAction" value="add">
                                                    <input type="text" class="form-control d-none" id="product-id-input">
                                                    <input type="text" class="form-control" id="product-title-input"
                                                        value="" name="title" placeholder="Enter product title"
                                                        required>
                                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="product-title-input"> Slug</label>

                                                    <input type="text" class="form-control" id="page-slug-input"
                                                        value="" name="slug" placeholder="Enter-slug" required>
                                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                                </div>
                                                <div>
                                                    <label>Product Description</label>
                                                    {{-- <input type="text" class="form-control " name="page_data" id="editor"> --}}

                                                    <textarea class="form-control" name="page_data" id="editor"></textarea>
                                                    {{-- <div  class="form-control name="page_data"  id="editor"></div> --}}

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card -->

                                        <!-- end card -->
                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                   
                    <!-- end col -->

                   
                    <!-- end col -->
                </div>
                <!-- end row -->

            </form>
            <div class="row">
                <div class=" col-lg-8">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control" id="searchProductList"
                                                    placeholder="Search Products...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <div class="row align-items-center">
                                   
                                    <div class="col-auto">
                                        <div id="selection-element">
                                            <div class="my-n1 d-flex align-items-center text-muted">
                                                Select <div id="select-content" class="text-body fw-semibold px-1">
                                                </div> Result <button type="button"
                                                    class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal"
                                                    data-bs-target="#removeItemModal">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">

                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                        <div id="table-product-list-all" class="table-card gridjs-border-none">
                                            <div role="complementary" class="gridjs gridjs-container"
                                                style="width: 100%;">
                                                <div class="gridjs-wrapper" style="height: auto;">
                                                    <table role="grid" class="gridjs-table" style="height: auto;">
                                                        <thead class="gridjs-thead">
                                                            <tr class="gridjs-tr">
                                                                <th data-column-id="#"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 40px;">
                                                                    <div class="gridjs-th-content">#</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="product"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 360px;">
                                                                    <div class="gridjs-th-content">Product</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="stock"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 94px;">
                                                                    <div class="gridjs-th-content">Stock</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                             
                                                                <th data-column-id="published"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 220px;">
                                                                    <div class="gridjs-th-content">Published</div>
                                                                    <button tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="action"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 80px;">
                                                                    <div class="gridjs-th-content">Action</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="gridjs-tbody">
                                                            <tr class="gridjs-tr">
                                                                <td data-column-id="#" class="gridjs-td"><span>
                                                                        <div class="form-check checkbox-product-list">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="11"
                                                                                id="checkbox-11"> <label
                                                                                class="form-check-label"
                                                                                for="checkbox-11"></label> </div>
                                                                    </span></td>
                                                                
                                                                <td data-column-id="orders" class="gridjs-td">48</td>
                                                                <td data-column-id="rating" class="gridjs-td">
                                                                    <span><span
                                                                            class="badge bg-light text-body fs-12 fw-medium"><i
                                                                                class="mdi mdi-star text-warning me-1"></i>4.2</span></span>
                                                                </td>
                                                                <td data-column-id="published" class="gridjs-td">
                                                                    <span>12 Oct, 2021<small
                                                                            class="text-muted ms-1">10:05
                                                                            AM</small></span></td>
                                                                <td data-column-id="action" class="gridjs-td"><span>
                                                                        <div class="dropdown"><button
                                                                                class="btn btn-soft-secondary btn-sm dropdown"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="ri-more-fill"></i></button>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-product-details.html"><i
                                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                        View</a></li>
                                                                                <li><a class="dropdown-item edit-list"
                                                                                        data-edit-id="11"
                                                                                        href="apps-ecommerce-add-product.html"><i
                                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Edit</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item remove-list"
                                                                                        href="#" data-id="11"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#removeItemModal"><i
                                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </span></td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="productnav-published" role="tabpanel">
                                        <div id="table-product-list-published" class="table-card gridjs-border-none">
                                            <div role="complementary" class="gridjs gridjs-container"
                                                style="width: 100%;">
                                                <div class="gridjs-wrapper" style="height: auto;">
                                                    <table role="grid" class="gridjs-table" style="height: auto;">
                                                        <thead class="gridjs-thead">
                                                            <tr class="gridjs-tr">
                                                                <th data-column-id="#"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 40px;">
                                                                    <div class="gridjs-th-content">#</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="product"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 360px;">
                                                                    <div class="gridjs-th-content">Product</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="stock"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 94px;">
                                                                    <div class="gridjs-th-content">Stock</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="price"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 101px;">
                                                                    <div class="gridjs-th-content">Price</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="orders"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 84px;">
                                                                    <div class="gridjs-th-content">Orders</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="rating"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 105px;">
                                                                    <div class="gridjs-th-content">Rating</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="published"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 220px;">
                                                                    <div class="gridjs-th-content">Published</div>
                                                                    <button tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="action"
                                                                    class="gridjs-th gridjs-th-sort text-muted"
                                                                    tabindex="0" style="width: 80px;">
                                                                    <div class="gridjs-th-content">Action</div><button
                                                                        tabindex="-1"
                                                                        aria-label="Sort column ascending"
                                                                        title="Sort column ascending"
                                                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="gridjs-tbody">
                                                            <tr class="gridjs-tr">
                                                                <td data-column-id="#" class="gridjs-td"><span>
                                                                        <div class="form-check checkbox-product-list">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="undefined"
                                                                                id="checkboxpublished-undefined">
                                                                            <label class="form-check-label"
                                                                                for="checkbox-undefined"></label>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="product" class="gridjs-td"><span>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <div
                                                                                    class="avatar-sm bg-light rounded p-1">
                                                                                    <img src="assets/images/products/img-2.png"
                                                                                        alt=""
                                                                                        class="img-fluid d-block">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-1"><a
                                                                                        href="apps-ecommerce-product-details.html"
                                                                                        class="text-body">Urban Ladder
                                                                                        Pashe Chair</a></h5>
                                                                                <p class="text-muted mb-0">Category :
                                                                                    <span
                                                                                        class="fw-medium">Furniture</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="stock" class="gridjs-td">06</td>
                                                                <td data-column-id="price" class="gridjs-td">
                                                                    <span>$160.00</span></td>
                                                                <td data-column-id="orders" class="gridjs-td">30</td>
                                                                <td data-column-id="rating" class="gridjs-td">
                                                                    <span><span
                                                                            class="badge bg-light text-body fs-12 fw-medium"><i
                                                                                class="mdi mdi-star text-warning me-1"></i>4.3</span></span>
                                                                </td>
                                                                <td data-column-id="published" class="gridjs-td">
                                                                    <span>06 Jan, 2021<small
                                                                            class="text-muted ms-1">01:31
                                                                            PM</small></span></td>
                                                                <td data-column-id="action" class="gridjs-td"><span>
                                                                        <div class="dropdown"><button
                                                                                class="btn btn-soft-secondary btn-sm dropdown"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="ri-more-fill"></i></button>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-product-details.html"><i
                                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                        View</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-add-product.html"><i
                                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Edit</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item remove-list"
                                                                                        href="#"
                                                                                        data-id="undefined"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#removeItemModal"><i
                                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </span></td>
                                                            </tr>
                                                            <tr class="gridjs-tr">
                                                                <td data-column-id="#" class="gridjs-td"><span>
                                                                        <div class="form-check checkbox-product-list">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="undefined"
                                                                                id="checkboxpublished-undefined">
                                                                            <label class="form-check-label"
                                                                                for="checkbox-undefined"></label>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="product" class="gridjs-td"><span>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <div
                                                                                    class="avatar-sm bg-light rounded p-1">
                                                                                    <img src="assets/images/products/img-6.png"
                                                                                        alt=""
                                                                                        class="img-fluid d-block">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-1"><a
                                                                                        href="apps-ecommerce-product-details.html"
                                                                                        class="text-body">Half Sleeve
                                                                                        T-Shirts (Blue)</a></h5>
                                                                                <p class="text-muted mb-0">Category :
                                                                                    <span
                                                                                        class="fw-medium">Fashion</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="stock" class="gridjs-td">15</td>
                                                                <td data-column-id="price" class="gridjs-td">
                                                                    <span>$125.00</span></td>
                                                                <td data-column-id="orders" class="gridjs-td">48</td>
                                                                <td data-column-id="rating" class="gridjs-td">
                                                                    <span><span
                                                                            class="badge bg-light text-body fs-12 fw-medium"><i
                                                                                class="mdi mdi-star text-warning me-1"></i>4.2</span></span>
                                                                </td>
                                                                <td data-column-id="published" class="gridjs-td">
                                                                    <span>12 Oct, 2021<small
                                                                            class="text-muted ms-1">04:55
                                                                            PM</small></span></td>
                                                                <td data-column-id="action" class="gridjs-td"><span>
                                                                        <div class="dropdown"><button
                                                                                class="btn btn-soft-secondary btn-sm dropdown"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="ri-more-fill"></i></button>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-product-details.html"><i
                                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                        View</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-add-product.html"><i
                                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Edit</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item remove-list"
                                                                                        href="#"
                                                                                        data-id="undefined"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#removeItemModal"><i
                                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </span></td>
                                                            </tr>
                                                            <tr class="gridjs-tr">
                                                                <td data-column-id="#" class="gridjs-td"><span>
                                                                        <div class="form-check checkbox-product-list">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="undefined"
                                                                                id="checkboxpublished-undefined">
                                                                            <label class="form-check-label"
                                                                                for="checkbox-undefined"></label>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="product" class="gridjs-td"><span>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <div
                                                                                    class="avatar-sm bg-light rounded p-1">
                                                                                    <img src="assets/images/products/img-4.png"
                                                                                        alt=""
                                                                                        class="img-fluid d-block">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-1"><a
                                                                                        href="apps-ecommerce-product-details.html"
                                                                                        class="text-body">Fabric Dual
                                                                                        Tone Living Room Chair</a></h5>
                                                                                <p class="text-muted mb-0">Category :
                                                                                    <span
                                                                                        class="fw-medium">Furniture</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="stock" class="gridjs-td">15</td>
                                                                <td data-column-id="price" class="gridjs-td">
                                                                    <span>$140.00</span></td>
                                                                <td data-column-id="orders" class="gridjs-td">40</td>
                                                                <td data-column-id="rating" class="gridjs-td">
                                                                    <span><span
                                                                            class="badge bg-light text-body fs-12 fw-medium"><i
                                                                                class="mdi mdi-star text-warning me-1"></i>4.2</span></span>
                                                                </td>
                                                                <td data-column-id="published" class="gridjs-td">
                                                                    <span>19 Apr, 2021<small
                                                                            class="text-muted ms-1">02:51
                                                                            PM</small></span></td>
                                                                <td data-column-id="action" class="gridjs-td"><span>
                                                                        <div class="dropdown"><button
                                                                                class="btn btn-soft-secondary btn-sm dropdown"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="ri-more-fill"></i></button>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-product-details.html"><i
                                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                        View</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-add-product.html"><i
                                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Edit</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item remove-list"
                                                                                        href="#"
                                                                                        data-id="undefined"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#removeItemModal"><i
                                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </span></td>
                                                            </tr>
                                                            <tr class="gridjs-tr">
                                                                <td data-column-id="#" class="gridjs-td"><span>
                                                                        <div class="form-check checkbox-product-list">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="undefined"
                                                                                id="checkboxpublished-undefined">
                                                                            <label class="form-check-label"
                                                                                for="checkbox-undefined"></label>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="product" class="gridjs-td"><span>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <div
                                                                                    class="avatar-sm bg-light rounded p-1">
                                                                                    <img src="assets/images/products/img-4.png"
                                                                                        alt=""
                                                                                        class="img-fluid d-block">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-1"><a
                                                                                        href="apps-ecommerce-product-details.html"
                                                                                        class="text-body">350 ml Glass
                                                                                        Grocery Container</a></h5>
                                                                                <p class="text-muted mb-0">Category :
                                                                                    <span
                                                                                        class="fw-medium">Grocery</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="stock" class="gridjs-td">10</td>
                                                                <td data-column-id="price" class="gridjs-td">
                                                                    <span>$125.00</span></td>
                                                                <td data-column-id="orders" class="gridjs-td">48</td>
                                                                <td data-column-id="rating" class="gridjs-td">
                                                                    <span><span
                                                                            class="badge bg-light text-body fs-12 fw-medium"><i
                                                                                class="mdi mdi-star text-warning me-1"></i>4.5</span></span>
                                                                </td>
                                                                <td data-column-id="published" class="gridjs-td">
                                                                    <span>26 Mar, 2021<small
                                                                            class="text-muted ms-1">11:40
                                                                            AM</small></span></td>
                                                                <td data-column-id="action" class="gridjs-td"><span>
                                                                        <div class="dropdown"><button
                                                                                class="btn btn-soft-secondary btn-sm dropdown"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="ri-more-fill"></i></button>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-product-details.html"><i
                                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                        View</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-add-product.html"><i
                                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Edit</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item remove-list"
                                                                                        href="#"
                                                                                        data-id="undefined"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#removeItemModal"><i
                                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </span></td>
                                                            </tr>
                                                            <tr class="gridjs-tr">
                                                                <td data-column-id="#" class="gridjs-td"><span>
                                                                        <div class="form-check checkbox-product-list">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="undefined"
                                                                                id="checkboxpublished-undefined">
                                                                            <label class="form-check-label"
                                                                                for="checkbox-undefined"></label>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="product" class="gridjs-td"><span>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <div
                                                                                    class="avatar-sm bg-light rounded p-1">
                                                                                    <img src="assets/images/products/img-5.png"
                                                                                        alt=""
                                                                                        class="img-fluid d-block">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-1"><a
                                                                                        href="apps-ecommerce-product-details.html"
                                                                                        class="text-body">Crux
                                                                                        Motorsports Helmet</a></h5>
                                                                                <p class="text-muted mb-0">Category :
                                                                                    <span class="fw-medium">Automotive
                                                                                        Accessories</span></p>
                                                                            </div>
                                                                        </div>
                                                                    </span></td>
                                                                <td data-column-id="stock" class="gridjs-td">08</td>
                                                                <td data-column-id="price" class="gridjs-td">
                                                                    <span>$135.00</span></td>
                                                                <td data-column-id="orders" class="gridjs-td">55</td>
                                                                <td data-column-id="rating" class="gridjs-td">
                                                                    <span><span
                                                                            class="badge bg-light text-body fs-12 fw-medium"><i
                                                                                class="mdi mdi-star text-warning me-1"></i>4.4</span></span>
                                                                </td>
                                                                <td data-column-id="published" class="gridjs-td">
                                                                    <span>30 Mar, 2021<small
                                                                            class="text-muted ms-1">09:42
                                                                            AM</small></span></td>
                                                                <td data-column-id="action" class="gridjs-td"><span>
                                                                        <div class="dropdown"><button
                                                                                class="btn btn-soft-secondary btn-sm dropdown"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="ri-more-fill"></i></button>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-product-details.html"><i
                                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                        View</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="apps-ecommerce-add-product.html"><i
                                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                        Edit</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item remove-list"
                                                                                        href="#"
                                                                                        data-id="undefined"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#removeItemModal"><i
                                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                        Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="gridjs-footer">
                                                    <div class="gridjs-pagination">
                                                        <div role="status" aria-live="polite" class="gridjs-summary"
                                                            title="Page 1 of 1">Showing <b>1</b> to <b>5</b> of
                                                            <b>5</b> results</div>
                                                        <div class="gridjs-pages"><button tabindex="0"
                                                                role="button" disabled="" title="Previous"
                                                                aria-label="Previous"
                                                                class="">Previous</button><button tabindex="0"
                                                                role="button" class="gridjs-currentPage"
                                                                title="Page 1" aria-label="Page 1">1</button><button
                                                                tabindex="0" role="button" disabled=""
                                                                title="Next" aria-label="Next"
                                                                class="">Next</button></div>
                                                    </div>
                                                </div>
                                                <div id="gridjs-temp" class="gridjs-temp"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                        <div class="py-4 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#405189,secondary:#0ab39c"
                                                style="width:72px;height:72px">
                                            </lord-icon>
                                            <h5 class="mt-4">Sorry! No Result Found</h5>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    >



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
@endsection

@push('scripts')
    {{-- <script src="assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script> --}}
    <script src="assets/js/pages/ecommerce-product-list.init.js"></script>
    <script src="assets/libs/nouislider/nouislider.min.js"></script>
    <script src="assets/libs/wnumb/wNumb.min.js"></script>

    <!-- gridjs js -->
    <script src="assets/libs/gridjs/gridjs.umd.js"></script>
    <script src="../../../../unpkg.com/gridjs%406.1.1/plugins/selection/dist/selection.umd.js"></script>
    <!-- dropzone js -->
    <script src="assets/libs/dropzone/dropzone-min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
