<?php

namespace App\Admin\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class BlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Blog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Blog());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('slug_blog', __('Slug blog'));
        $grid->column('image', __('Image'));
        $grid->column('ngaytao', __('Ngaytao'));
        // $grid->column('content', __('Content'));

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
        $show = new Show(Blog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug_blog', __('Slug blog'));
        $show->field('image', __('Image'));
        $show->field('ngaytao', __('Ngaytao'));
        $show->field('content', __('Content'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Blog());
        $form->text('title', __('Title'));
        $form->hidden('slug_blog');
        $form->saving(function (Form $form) {
            $form->slug_blog = Str::slug($form->title);  
        });
        $form->hidden('ngaytao');
        $form->saving(function (Form $form) {
            if($form->isCreating()){
                $form->ngaytao = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
            }       
        });
        $form->image('image', __('Image'));
        $form->ckeditor('content', __('Content'));
        return $form;
    }
}
