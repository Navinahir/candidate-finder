<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Admin\NewsCategory;
use App\Rules\MinString;
use App\Rules\MaxString;

class NewsCategoriesController extends Controller
{
    /**
     * View Function to display list view page
     *
     * @return html/string
     */
    public function listView()
    {
        $data['page'] = __('message.news_categories');
        $data['menu'] = 'news-categories';
        return view('admin.news-categories.list', $data);
    }

    /**
     * Function to get data for jquery datatable
     *
     * @return json
     */
    public function list(Request $request)
    {
        echo json_encode(NewsCategory::list($request->all()));
    }    

    /**
     * View Function (for ajax) to display create or edit view page via modal
     *
     * @param integer $category_id
     * @return html/string
     */
    public function createOrEdit($category_id = NULL)
    {
        $data['category'] = objToArr(NewsCategory::getCategory('category_id', $category_id));
        echo view('admin.news-categories.create-or-edit', $data)->render();
    }

    /**
     * Function (for ajax) to process create or edit form request
     *
     * @return redirect
     */
    public function save(Request $request)
    {
        $this->checkIfDemo();

        $edit = $request->input('category_id') ? $request->input('category_id') : false;

        $rules['title'] = ['required', new MinString(2), new MaxString(50)];

        $validator = Validator::make($request->all(), $rules, [
            'title.required' => __('validation.required'),
            'title.min' => __('validation.min_string'),
            'title.max' => __('validation.max_string'),
        ]);
        if ($validator->fails()) {
            die(json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('validation_errors' => $validator->messages()->toArray()))
            )));
        }

        NewsCategory::store($request->all(), $edit);
        die(json_encode(array(
            'success' => 'true',
            'messages' => $this->ajaxErrorMessage(array(
                'success' => __('message.news_categories').' ' . ($edit ? __('message.updated') : __('message.created'))
        )))));
    }

    /**
     * Function (for ajax) to process change status request
     *
     * @param integer $category_id
     * @param string $status
     * @return void
     */
    public function changeStatus($category_id = null, $status = null)
    {
        $this->checkIfDemo();
        NewsCategory::changeStatus($category_id, $status);
    }

    /**
     * Function (for ajax) to process delete request
     *
     * @param integer $category_id
     * @return void
     */
    public function delete($category_id)
    {
        $this->checkIfDemo();
        NewsCategory::remove($category_id);
    }
}