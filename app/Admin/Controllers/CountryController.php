<?php

namespace App\Admin\Controllers;

use App\Models\Country;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CountryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Country';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Country());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('image', __('Image'));
        $grid->status()->display(function($status){
            if($status==1){
                return "Hiện";
            }else{
                return "Ẩn";
            }
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Country::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug_country', __('Slug country'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('status', __('Status'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Country());

        $form->text('title', __('Title'));
        $form->text('slug_country', __('Slug country'));
        $form->select('category_id', __('Category'))->options([1 => 'Trong nước', 2=>'Nước ngoài']);
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'));
        $form->select('status', __('Status'))->options([1 => 'Hiện', 2=>'Ẩn']);

        return $form;
    }
}
