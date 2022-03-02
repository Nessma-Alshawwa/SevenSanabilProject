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
            ->addColumn('user_level', function($data){
                return $data->UserLevels->name;
            })
            ->addColumn('committee_id', function($data){
                if(!isset($data->Committees->name)){
                    return ("لا يوجد");
                }else{
                    return $data->Committees->name;
                } 
            })
            ->addColumn('donor_id', function($data){
                if(!isset($data->Donors->name)){
                    return ("لا يوجد");
                }else{
                    return $data->Donors->name;
                }
            })
            ->addColumn('action', function($data){
                return view('dashboard.includes.actionsButton', ['data'=> $data]);
            })
            ->rawColumns([
                'user_level',
                'committee_id',
                'donor_id',
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
        return User::query()->with('UserLevels')->with('Committees')->with('Donors');
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
                  ->addClass('text-center')
                  ->defaultContent(""),
            Column::make('name')
                  ->title('الاسم')
                  ->data('name')
                  ->addClass('text-center'),
            Column::make('email')
                  ->title('البريد الالكتروني')
                  ->data('email')
                  ->addClass('text-center'),
            Column::make('user_level')
                  ->title('دور المستخدم')
                  ->addClass('text-center'),
            Column::make('committee_id')
                  ->title('اللجنة')
                  ->addClass('text-center')
                  ->defaultContent("لا يوجد"),
            Column::make('donor_id')
                  ->title('المتبرع')
                  ->addClass('text-center')
                  ->defaultContent("لا يوجد"),
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
