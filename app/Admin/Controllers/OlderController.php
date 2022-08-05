<?php

namespace App\Admin\Controllers;

use App\Models\Older;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OlderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Older';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Older());

        $grid->column('id', __('Id'));
        $grid->column('tour_id', __('Tour id'));
        $grid->column('price', __('Giá'))->display(function($price){
            return number_format($price,0,',','.');
        });
        $grid->column('tinhtrang', __('Tình trạng'));
        $grid->column('name', __('Name'));
        $grid->column('phone', __('Phone'));
        $grid->column('email', __('Email'));
        $grid->column('nguoilon', __('Nguoilon'));
        $grid->column('treem', __('Treem'));
        $grid->column('date', __('Date'));
        $grid->column('message', __('Message'));
        $grid->model()->orderBy('id','DESC');

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
        $show = new Show(Older::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tour_id', __('Tour id'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('nguoilon', __('Nguoilon'));
        $show->field('treem', __('Treem'));
        $show->field('date', __('Date'));
        $show->field('message', __('Message'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Older());

        $form->number('tour_id', __('Tour id'));
        
        
        $form->select('tinhtrang')->options(['Chưa xử lý'=>'Chưa xử lý','Đã xử lý'=>'Đã xử lý']);
        
        $form->text('name', __('Name'));
        $form->mobile('phone', __('Phone'));
        $form->number('price', __('Giá'));
        $form->email('email', __('Email'));
        $form->number('nguoilon', __('Nguoilon'));
        $form->number('treem', __('Treem'));
        $form->text('date', __('Date'));
        $form->textarea('message', __('Message'));

        return $form;
    }
}
