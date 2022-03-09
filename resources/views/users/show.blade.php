<x-layout>
    <x-slot name="title">
        {{ $userList->title }} - インフルエンサー
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('users.user_list') }}">戻る</a>
    </div>

    <h1>
        <span>{{ $userList->title }}</span>
        <a class="btn" href="{{ route('users.edit', $userList) }}">編集</a>
        <form method="post" action="{{ route('users.destroy', $userList) }}" id="delete_userList">
            @method('DELETE')
            @csrf

            <button class="btn btn-right">削除</button>
        </form>

    </h1>

    {{-- 追加（画像機能） --}}
    {{-- <div style="width: 18rem; float:left; margin: 16px;"> --}}
        <img src="{{ Storage::url($userList->file_path) }}" style="width:100%;"/>
        {{-- <p>{{ $userList->file_name }}</p> --}}
    {{-- </div> --}}
    <p>{!! nl2br(e($userList->body)) !!}</p>

    <script>
        'use strict';

        {
            document.getElementById('delete_userList').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('Sure to delete?')) {
                    return;
                }
                e.target.submit();
            });
        }
    </script>
</x-layout>
