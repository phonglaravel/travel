<?php

namespace App\Admin\Controllers;

use App\Models\Country;
use App\Models\HoneyMoon;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HoneyMoonController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'HoneyMoon';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new HoneyMoon());
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('ngaytao', __('Ngaytao'));
        $grid->column('tinhtrang', __('Tinhtrang'));
        $grid->country_id()->display(function($country_id){
            return Country::where('id',$country_id)->first()->title;
        });
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
        $show = new Show(HoneyMoon::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('ngaytao', __('Ngaytao'));
        $show->field('tinhtrang', __('Tinhtrang'));
        $show->field('country_id', __('Country id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new HoneyMoon());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->hidden('ngaytao');
        $form->saving(function(Form $form){
            if($form->isCreating()){
                $form->ngaytao = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
            }   
        });
        $form->select('tinhtrang', __('Tinhtrang'))->options(['Chưa xử lý'=>'Chưa xử lý','Đã xử lý'=>'Đã xử lý']);
        $form->number('country_id', __('Country id'));

        return $form;
    }
}
