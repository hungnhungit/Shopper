 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@include('partials.errors')

<h1>{{$title}}</h1>

@include('partials.form_search_share',['url'=>$url])


@if(!$datas->isEmpty())
 <table class="table">
    <thead>
      <tr>
        @foreach($columns as $column)
			<th>{{ ucfirst($column)}}</th>
    	@endforeach
    		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	  @foreach($datas as $data)
	  	<tr>
		  	@foreach($columns as $column)
		        <td>{{ isset($data->{$column}) ? $data->{$column} : "NULL" }}</td>
		    @endforeach
		     <td>
		        	@include('partials.form_share',['id' => $data->id,'title'=>'Delete','route'=>"admin.".$url.".destroy",'class'=>'btn btn-danger','method'=>'delete','form'=>'delete'])
		        	@include('partials.form_share',['id' => $data->id,'title'=>'Edit','route'=>"admin.".$url.".edit",'class'=>'btn btn-primary','method'=>'get','form' => 'edit'])
		        	<!-- <a href="{{ route('admin.product.edit',$data->id) }}" class="btn btn-primary">Edit</a> -->
		      </td>
		</tr>
	   @endforeach
    </tbody>
  </table>
  {{ $datas }}
@else
	@if($url == 'Product')
		Product Empty
	@elseif($url == 'Category')
		Category Empty
	@endif
@endif

