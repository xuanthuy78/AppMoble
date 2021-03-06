@extends('layouts.masterAdmin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    List Product Search by "{{$search}}"
                </h1>
            </div>
            
            <!-- /.col-lg-12 -->
            <form action="admin/product/search_product" method="post" role="search">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <div class="form-group">
                    <input class="form-control" name="search" placeholder="Type ID, Date or Name">
                </div>
                <button type="submit" class="btn btn-default">Search</button>         
            </form>
            
            <?php
                function ChangeColor($str,$search){
                    return str_replace($search, "<span style='color:red;font-weight:bolder;'>$search</span>", $str);
                }
            ?>            
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quality</th>
                        <th>Category</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($products as $pr)
                    <tr class="odd gradeX" align="center">
                        <td>{{$pr->id}}</td>
                        <td>{!! ChangeColor($pr->name, $search) !!}</td>
                        <td>{{$pr->price}}</td>
                        <td>{{$pr->quality}}</td>
                        <td>{!! ChangeColor($pr->category->name, $search) !!}</td>
                        <td class="center"><i class="fas fa-edit"></i><a href="admin/product/product_update/{{$pr->id}}"> Update</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$pr->id}}"> Delete</a></td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop