@extends('layout.main')

@section('center-content')
<div class="page-header">
	<h1>Edit Product: <small></small></h1>
</div>
{{Form::open(array('files' => true,'class' => 'form-horizontal form-signin-signup form-profile' ))}}
	<div class="span7 offset0">
    <h4 class="widget-header"><i class="icon-beaker "> </i> Edit Product</h4>
    <div class="widget-body">
      <div class="center-align">

            <label for="title" class="col-sm-2 control-label">Product Title</label> <input type="text" name="title" placeholder="title" value="{{ $product->title }}">
			<div style="width:95%; margin:0 auto;">{{ Form::textarea('text', $product->text, ['size' => '20x10', 'class'=>'text','id'=>'text', 'style'=>'width:90%;margin-bottom:20px;']) }}</div>
            <div class="clearfix"></div>
            <div style="margin-top:15px;"><input type="submit" value="Update Product" class="btn btn-primary btn-large"></div>
            
      </div>
    </div>
</div>
<div class="span4 offset0">
    <h4 class="widget-header"><i class="icon-beaker "> </i>Product Image</h4>
    <div class="widget-body">
        <div class="center-align">
        	@if(!empty($product->image))
                {{HTML::image($product->image)}}
            @else
                {{HTML::image('products/missing-image.png')}}
            @endif
            <div class="clearfix"></div>
            <div style="margin-top:15px;">{{Form::file('image',array('name'=>'image'))}}</div>
        </div>
    </div>
</div>
{{form::close()}}


				<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'text' );
            </script>


@stop