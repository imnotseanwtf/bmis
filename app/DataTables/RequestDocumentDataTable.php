<?php

namespace App\DataTables;

use App\Enums\UserTypeEnum;
use App\Models\RequestDocument;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RequestDocumentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', fn(RequestDocument $document) => view('document.components.action', compact('document')))
            ->editColumn('status', function (RequestDocument $requestDocument) {
                if ($requestDocument->status == 0) {
                    return 'Pending';
                } elseif ($requestDocument->status == 2) {
                    return 'Rejected';
                } elseif ($requestDocument->status == 1) {
                    return 'Accepted';
                } elseif ($requestDocument->status == 3) {
                    return 'Expired';
                }
            })
            ->editColumn('schedule', fn(RequestDocument $requestDocument) => $requestDocument->schedule ?? 'No Action Yet')
            ->editColumn('valid_until', fn(RequestDocument $requestDocument) => $requestDocument->valid_until ?? 'No Action Yet')
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(RequestDocument $model): QueryBuilder
    {
        if (auth()->user()->isAdmin()) {
            return $model->newQuery()
                ->where('status', '!=', 2)
                ->where('status', '!=', 3)
                ->with('user')
                ->select('request_documents.*');
        } else {
            return $model->newQuery()
                ->where('user_id', auth()->id());
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('requestDocument_dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $columns = [];

        if (auth()->user()->isAdmin()) {
            $columns[] = Column::make('user.name', 'user.name');
        }

        $columns[] = Column::make('document_name', 'document_name');
        $columns[] = Column::make('schedule');
        $columns[] = Column::make('valid_until', 'valid_until');
        $columns[] = Column::make('status');

        if (auth()->user()->isAdmin()) {
            $columns[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center');
        }

        return $columns;
    }


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RequestDocument_' . date('YmdHis');
    }
}
