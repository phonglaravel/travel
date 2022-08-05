<?php

namespace App\Admin\Controllers;

use App\Models\CommentBlog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CommentBlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CommentBlog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CommentBlog());

        $grid->column('id', __('Id'));
        $grid->column('blog_id', __('Blog id'));
        $grid->column('name', __('Name'));
        $grid->column('message', __('Message'));
        $grid->column('ngaytao', __('Ngaytao'));

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
        $show = new Show(CommentBlog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('blog_id', __('Blog id'));
        $show->field('name', __('Name'));
        $show->field('message', __('Message'));
        $show->field('ngaytao', __('Ngaytao'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CommentBlog());

        $form->number('blog_id', __('Blog id'));
        $form->text('name', __('Name'));
        $form->textarea('message', __('Message'));
        $form->text('ngaytao', __('Ngaytao'));

        return $form;
    }
}
