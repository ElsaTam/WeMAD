<div class="accordion-item border-bottom border-3">
    <h2 class="accordion-header" id="panelsStayOpen-heading{{ $accordion_id }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $accordion_id }}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{ $accordion_id }}">
            <span class="fw-bold">{{ $title }}</span>
        </button>
    </h2>
    <div id="panelsStayOpen-collapse{{ $accordion_id }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading{{ $accordion_id }}">
        <div class="accordion-body p-0">
            <div class="list-group list-striped rounded-0 organisation-list">
                @foreach($organisations as $organisation)
                    <a class="list-group-item list-group-item-action" href="#" onclick="displayDescr({{ $organisation }}); return false;">
                        <span class="name">{{ $organisation->name_fr }}</span>
                        @if (count($organisation->countries) == 1)
                            ({{ $organisation->countries[0]->name }})
                        @elseif (count($organisation->countries) > 1)
                            ({{ count($organisation->countries) }} territoires)
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>