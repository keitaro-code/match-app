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
                            <div class="project-detail">
                                <h2 class="project-title">{{ $userList->title }}</h2>
                                <p class="project-body">{{ $userList->body }}</p>
                            </div>
                    </a>
                    <hr color="#dadada" style="margin-top: 20px">
                </div>
            </li>
            @empty
            <li>No user yet!!</li>
            @endforelse
        </ul>
    </div>
</x-layout>
