<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Carbon;
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

final class OrderTable extends PowerGridComponent {
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
        return Order::query()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name as user');
    }

    public function addColumns(): PowerGridEloquent {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('user_formatted', fn (Order $model) => ucwords(str_replace('_', ' ', $model->user)))
            ->addColumn('status')
            ->addColumn('discount_formatted', fn (Order $model) => $model->discount . '%')
            ->addColumn('cost_of_freight_formatted', fn (Order $model) => 'R$ ' . $model->cost_of_freight)
            ->addColumn('other_expenses_formatted', fn (Order $model) => 'R$ ' . $model->other_expenses)
            ->addColumn('total_of_products')
            ->addColumn('total_sale_formatted', fn (Order $model) => 'R$ ' . $model->total_sale)
            ->addColumn('output_date_formatted', fn (Order $model) => $model->output_date)
            ->addColumn('created_at_formatted', fn (Order $model) => $model->created_at)
            ->addColumn('updated_at_formatted', fn (Order $model) => $model->updated_at);
    }

    public function columns(): array {
        return [
            Column::make('ID', 'id')->searchable()->makeInputText(),
            Column::make('USER', 'user', 'users.name')->sortable()->makeInputMultiSelect(User::all(), 'name', 'user_id'),
            Column::make('STATUS', 'status')->sortable()->makeInputText(),
            Column::make('DISCOUNT', 'discount_formatted', 'discount')->sortable()->makeInputText(),
            Column::make('COST OF FREIGHT', 'cost_of_freight_formatted', 'cost_of_freight')->sortable()->makeInputText(),
            Column::make('OTHER EXPENSES', 'other_expenses_formatted', 'other_expenses')->sortable()->makeInputText(),
            Column::make('TOTAL OF PRODUCTS', 'total_of_products')->sortable()->makeInputText(),
            Column::make('TOTAL SALE', 'total_sale_formatted', 'total_sale')->sortable()->makeInputText(),
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
