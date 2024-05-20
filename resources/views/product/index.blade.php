<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            padding: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Products List</h1>
                <a href="{{ url('products/create') }}">
                    <button class="btn btn-primary btn-sm mb-2">Add New</button>
                </a>
                @if(Session('successAlert'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ Session('successAlert')}}</strong>
                        <button class="close float-right" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $products as $product )
                        <tr>
                            <td>{{ $product -> id }}</td>
                            <td>{{ $product -> title }}</td>
                            <td>{{ $product -> content }}</td>
                            <td>
                                <form action="{{ url('products/'.$product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('products/'.$product-> id.'/edit') }}">
                                        <button type="button" class="btn btn-success btn-sm">Edit</button>
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($products->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif
                        <!-- Page Links -->
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <!-- Next Page Link -->
                        @if ($products->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>