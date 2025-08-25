<?php

namespace App\Forms;

use App\Models\Category;
use Metalogico\Formello\Formello;

class ProductForm extends Formello
{
    protected function create(): array
    {
        return [
            'method' => 'POST',
            'action' => route('products.store'),
        ];
    }

    protected function edit(): array
    {
        return [
            'method' => 'PATCH',
            'action' => route('products.update', $this->model->id),
        ];
    }

    protected function fields(): array
    {
        return [
            'category_id' => [
                'label' => __('Category Id'),
                'widget' => 'select',
                'choices' => Category::pluck('title', 'id')->toArray(),
            ],
            'title' => [
                'label' => __('Title'),
            ],
            'description' => [
                'label' => __('Description'),
            ],
            'quantity' => [
                'label' => __('Quantity'),
            ],
            'price' => [
                'label' => __('Price'),
            ],
            'in_stock' => [
                'label' => __('In Stock'),
            ],
            'status' => [
                'label' => __('Status'),
                'widget' => 'select',
                'choices' => ['active', 'in-active']
            ],

        ];
    }
}
