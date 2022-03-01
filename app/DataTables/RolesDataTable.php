<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Models\Role;

class RolesDataTable extends DataTable
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
            // ->addColumn('user_level', function($data){
            //     return $data->UserLevels->name;
            // })
            ->addColumn('action' , function($data){
                // return view('dashboard.includes.actionsButton' , compact('data'));
                return '<div class="row justify-content-center">
                <a href="javascript:void(0)" type="button" data-value="'.$data->id.'" class="mx-1 btn btn-success show" >
                <i class="fa fa-eye"></i></a>
                <a href="javascript:void(0)" type="button" data-value="'.$data->id.'" class="mx-1 btn btn-info col-5 editBook">
                <i class="fa fa-edit"></i></a>
                <a type="button" class="btn btn-danger text-white deletebtn" data-value="'.$data->id.'"><i class="fa fa-trash"></i></a>                    
                </div>';
            })
            ->rawColumns([
                // 'user_level',
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RolesDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RolesDataTable $model)
    {
        return Role::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('rolesdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->lengthMenu([[100, 3, 5, 10, 50],['All Records', 3, 5, 10, 50]])
                    ->orderBy(0, 'asc');
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
            // Column::make('user_level')
            //       ->title('دور المستخدم')
            //       ->addClass('text-center'),
            Column::make('ids')
                  ->title('اي دي متبرع')
                  ->data('user_level_id')
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
        return 'Roles_' . date('YmdHis');
    }
}
