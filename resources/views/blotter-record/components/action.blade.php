<div>
    
    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-blotter="{{ $blotter->id }}">
        <i class="fa-solid fa-pen"></i>
    </button>

    <button class="btn btn-info viewBtn" data-bs-target="#viewModal" data-bs-toggle="modal"
        data-blotter="{{ $blotter->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>

    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-blotter="{{ $blotter->id }}">
        <i class="fa-solid fa-trash"></i>
    </button>

</div>
