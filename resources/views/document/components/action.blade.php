<div>

    <button class="btn btn-success acceptBtn" data-bs-toggle="modal" data-bs-target="#acceptModal"
        data-document="{{ $document->id }}">
        <i class="fa-solid fa-check"></i>
    </button>

    <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
        data-document="{{ $document->id }}">
        <i class="fa-solid fa-times"></i>
    </button>

</div>
