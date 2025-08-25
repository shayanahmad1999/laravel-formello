<?php

namespace App\Forms;

use Metalogico\Formello\Formello;

class CategoryForm extends Formello
{
    protected function create(): array
    {
        return [
            'method' => 'POST',
            'action' => route('categories.store'),
        ];
    }

    protected function edit(): array
    {
        return [
            'method' => 'PATCH',
            'action' => route('categories.update', $this->model->id),
        ];
    }

    protected function fields(): array
    {
        return [
            'title' => [
                'label' => __('Title'),
                'help' => 'Enter the title of the category',
            ],
            'description' => [
                'label' => __('Description'),
            ],
            'status' => [
                'label' => __('Status'),
                'widget' => 'select',
                'choices' => ['active', 'in-active']
            ],

        ];
    }
}
