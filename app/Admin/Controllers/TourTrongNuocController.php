<?php

namespace App\Admin\Controllers;

use App\Models\Country;
use App\Models\Tour;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;


class TourTrongNuocController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TourTrongNuoc';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tour());

        $grid->column('id', __('Id'));
        $grid->column('code', __('Code'));
        $grid->column('title', __('Tên'));
        $grid->column('amount', __('Số người'));
        $grid->column('date_start', __('Ngày bắt đầu'));
        $grid->hot()->display(function($hot){
            if($hot==0){
                return "Không";
            }else{
                return "Hot";
            }
        });
        $grid->start()->display(function($start){
            if($start==1){
                return "Hà Nội Và Sài Gòn";
            }else{
                return "64 Tỉnh thành";
            }
        });
        $grid->column('country.title');
       
        $grid->column('time', __('Số ngày'));
        $grid->column('price', __('Giá'));
        $grid->column('giamgia', __('Giảm giá%'));
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
        $show = new Show(Tour::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('title', __('Teen'));
        $show->field('slug_tour', __('Slug tour'));
        $show->field('date_start', __('Date start'));
        $show->field('start', __('Start'));
        $show->field('country_id', __('City id'));
        $show->field('description', __('Description'));
        $show->field('time', __('Time'));
        $show->field('price', __('Price'));
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
        $form = new Form(new Tour());

        $form->text('code', __('Code'))
        ->creationRules(['required', "unique:tour_trongnuoc"],['required'=>'không được để trống'])
        ->updateRules(['required', "unique:tour_trongnuoc,code,{{id}}"]);;
        $form->text('title', __('Title'))->rules('required',['required'=>'không được để trống']);
        $form->hidden('slug_tour', __('Slug tour'));
        $form->saving(function (Form $form) {

            $form->slug_tour = Str::slug($form->title);
        
        });
        $form->image('image',__('Image'))->rules('required',['required'=>'không được để trống']);
        $form->number('amount', __('Số người'))->rules('required',['required'=>'không được để trống']);
        $form->text('date_start', __('Date start'))->rules('required',['required'=>'không được để trống']);
        $form->select('start', __('Start'))->options([1=>'Hà Nội và TP. Hồ Chí Minh',2=>'64 tỉnh thành'])->rules('required',['required'=>'không được để trống']);
        $form->select('country_id', __('City id'))->options(Country::pluck('title','id'))->rules('required',['required'=>'không được để trống']);
        $form->ckeditor('description', __('Description'))->rules('required',['required'=>'không được để trống']);
        $form->number('time', __('Time'))->rules('required',['required'=>'không được để trống']);
        $form->number('price', __('Price'))->rules('required',['required'=>'không được để trống']);
        $form->number('giamgia', __('Giảm%'));
        $form->select('status', __('Status'))->options([1=>'Hiện',2=>'Ẩn'])->rules('required',['required'=>'không được để trống']);
        $form->select('hot', __('Hot'))->options([0=>'Ẩn',1=>'Hiện'])->rules('required',['required'=>'không được để trống']);

        return $form;
    }
}
