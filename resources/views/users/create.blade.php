<x-layout>
    <x-slot name="title">
        情報登録
    </x-slot>

    <div class="back-link">
        &laquo;<a href="{{route('users.user_list')}}">戻る</a>
    </div>
    <h1>Add New Post</h1>
    {{-- enctype追加（画像機能） --}}
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label>
                Title
                <input type="text" name="title" value="{{old('title')}}">

                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </label>
        </div>

        {{-- input add --}}
        <input type="file" name="image" accept="image/png, image/jpeg">

        <div class="form-group">
            <label>
                Body
                <textarea name="body">{{old('body')}}</textarea>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
            </label>
        </div>


        <div class="form-button">
            {{-- submit追加（間違ってる可能性大）--}}
            <button class="btn" type="submit">登録</button>
        </div>
    </form>
</x-layout>
