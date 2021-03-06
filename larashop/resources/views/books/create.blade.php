@extends('layouts.global')


@section('titel')
    Create Book
@endsection

@section('content')

    @if (session('status'))

    <div class="alert alert-success">
        {{session('status')}}
    </div>

    @endif

    <div class="row">
        <div class="col-md-8">
            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data"
            class="shadow-sm p-3 bg-white">

            @csrf


            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Book Title">
            <br>

            <label for="cover">Cover</label>
            <input type="file" class="form-control" name="cover" placeholder="Book Title">
            <br>

            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="title" placeholder="Give a Description about this Book">
            </textarea>
            <br>

                        <label for="categories">Categories</label>
                        <select id="categories" name="categories[]" multiple class="form-control"></select>
                        <br>

            <label for="stock">Stock</label>
            <input type="number" id="stock" class="form-control" name="stock" min=0 value=0 >
            <br>

            <label for="author">Author</label>
            <input type="text" id="author" class="form-control" name="author" placeholder="Book Author">
            <br>

            <label for="publisher">Publisher</label>
            <input type="text" id="publisher" class="form-control" name="publisher" placeholder="Book Publisher">
            <br>

            <label for="price">Price</label>
            <input type="number" id="price" class="form-control" name="price" >
            <br>

            <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
            <button class="btn btn-secondary" name="save_action" value="DRAFT">Save As Draft</button>
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$('#categories').select2({ ajax: { url: 'http://localhost/larashop/ajax/categories/search', processResults: function(data){
return { results: data.map(function(item){return {id: item.id, text: item.name} })
        }
      }
    }
});
</script>
@endsection
