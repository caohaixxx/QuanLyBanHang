@extends('admin.layout.master')

@section('addcssadmin')
@endsection
@section('bodyadmin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('language.customer') }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card ">
                        <div class="card-header">
                            <div class="filter">
                                <div class="search-container">
                                    <form action="">
                                        <input type="text" placeholder="Search.." name="search">
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                                <a class="btn btn-success btn-sm rounded-0 create"
                                    href="{{ route('admin.coupon.create') }}"><i
                                        class="fa fa-plus pad"></i>{{ trans('language.create') }}</a>
                            </div>

                        </div>
                        <!-- form start -->
                        <table class="table table-bordered table-image">
                            <thead>
                                <tr>
                                    <th class="text-center " scope="col">#</th>
                                    <th class="text-center " scope="col">{{ trans('language.cus_name') }}</th>
                                    <th class="text-center " scope="col">{{ trans('language.email') }}</th>
                                    <th class="text-center " scope="col">{{ trans('language.number_phone') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $idx => $customer)
                                    <tr br-name>
                                        <td class="text-center">
                                            {{ isset($idx) ? ($customers->currentPage() - 1) * $customers->perPage() + $idx + 1 : '' }}
                                        </td>
                                        <td class="text-center">{{ $customer->name }}</td>
                                        <td class="text-center">{{ $customer->email }}</td>
                                        <td class="text-center">{{ $customer->phone }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <div style="float: right; padding-right: 10px">
                                {{ $customers->links('pagination::bootstrap-4') }}
                            </div>
                        </div> 
                        <!-- /.card -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('addjsadmin')
@endsection
