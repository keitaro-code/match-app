<x-layout>
    <x-slot name='title'>
        インフルエンサー情報
    </x-slot>
    <h1>
        <span>インフルエンサー</span>
        <a href="{{ route('users.create') }}">投稿</a>
    </h1>
    <div class="projects-index-user_list">
        <ul>
            @forelse ($userLists as $userList)
            <li>
                <div class="projects-index-user">
                    <a href="{{ route('users.show', $userList) }}">

                            <img src="{{ Storage::url($userList->file_path) }}" style="width:100%;"/>
                            {{-- <p>{{ $userList->file_name }}</p> --}}
                            {{ $userList->title }}

                    </a>
                </div>
            </li>
            @empty
            <li>No user yet!!</li>
            @endforelse
        </ul>
    </div>
</x-layout>
