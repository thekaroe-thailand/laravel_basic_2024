<div>
    <h1>Product Type</h1>

    <form wire:submit="save">
        <div class="card">
            <div class="card-header">
                <div class="card-title">ประเภทสินค้า</div>
            </div>
            <div class="card-body">
                <div>Name</div>
                <input type="text" wire:model="name" class="form-control" />
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>name</th>
                <th width="110px">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productTypes as $productType)
                <tr>
                    <td>{{ $productType->name }}</td>
                    <td class="text-center">
                        <button wire:click="edit({{ $productType->id }})" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button wire:click="remove({{ $productType->id }})" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

