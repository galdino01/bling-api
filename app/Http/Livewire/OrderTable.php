<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;

final class OrderTable extends PowerGridComponent {
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
        return Order::query()->with('user');
    }

    public function relationSearch(): array {
        return [
            'user' => [
                'name'
            ],
        ];
    }

    public function addColumns(): PowerGridEloquent {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('user.name')
            ->addColumn('status')
            ->addColumn('discount')
            ->addColumn('cost_of_freight')
            ->addColumn('other_expenses')
            ->addColumn('total_of_products')
            ->addColumn('total_sale')
            ->addColumn('output_date_formatted', fn (Order $model) => $model->getOutputDateAttribute())
            ->addColumn('created_at_formatted', fn (Order $model) => $model->getCreatedAtAttribute())
            ->addColumn('updated_at_formatted', fn (Order $model) => $model->getUpdatedAtAttribute());
    }

    public function columns(): array {
        return [
            Column::make('ID', 'id')->searchable()->makeInputText(),
            Column::make('USER', 'user.name')->sortable()->makeInputText(),
            Column::make('STATUS', 'status')->sortable()->makeInputText(),
            Column::make('DISCOUNT', 'discount')->sortable()->makeInputText(),
            Column::make('COST OF FREIGHT', 'cost_of_freight')->sortable()->makeInputText(),
            Column::make('OTHER EXPENSES', 'other_expenses')->sortable()->makeInputText(),
            Column::make('TOTAL OF PRODUCTS', 'total_of_products')->sortable()->makeInputText(),
            Column::make('TOTAL SALE', 'total_sale')->sortable()->makeInputText(),
            Column::make('OUTPUT DATE', 'output_date_formatted', 'output_date')->sortable()->makeInputDatePicker(),
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')->sortable()->makeInputDatePicker(),
            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')->sortable()->makeInputDatePicker(),
        ];
    }

    public function actions(): array {
        return [
            Button::make('show', 'Show')
                ->class('btn btn-outline-primary cursor-pointer m-1 rounded text-sm')
                ->tooltip('See Product')
                ->route('orders.show', ['id' => 'id'])
                ->target('_self'),

            Button::make('edit', 'Edit')
                ->class('btn btn-outline-warning cursor-pointer m-1 rounded text-sm')
                ->tooltip('Edit Product')
                ->route('orders.edit', ['id' => 'id'])
                ->target('_self'),

            Button::make('destroy', 'Delete')
                ->class('btn btn-outline-danger cursor-pointer m-1 rounded text-sm')
                ->tooltip('Delete Product')
                ->route('orders.destroy', ['id' => 'id'])
                ->method('patch')
                ->target('_self')

        ];
    }
}
