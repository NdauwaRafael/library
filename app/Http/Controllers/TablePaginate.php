<?php
/**
 * Created by PhpStorm.
 * User: dmburu
 * Date: 13/04/2018
 * Time: 15:58
 */

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

trait TablePaginate
{
    protected $perPage = 10;

    /*
     * Setup the tablestates array
     */
    protected $stateArray = [
        'query' => null,
        'sortDirection' => 'desc',
        'sortItem' => 'id',
        'page' => 1,
        'per_page' => 10
    ];

    protected $filterArray = [];
    protected $specialFilterArray = [];
    protected $relationTables = [];

    /*
     * Get the sort, filter and paginate data from the input
     */
    public function getTableStateData()
    {
        $state = Input::all();
        $selectFilters = ['assigned', 'unassigned', 'archived', 'active'];

        //Get the search query if any
        if (isset($state['search']) && $state['search'] != '' && !in_array($state['search'], $selectFilters)) {
            $this->stateArray['query'] = $state['search'];
        }

        //Get the Sort Parameters
        if (isset($state['sort']) && $state['sort'] != '') {
            $sortArray = explode('|', $state['sort']);

            $this->stateArray['sortDirection'] = $sortArray[1];

            $this->stateArray['sortItem'] = $sortArray[0];
        }

        //Get the pagination parameters
        if (isset($state['page'])) {
            $this->stateArray['page'] = $state['page'];
        }

        if (isset($state['per_page'])) {
            $this->stateArray['per_page'] = $state['per_page'];
        }
    }

    /*
     * Filter, Sort and Paginate the Model
     */
    public function tablePaginate($model, $filterParams = [], $transformer, $filterFunction = null)
    {
        $this->getTableStateData();

        $this->filterArray = $filterParams;

        $filtered = $this->filter($model, $filterFunction);

        return $this->paginate($this->sort($filtered), $transformer);
    }

    /*
     * Do the filter for the model
     */
    public function filter($model, $filterFunction)
    {
        if ($filterFunction) {
            $model = $filterFunction($model);
        }

        if (! is_null($this->stateArray['query'])) {
            $model = $model->search($this->stateArray['query']);
        }

        foreach ($this->filterArray as $filter) {
            if (! isset($filter['sign'])) {
                $filter['sign'] = '=';
            }

            $model = $model->where($filter['column'], $filter['sign'], $filter['value']);
        }

        return $model;
    }

    /*
     * Do the sort on the model
     */
    public function sort($model)
    {
        return $model->orderBy($this->stateArray['sortItem'], $this->stateArray['sortDirection']);
    }

    /*
     * Paginate the data
     */
    public function paginate($collection, $transformer)
    {
        $offset = ($this->stateArray['page'] * $this->stateArray['per_page']) - $this->stateArray['per_page'];

        $slicedData = $collection->offset($offset)->take($this->stateArray['per_page'])->get();

        $transformedData = $slicedData->map($transformer);

        return new LengthAwarePaginator($transformedData, $collection->count(), $this->stateArray['per_page'], $this->stateArray['page']);
    }

    /*
     * Setup a universal transformer
     */
    public function universalTransformer()
    {
        return function ($model) {
            return $model->toArray();
        };
    }
}
