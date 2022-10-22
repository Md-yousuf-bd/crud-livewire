<div>
    <div>
        @if ($updatePost)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif

    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Address</th>
                <th scope="col">State</th>
                <th scope="col">City</th>
                <th scope="col">zip</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->address }}</td>
                    <td>{{ $post->state }}</td>
                    <td>{{ $post->city }}</td>
                    <td>{{ $post->zip }}</td>
                    <td>
                        <button wire:click="edit({{ $post->id }})" class="btn btn-success">edit</button>
                        <button wire:click="destroy({{ $post->id }})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
