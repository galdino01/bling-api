<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class CategoryTable extends PowerGridComponent {
    use ActionButton;

    public function setUp(): array {
        $this->showCheckBox();

        return [
            Exportable::make(now()->format('dmY_his'))->striped()->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showToggleColumns()->showSearchInput(),
            Footer::make()->showPerPage(5, [5, 10, 25, 50, 100])->showRecordCount(),
        ];
    }

    public function datasource(): Builder {
        return Category::query();
    }

    public function addColumns(): PowerGridEloquent {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('description')
            ->addColumn('created_at_formatted', fn (Category $model) => $model->created_at)
            ->addColumn('updated_at_formatted', fn (Category $model) => $model->updated_at);
    }

    public function columns(): array {
        return [
            Column::make('NAME', 'name')->sortable()->searchable()->makeInputText(),
            Column::make('DESCRIPTION', 'description')->sortable()->makeInputText(),
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')->sortable()->makeInputDatePicker(),
            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')->sortable()->makeInputDatePicker(),

        ];
    }

    public function actions(): array {
        return [
            Button::make('show', '<i class="fas fa-eye"></i>')
                ->class('btn btn-outline-primary cursor-pointer m-1 rounded text-sm')
                ->tooltip('See Category')
                ->route('categories.show', ['id' => 'id'])
                ->target('_self'),

            Button::make('edit', '<i class="fas fa-edit"></i>')
                ->class('btn btn-outline-warning cursor-pointer m-1 rounded text-sm')
                ->tooltip('Edit Category')
                ->route('categories.edit', ['id' => 'id'])
                ->target('_self'),

            Button::make('destroy', '<i class="fas fa-trash"></i>')
                ->class('btn btn-outline-danger cursor-pointer m-1 rounded text-sm')
                ->tooltip('Delete Category')
                ->route('categories.destroy', ['id' => 'id'])
                ->method('patch')
                ->target('_self')
        ];
    }
}
