
<div class="list-group list-striped rounded-0 shadow">
    @foreach($offices as $office)
        <a class="list-group-item list-group-item-action" href="{{ url('offices/'.$office->id) }}">
            {{ $office->state->id }}, {{ $office->name }}
        </a>
    @endforeach
</div>