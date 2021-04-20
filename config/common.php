<?php

return [
    'product' => [
        'status' => [
            'active' => 1,
            'unActive' => 0,
        ],
        'gift' => [
            'content' => 'Bộ sản phẩm: Thân máy, Hộp, Cáp, Cây lấy sim, Sách hướng dẫn (Tất cả lô máy từ tháng 10/2020, Apple cắt bỏ tai nghe, củ sạc khỏi bộ sản phẩm bán kèm)',
        ],
        'Guarantee' => [
            'content' => 'Giá đã bao gồm 10% VAT. Bảo hành 12 tháng Toàn cầu. Bảo hành 1 đổi 1 theo chính sách của Apple Việt Nam (Xem chi tiết)',
        ],
        'Payment_type' => [
            'content-1' => [
                'text-1' => 'Trả góp 0% qua thẻ tín dụng ( Không trả trước, trả hàng tháng chỉ',
                'text-2' => '4.465.000 ₫',
                'text-3' => ') hoặc qua Paylater',
            ],
            'content-2' => [
                'text-1' => 'Trả trước',
                'text-2' => '8.037.000 ₫',
                'text-3' => 'trả hàng tháng chỉ',
                'text-4' => ' 6.251.000 ₫',
            ],
            'content-4' => [
                'text-1' => 'Hoặc Trả góp có lãi suất với trả trước',
                'text-2' => '2.679.000 ₫',
                'text-3' => 'trả hàng tháng',
                'text-4' => '4.054.667 ₫',
                'text-5' => 'qua nhà tài chính',
                'text-6' => 'Home Credit, FE Credit, HD Saison',
                'text-7' => '(chỉ cần CMND + GPLX) Hoặc trả góp - trả trước 0đ qua nhà tài chính FE Credit (Thủ tục chỉ cần CMND + Hộ khẩu )',
            ],
        ],
        'type' => [
            'Sản phẩm mặc định' => 0,
            'Sản phẩm nổi bật' => 1,
            'Sản phẩm bán chạy' => 2,
        ],
        // 'weight_unit' => [
        //     'gram' => 1,
        //     'kilogram' => 2,
        // ],
        // 'dimension_unit' => [
        //     'millimeter' => 1,
        //     'centimeter' => 2,
        //     'meter' => 3,
        // ],
        'virtual' => [
            'physical' => 1,
            'download' => 2,
            'only_view' => 3,
            'service' => 4,
        ],
    ],
    'comment' => [
        'status' => [
            'active' => 1,
            'unActive' => 0,
        ],
    ],
    'pagination' => [
        'backend' => 10,
        'frontend' => 7,
    ],
    'coupon' => [
        'type' => [
            'fixed' => 1,
            'percent' => 2,
        ],
        'status' => [
            'used' => 2,
            'active' => 1,
            'unActive' => 0,
        ],
    ],
    'order' => [
        'status' => [
            'ordered' => 1,
            'processing' => 2,
            'cancelled' => 3,
            'done' => 4,
            'failed' => 5,
        ],
    ],
    'shipping' => [
        'default_fee' => 20000,
        'method' => [
            'standard' => 1
        ],
        'status' => [
            'are_checking' => 1,
            'sending' => 2,
            'done' => 3,
            'not_sent' => 4,
        ],
    ],
    'payment' => [
        'method' => [
            'cash' => 1,
        ],
        'status' => [
            'unpaid' => 1,
            // 'partial' => 2,
            'paid' => 2,
            'return' => 3,
        ],
    ],
    'comment_admin' => [
        'user_name' => 'Tư Vấn: 090.8855.483 (Miễn Phí)',
        'phone' => '090888999',
    ],
];
