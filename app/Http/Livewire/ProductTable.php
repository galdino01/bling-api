<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ProductTable extends PowerGridComponent {
    use ActionButton;

    public function setUp(): array {
        $this->showCheckBox();

        return [
            Exportable::make(now()->format('dmY_his'))->striped()->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()->showPerPage(5, [10, 25, 50, 100])->showRecordCount(),
        ];
    }

    public function datasource(): Builder {
        return Product::query()->with('category');
    }

    public function relationSearch(): array {
        return [
            'category' => [
                'name'
            ]
        ];
    }

    public function addColumns(): PowerGridEloquent {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('category.name')
            ->addColumn('status')
            ->addColumn('quantity')
            ->addColumn('price')
            ->addColumn('price_cost')
            ->addColumn('expiration_date_formatted', fn (Product $model) => Carbon::parse($model->expiration_date)->format('d/m/Y H:i:s'))
            ->addColumn('created_at_formatted', fn (Product $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Product $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array {
        return [
            Column::make('ID', 'id')->searchable()->makeInputText(),
            Column::make('CATEGORY', 'category.name')->sortable()->makeInputText(),
            Column::make('STATUS', 'status')->sortable()->makeInputText(),
            Column::make('QUANTITY', 'quantity')->sortable()->makeInputText(),
            Column::make('PRICE', 'price')->sortable()->makeInputText(),
            Column::make('PRICE COST', 'price_cost')->sortable()->makeInputText(),
            Column::make('EXPIRATION DATE', 'expiration_date_formatted', 'expiration_date')->sortable()->makeInputDatePicker(),
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')->sortable()->makeInputDatePicker(),
            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')->sortable()->makeInputDatePicker(),
        ];
    }

    public function actions(): array {
        return [
            Button::make('show', '<i class="fas fa-eye"></i>')
                ->class('btn btn-outline-info cursor-pointer m-1 rounded text-sm')
                ->tooltip('Mostrar Produto')
                ->route('products.show', ['id' => 'id'])
                ->target('_self'),

            Button::make('edit', '<i class="fas fa-edit"></i>')
                ->class('btn btn-outline-primary cursor-pointer m-1 rounded text-sm')
                ->tooltip('Editar Produto')
                ->route('products.edit', ['id' => 'id'])
                ->target('_self'),

            Button::make('destroy', '<i class="fas fa-trash"></i>')
                ->class('btn btn-outline-danger cursor-pointer m-1 rounded text-sm')
                ->tooltip('Excluir Produto')
                ->route('products.destroy', ['id' => 'id'])
                ->method('patch')
                ->target('_self')
        ];
    }
}
