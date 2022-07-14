<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ProductTable extends PowerGridComponent {
    use ActionButton;

    public function setUp(): array {
        $this->showCheckBox();

        return [
            Exportable::make('export')->striped()->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()->showPerPage()->showRecordCount(),
        ];
    }

    public function datasource(): Builder {
        return Product::query()->with('category', 'supplier', 'manufacturer', 'product_group');
    }

    public function relationSearch(): array {
        return [
            'category' => [
                'id',
                'description'
            ],
            'supplier' => [
                'id',
                'name'
            ],
            'manufacturer' => [
                'id',
                'name'
            ],
            'product_group' => [
                'id',
                'name'
            ]
        ];
    }

    public function addColumns(): PowerGridEloquent {
        return PowerGrid::eloquent()
            ->addColumn('code')
            ->addColumn('type')
            ->addColumn('min_stock')
            ->addColumn('max_stock')
            ->addColumn('status')
            ->addColumn('expiration_date')
            ->addColumn('created_at_formatted', fn (Product $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Product $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array {
        return [
            Column::make('CODE', 'code')->searchable()->makeInputText(),
            Column::make('TYPE', 'type')->sortable()->searchable()->makeInputText(),
            Column::make('MIN STOCK', 'min_stock')->sortable()->searchable()->makeInputText(),
            Column::make('MAX STOCK', 'max_stock')->sortable()->searchable()->makeInputText(),
            Column::make('STATUS', 'status')->sortable()->searchable()->makeInputText(),
            Column::make('EXPIRATION DATE', 'expiration_date')->sortable()->searchable()->makeInputText(),
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')->searchable()->sortable()->makeInputDatePicker(),
            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')->searchable()->sortable()->makeInputDatePicker(),
        ]
;
    }

    public function actions(): array {
        return [
            Button::make('edit', 'Edit')->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('product.edit', ['product' => 'id']),

        //  Button::make('destroy', 'Delete')
        //      ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
        //      ->route('product.destroy', ['product' => 'id'])
        //      ->method('delete')
        ];
    }

    // public function actionRules(): array {
    //    return [
    //         //Hide button edit for ID 1
    //          Rule::button('edit')
    //              ->when(fn($product) => $product->id === 1)
    //              ->hide(),
    //     ];
    // }
}
