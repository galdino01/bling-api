<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class ProductTable extends PowerGridComponent {
    use ActionButton;

    public function setUp(): array {
        $this->showCheckBox();

        return [
            Exportable::make(now()->format('dmY_his'))->striped()->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showToggleColumns()->showSearchInput(),
            Footer::make()->showPerPage(5, [10, 25, 50, 100])->showRecordCount(),
        ];
    }

    public function datasource(): Builder {
        return Product::query()
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category');
    }

    public function addColumns(): PowerGridEloquent {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('category_formatted', fn (Product $model) => ucwords(str_replace('_', ' ', $model->category)))
            ->addColumn('status')
            ->addColumn('quantity')
            ->addColumn('price_formatted', fn (Product $model) => 'R$ ' . $model->price)
            ->addColumn('price_cost_formatted', fn (Product $model) => 'R$ ' . $model->price_cost)
            ->addColumn('expiration_date_formatted', fn (Product $model) => $model->expiration_date)
            ->addColumn('created_at_formatted', fn (Product $model) => $model->created_at)
            ->addColumn('updated_at_formatted', fn (Product $model) => $model->updated_at);
    }

    public function columns(): array {
        return [
            Column::make('NAME', 'name')->searchable()->makeInputText(),
            Column::make('CATEGORY', 'category_formatted', 'categories.name')->sortable()->makeInputMultiSelect(Category::all(), 'name', 'category_id'),
            Column::make('STATUS', 'status')->sortable()->makeInputText(),
            Column::make('QUANTITY', 'quantity')->sortable()->makeInputText(),
            Column::make('PRICE', 'price_formatted', 'price')->sortable()->makeInputText(),
            Column::make('PRICE COST', 'price_cost_formatted', 'price_cost')->sortable()->makeInputText(),
            Column::make('EXPIRATION DATE', 'expiration_date_formatted', 'expiration_date')->sortable()->makeInputDatePicker(),
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')->sortable()->makeInputDatePicker(),
            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')->sortable()->makeInputDatePicker(),
        ];
    }

    public function actions(): array {
        return [
            Button::make('show', '<i class="fas fa-eye"></i>')
                ->class('btn btn-outline-info cursor-pointer m-1 rounded text-sm')
                ->tooltip('See Product')
                ->route('products.show', ['id' => 'id'])
                ->target('_self'),

            Button::make('edit', '<i class="fas fa-edit"></i>')
                ->class('btn btn-outline-primary cursor-pointer m-1 rounded text-sm')
                ->tooltip('Edit Product')
                ->route('products.edit', ['id' => 'id'])
                ->target('_self'),

            Button::make('destroy', '<i class="fas fa-trash"></i>')
                ->class('btn btn-outline-danger cursor-pointer m-1 rounded text-sm')
                ->tooltip('Delete Product')
                ->route('products.destroy', ['id' => 'id'])
                ->method('patch')
                ->target('_self')
        ];
    }
}
