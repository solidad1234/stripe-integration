<?php

require "./vendor/autoload.php";

header('Content-Type','application/json');

if(isset($_POST['submit'])) {

    $name=$_POST['group'];
    $number=$_POST['number'];
    $amount=$_POST['amt'];


}

    $stripe= new Stripe\StripeClient("sk_test_51NIdQaCKQuFl3GphOCc5IMunVOTV1owcx6XEjz9kVr01o1wbRilzIjGnae2ZlwSnd1t1CI75sRtKt7k4m1l2DXEN00yPwnC1Oc");

    $session= $stripe->checkout->sessions->create([

    "success_url"=>"https://localhost:8080/success.html",

    "cancel_url"=> "https://localhost:8080/cancel.html",

    "payment_method_types"=>['card', 'alipay'],

    "mode"=>'payment',

    "line_items"=>[

        [
            "price_data"=>[

                "currency"=>"usd",
                "product_data"=>[
                    "name"=>"Needy children",
                    "description"=>"Catering for their educational needs"
                ],
                "unit_amount"=>5000

            ],

            "quantity"=>2

        ],

        [

            "price_data"=>[
                "currency"=>"usd",
                "product_data"=>[
                    "name"=>"The Aged",
                    "description"=>"Catering for their basic needs and care"

                ],
                "unit_amount"=>3000
            ],
            "quantity"=>3

        ]

    ]

        ]);
        
        echo json_encode($session);
    
        
    
?>
