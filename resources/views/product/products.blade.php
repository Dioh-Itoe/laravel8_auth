<x-app-layout>
    <x-slot name="header">
        {{-- @extends('layouts.app') --}}
    </x-slot>
    <div class="container my-3">
        <div class="py-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="container table-responsive mt-5">
                <div class="d-flex justify-content-between align-items-center my-3">
                    <h1 class="font-semibold text-xl">
                        {{ __('Products / Services') }}
                    </h1>
                    <a href="{{ route('create') }}" class="btn btn-primary">Add Product/Service</a>
                </div>
            </div>
            <table id="datatable2" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image/Product Name</th>
                        <th>Price</th>
                        <th>In Stock <small><span><i class="fa fa-question-circle"></i></span></small> </th>
                        <th>Is Service <small><span><i class="fa fa-question-circle"></i></span></small> </th>
                        <th>On Discount <small><span><i class="fa fa-question-circle"></i></span></small> </th>
                        <th>Published <small> <span><i class="fa fa-question-circle"></i></span></small> </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @php
                    $i=0;
                    @endphp
                @foreach ($products as $product)
                @if(Auth::user()->id === $product->author_id)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="{{  json_decode($product->imageable['product_image'])[0] ?? 'https://p.kindpng.com/picc/s/197-1971165_blog-icon-iso-blogging-icon-hd-png-download.png'  }}" alt="product-image" height="35" width="30">
                                <div class="pl-3"><small>{{ $product->product_name }}</small></div>
                            </div>
                        </td>
                        <td><small>{{ $product->price }}</small></td>
                        <td><small class="badge badge-primary">{{ $product->in_stock == '1' ? 'Yes' : 'No'}}</small></td>
                        <td><small class="badge badge-primary">{{ $product->is_service == '1' ? 'Yes' : 'No'}}</small></td>
                        <td><small class="badge badge-primary">{{ $product->on_discount == '1' ? 'Yes' : 'No' }}</small></td>
                        <td><small class="badge badge-primary">{{ $product->published == '1' ? 'Yes' : 'No'}}</small></td>
                        <td>
                            {{-- <a href="{{ $car->singleCarPath() }}" target="_blank" class="text-success"><i class="mdi mdi-eye"></i></a> --}}
                            <a href="{{ $product->editPath() }}" class=" color-brand"><i class="mdi mdi-pencil-box"></i></a>
                            <a href="#delete{{ $product->id }}" data-toggle="modal" class="text-danger"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    <div id="delete{{ $product->id }}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> --}}
                                <div class="modal-body">
                                    <p>Are you sure you want to delete <strong>{{ $product->product_name }} ?</strong></p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{ route('delete-product', $product->id) }}" type="submit" class="btn btn-danger">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Responsive and datatable js -->
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>

        <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script>

        <script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable(),
        $('#datatable2').DataTable();
    } );
</script>
</x-app-layout>
