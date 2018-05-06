<?php 
namespace controllers;

use components\{AdminBaseController, Pagination};
use models\Category;

class AdminCategoriesController extends AdminBaseController
{
    private const TITLE_CREATE = 'Создание категории';
    private const TITLE_EDIT = 'Редактирование категории';

    public function actionIndex(int $currentPage = 1)
    {
        $total = Category::getTotalCategory();
        $limit = 6;
        $pagination = new Pagination($total, $currentPage, $limit, 'page-');
        $categories = Category::getCategoryByPage($currentPage, $limit);
        $this->view->render(
            'admin/categories/index',
            [
                'categories' => $categories,
                'pagination' => $pagination
            ]
        );

        return true;
    }

    public function actionCreate()
    {
        $errors = array();
        $result = false;
        $newCategory['name'] = $newCategory['sort_order'] = '';

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

        echo $this->renderCategoryFromPartial($newCategory, self::TITLE_CREATE, $errors, $result);
        
        return true;
    }

    public function actionEdit($id)
    {
        $errors = array();
        $result = false;

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

        echo $this->renderCategoryFromPartial($category,  self::TITLE_EDIT, $errors, $result);
        return true;
    }

    public function actionDelete($id)
    {
        Category::deleteCategory($id);
        return true;
    }

    private function renderCategoryFromPartial($category, $title, $errors, $result)
    {
        $errorsView = $this->view->fetchPartial('layouts/errors', ['errors' => $errors]);

        return $this->view->render(
            'admin/categories/form',
            [ 
                'errors' => $errorsView,
                'title' => $title,
                'result' => $result,
                'name' => $category['name'],
                'sort_order' => $category['sort_order']
            ]
        );
    }
}