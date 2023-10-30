
<!-- BADGES FOR STATUS -->

<div class="d-flex flex-column gap-1 position-absolute top-0 end-0 m-2">
    @if ($person->is_prisoner)
        <span class="badge bg-warning p-2"><i class="fa-solid fa-handcuffs me-2 fa-lg"></i> En prison</span><br>
    @endif
    @if ($person->is_wanted)
        <span class="badge bg-danger p-2"><i class="fa-solid fa-circle-exclamation me-2 fa-lg"></i> Fugitif</span><br>
    @endif
    @if ($person->is_missing)
        <span class="badge bg-danger p-2"><i class="fa-solid fa-circle-question me-2 fa-lg"></i> Disparu</span><br>
    @endif
    @if ($person->is_renegade)
        <span class="badge bg-info p-2"><i class="fa-solid fa-person-rays me-2 fa-lg"></i> Renégat</span>
    @endif
    @if ($person->dead)
        <span class="badge bg-dark p-2"><i class="fa-solid fa-skull me-2 fa-lg"></i> Morte</span>
    @endif
</div>