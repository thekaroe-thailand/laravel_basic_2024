<div>
    <h1>Product Type</h1>

    <button class="btn btn-primary" wire:click="create">
        <i class="fa fa-plus"></i>
        เพิ่มประเภทสินค้า
    </button>

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

    <x-modal wire:model="showModal" title="{{ isset($editing) ? 'แก้ไขประเภทสินค้า' : 'เพิ่มประเภทสินค้า' }}">
        <div class="px-3 py-3">
            <div class="mt-2">
                <div>Name</div>
                <input type="text" wire:model="name" class="form-control" />
            </div>

            <div class="mt-3 p-2 text-right">
                <button wire:click="showModal = false" type="button" class="btn btn-secondary">
                    <i class="fa fa-save"></i>
                    ยกเลิก
                </button>
                <button wire:click="save" type="button" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    บันทึก
                </button>
            </div>
        </div>
    </x-modal>
</div>

