<x-layout>
    <x-slot name="title">
        {{ $userList->title }} - インフルエンサー
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('users.user_list') }}">戻る</a>
    </div>

    <h1>
        <span>{{ $userList->title }}</span>
        <a href="{{ route('users.edit', $userList) }}">[Edit]</a>
        <form method="post" action="{{ route('users.destroy', $userList) }}" id="delete_userList">
            @method('DELETE')
            @csrf

            <button class="btn">[x]</button>
        </form>
    </h1>
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
