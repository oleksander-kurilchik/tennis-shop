@extends('layouts.backend')

@section("sub_title") - Відгуки кліентів  @endsection
@section('content')
    <div class=" " id="product-content">
        <div class="card">
            <div class="card-header">Редагувати відгук #{{ $review->id }}</div>
            <div class="card-body">
                <div class="header-admin-button">
                    <a href="{{ route("admin.products-reviews.index") }}" title="Назад">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </button>
                    </a>

                </div>
                @include("admin.global.message_block")



                {!! Form::model($review, [
                    'method' => 'PATCH',
                    'url' => route("admin.products-reviews.update",["id"=>$review->id]),
                    'class' => 'form-horizontal form-admin',
                    'files' => true
                ]) !!}
                @include ('admin.products_reviews.form_review', ['submitButtonText' => 'Зберегти'])

                {!! Form::close() !!}



                <div class="card">
                    <div class="card-header">Відповідь на відгук
                        @if($review->answer == null)
                            (Додати)
                            @else
                            (Редагувати)
                        @endif
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="col-12 py-3">
                           @if($review->answer != null)
                               {!! Form::open([
                      'method'=>'DELETE',
                      'url' => route("admin.products-reviews.answer.delete",["id"=>$review->id]),
                      'style' => 'display:inline'
                  ]) !!}
                               {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                       'type' => 'submit',
                                       'class' => 'btn btn-danger btn-xs',
                                       'title' => 'Видалити відповідь',
                                       'onclick'=>'return confirm("Підтвердити видалення?")'
                               ))!!}
                               {!! Form::close() !!}
                           @endif
                       </div>
                       </div>
                        <div class="">
{{--                            {!! Form::open(["method"=>"POST",'url' => route("admin.products-reviews.answer.create-update",["id"=>$review->id]), "class"=>"form-horizontal", 'style' => 'display:inline']) !!}--}}

                            {!! Form::model($review->answer, [
                              'method' => 'POST',
                              'url' => route("admin.products-reviews.answer.create-update",["id"=>$review->id]),
                              'class' => 'form-horizontal form-admin',
                              'files' => true
                          ]) !!}


                            @include ('admin.products_reviews.form_answer', ['submitButtonText' => $review->answer==null?'Зберегти':"Редагувати"])



                            {!! Form::close()  !!}

                        </div>




                    </div>
                </div>





            </div>
        </div>
    </div>

@endsection
