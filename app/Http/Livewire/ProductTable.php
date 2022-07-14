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
        return Product::query()->with('category', 'user');
    }

    public function relationSearch(): array {
        return [
            'category' => [
                'id',
                'name',
                'description'
            ],
            'user' => [
                'id',
                'type',
                'name'
            ],
        ];
    }

    public function addColumns(): PowerGridEloquent {
        return PowerGrid::eloquent()
            ->addColumn('code')
            ->addColumn('type')
            ->addColumn('status')
            ->addColumn('quantity')
            ->addColumn('items_per_box')
            ->addColumn('boxes')
            ->addColumn('expiration_date')
            ->addColumn('created_at_formatted', fn (Product $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Product $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array {
        return [
            Column::make('CODE', 'code')->searchable()->makeInputText(),
            Column::make('TYPE', 'type')->sortable()->searchable()->makeInputText(),
            Column::make('STATUS', 'status')->sortable()->searchable()->makeInputText(),
            Column::make('QUANTITY', 'quantity')->sortable()->searchable()->makeInputText(),
            Column::make('ITEMS PER BOX', 'items_per_box')->sortable()->searchable()->makeInputText(),
            Column::make('BOXES', 'boxes')->sortable()->searchable()->makeInputText(),
            Column::make('EXPIRATION DATE', 'expiration_date')->sortable()->searchable()->makeInputDatePicker(),
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')->sortable()->searchable()->makeInputDatePicker(),
            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')->sortable()->searchable()->makeInputDatePicker(),
        ]
;
    }

    public function actions(): array {
        return [
            Button::make('show', 'Show')
                ->class('btn btn-outline-primary cursor-pointer m-1 rounded text-sm')
                ->route('products.show', ['id' => 'id']),

            Button::make('edit', 'Edit')
                ->class('btn btn-outline-warning cursor-pointer m-1 rounded text-sm')
                ->route('products.edit', ['id' => 'id']),

            Button::make('destroy', 'Delete')
                ->class('btn btn-outline-danger cursor-pointer m-1 rounded text-sm')
                ->route('products.destroy', ['id' => 'id'])
                ->method('patch')
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
