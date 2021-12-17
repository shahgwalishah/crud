@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                    <form action="{{route('storeProduct')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Title:</label>
                                <input type="text" name="title" placeholder="Enter Title" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Description:</label>
                                <textarea cols="12" rows="12" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Price:</label>
                                <input type="number" name="price" placeholder="Enter Price" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
