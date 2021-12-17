@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-error" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="responsive-table">
                             <table class="table">
                                 <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($products as $product)
                                         <tr>
                                             <td>{{$product->id}}</td>
                                             <td>{{$product->title}}</td>
                                             <td>{{$product->description}}</td>
                                             <td>{{$product->price}}</td>
                                             <td>
                                                 <a href="{{route('editProduct',[$product->id])}}" class="btn btn-success">Edit</a>
                                                 <a href="{{route('deleteProduct',[$product->id])}}" class="btn btn-danger">Delete</a>
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
