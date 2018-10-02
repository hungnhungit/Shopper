
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@if(Session::has('message'))
	{{ Session::get('message') }}
@endif


<h1>Products</h1>

<form action="#" method="GET">
    <input type="text" class="form-control" placeholder="Search">
    <input type="submit" class="btn btn-success">
</form>

 <table class="table">
    <thead>
      <tr>
        <th>Sku</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr>
        <td>{{ $product->sku }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->slug }}</td>
        <td>{{ $product->price }}</td>
        <td>
        	<a href="{{ route('admin.product.destroy',$product->id) }}" class="btn btn-danger">Delete</a>
        	<a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-primary">Edit</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
