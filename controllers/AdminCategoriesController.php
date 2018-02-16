<?php 
namespace controllers;

use components\AdminBaseController;
use models\Category;

class AdminCategoriesController extends AdminBaseController
{
    public function actionIndex()
    {
        $content = $this->getCategoryIndexPartial();
        $this->view->renderPartial('admin/main', ['content' =>$content]);
        return true;
    }

    public function actionCreate()
    {
        $errors = array();
        $result = false;
        $title = 'Создание категории';
        $newCategory['name'] = '';
        $newCategory['sort_order'] = '';

        if (isset($_POST['submit'])) {
            $newCategory['name'] = $_POST['name'];
            $newCategory['sort_order'] = $_POST['sort_order'];

            if (empty($newCategory['name'])) {
                $errors[] = 'Введите название категории!';
            }

            if (empty($newCategory['sort_order'])) {
                $errors[] = 'Укажите позицию категории!';
            }

            if (empty($errors)) {
                $result = Category::createCategory($newCategory);
            }
        }

        echo $this->renderCategoryFromPartial($newCategory, $title, $errors, $result);
        return true;
    }

    public function actionEdit($id)
    {
        $errors = array();
        $result = false;
        $title = 'Редактирование категории';

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            $category['name'] = $_POST['name'];
            $category['sort_order'] = $_POST['sort_order'];

            if (empty($category['name'])) {
                $errors[] = 'Введите название категории!';
            }

            if (empty($category['sort_order'])) {
                $errors[] = 'Укажите позицию категории!';
            }

            if (empty($errors)) {
                $result = Category::updateCategory($category);
            }
        }

        echo $this->renderCategoryFromPartial($category, $title, $errors, $result);
        return true;
    }

    public function actionDelete($id)
    {
        Category::deleteCategory($id);
        echo $this->getCategoryIndexPartial();

        return true;
    }


    private function getCategoryIndexPartial()
    {
        $categories = Category::getAllCategory();
        return $this->view->fetchPartial('admin/categories/index', array('categories' => $categories));
    }

    private function renderCategoryFromPartial($category, $title, $errors, $result)
    {
        $errorsView = $this->view->fetchPartial('layouts/errors', array('errors' => $errors));

        return $this->view->render('admin/categories/form', array('errors' => $errorsView,
                                                                  'title' => $title,
                                                                  'result' => $result,
                                                                  'name' => $category['name'],
                                                                  'sort_order' => $category['sort_order']));
    }
}