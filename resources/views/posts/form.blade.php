<form method="POST" action="{{ route('post.store') }}">
    @csrf

    @if(isset($post))
        <input type="text" name="id" value="{{ $post->id }}" hidden>
    @endif
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title"
               placeholder="Title ..." value="@if(isset($post)){{$post->title}}@else{{ old('title') }}@endif">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="10"
                  placeholder="Description ...">@if(isset($post)){{$post->description}}@else{{ old('description') }}@endif</textarea>
    </div>

    {{--<div class="form-group">--}}
    {{--<label>Choose User</label>--}}
    {{--<select name="user_id" class="form-control">--}}
    {{--<option selected disabled> Choose user...</option>--}}
    {{--@foreach($users as $user)--}}
    {{--@if(isset($post))--}}
    {{--@if($user->id == $post->user->id)--}}
    {{--<option value="{{ $user->id }}" selected>{{ $user->name }}</option>--}}
    {{--@else--}}
    {{--<option value="{{ $user->id }}">{{ $user->name }}</option>--}}
    {{--@endif--}}
    {{--@else--}}
    {{--<option value="{{ $user->id }}">{{ $user->name }}</option>--}}
    {{--@endif--}}
    {{--@endforeach--}}
    {{--</select>--}}
    {{--</div>--}}

    <div class="form-group">
        <label>Choose Category</label>
        <select name="category_id[]" class="form-control" multiple>
            @foreach($categories as $category)
                @if(isset($post))
                    @php $found=false @endphp
                    @foreach($post->categories as $categoryID)
                        @if($category->id == $categoryID->id)
                            @php $found = true @endphp
                            @break;
                        @endif
                    @endforeach

                    @if($found)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>