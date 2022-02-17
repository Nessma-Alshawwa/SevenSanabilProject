<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\User;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('user_roles', function($data){
                $roles = $data->getRoleNames();// Returns a collection
                foreach($roles as $role){
                    return $role;
                }
            })
            ->addColumn('user_permissions', function($data){
                $permissions = $data->getAllPermissions();// Returns a collection
                foreach($permissions as $permission){
                    return $permission->name;
                }
            })
            ->addColumn('action', function($data){
                return view('dashboard.includes.actionsButton', ['data'=> $data]);
            })
            ->rawColumns([
                'user_roles',
                'user_permissions',
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UsersDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('usersdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->lengthMenu([[100, 3, 5, 10, 50],['All Records', 3, 5, 10, 50]])
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                  ->title('#')
                  ->data('id')
                  ->addClass('text-center'),
            Column::make('name')
                  ->title('الاسم')
                  ->data('name')
                  ->addClass('text-center'),
            Column::make('email')
                  ->title('البريد الالكتروني')
                  ->data('email')
                  ->addClass('text-center'),
            Column::make('user_roles')
                  ->title('دور المستخدم (Roles)')
                  ->addClass('text-center'),
            Column::make('user_permissions')
                  ->title('صلاحية المستخدم (Permissions)')
                  ->addClass('text-center'),
            Column::computed('action')
                  ->title('الإجراءات')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
