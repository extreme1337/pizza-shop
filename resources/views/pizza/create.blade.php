@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Pizza</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="" class="list-group-ite list-group-item-action">View</a>
                        <a href="" class="list-group-ite list-group-item-action">Create</a>
                    </ul>        
                </div>
            </div>
            @if (count($errors)>0)
                <div class="card">
                    <div class="card-body mt-5">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of pizza</label>
                            <input type="text" class="form-control" name="name" placeholder="name of pizza"/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description of pizza</label>
                            <textarea type="text" class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-inline">
                            <label>Pizza price($)</label>
                            <input type="number" name="small_pizza_price" class="form-control" placeholder="small pizza price"/>
                            <input type="number" name="medium_pizza_price" class="form-control" placeholder="medium pizza price"/>
                            <input type="number" name="large_pizza_price" class="form-control" placeholder="large pizza price"/>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <option></option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control"/>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
