<div id="translate_item_{{$translating->id}}" class=" translating_item_wrapper">


    {!! Form::model($translating, [
                               'method' => 'PATCH',
                               'url' =>   route("admin.categories.update_translating",['id'=>$translating->id]),
                               'class' => 'form-horizontal form-admin pt-4',
                               'files' => true
                           ]) !!}
    @php
        $bag = $errors->getBag('_translate_errors_'.$translating->id);
        $old_prefix = "_translate_old_".$translating->id;
        $t_id = $translating->id;
    @endphp
    @include("admin.global.message_translating_block",["bag"=>$bag])
    <div class="form-group {{ $bag->has('title') ? 'has-error' : ''}}">
        {!! Form::label('title', 'Заголовок', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::text('title', old($old_prefix.".title") , ['class' => 'form-control',"id"=>"title"]) !!}
            {!! $bag->first('title', '<p class="invalid-feedback d-block">:message</p>') !!}
         </div>
    </div>

    <div class="form-group {{ $bag->has('description') ? 'has-error' : ''}}">
        {!! Form::label('description', 'Опис', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::textarea('description', old($old_prefix.".description"), ['class' => 'form-control description ckeditor ckeditor-area',]) !!}
            {!! $bag->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group {{ $bag->has('short_description') ? 'has-error' : ''}}">
        {!! Form::label('short_description', 'Короткий опис', ['class' => ' control-label']) !!}
        <div class="">
            {!! Form::textarea('short_description', old($old_prefix.".short_description"), ['class' => 'form-control short_description']) !!}
            {!! $bag->first('short_description', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>

    <div class=" card  seo-panel">
        <div class="card-header">Seo</div>
        <div class="card-body">
            <div class="panel-body-wrap">

                    <div class="form-group {{ $bag->has('seo_title') ? 'has-error' : ''}}">
                        {!! Form::label('seo_title', 'Seo Title', ['class' => ' control-label']) !!}
                        <div class="">
                            {!! Form::text('seo_title',old($old_prefix.".seo_title"), ['class' => 'form-control']) !!}
                            {!! $bag->first('seo_title', '<p class="invalid-feedback d-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $bag->has('seo_description') ? 'has-error' : ''}}">
                        {!! Form::label('seo_description', 'Seo Description', ['class' => ' control-label']) !!}
                        <div class="">
                            {!! Form::text('seo_description',old($old_prefix.".seo_description"), ['class' => 'form-control']) !!}
                            {!! $errors->first('seo_description', '<p class="invalid-feedback d-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $bag->has('seo_keywords') ? 'has-error' : ''}}">
                        {!! Form::label('seo_keywords', 'Seo Keywords', ['class' => ' control-label']) !!}
                        <div class="">
                            {!! Form::text('seo_keywords', old($old_prefix.".seo_keywords"), ['class' => 'form-control']) !!}
                            {!! $errors->first('seo_keywords', '<p class="invalid-feedback d-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $bag->has('seo_text') ? 'has-error' : ''}}">
                        {!! Form::label('seo_text', 'Опис', ['class' => ' control-label']) !!}
                        <div class="">
                            {!! Form::textarea('seo_text', old($old_prefix.".seo_text"), ['class' => 'form-control description ckeditor ckeditor-area',]) !!}
                            {!! $bag->first('seo_text', '<p class="invalid-feedback d-block">:message</p>') !!}
                        </div>
                    </div>


            </div>
        </div>
    </div>
    <div class="form-group">
        <div class=" w-100 pt-4 text-center">
            {!! Form::submit( 'Зберегти', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
