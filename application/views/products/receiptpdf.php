<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        div{
            display:block;
        }ul{
            list-style-type: none;
        }h1,h2,h3,h4,h5,h6{
            font-size: 1.75rem;
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: bolder;
            line-height: 1.2;
        }li,p{
            font-size: 1rem;
        }tr{
            display: table-row;
            vertical-align: inherit;
        }th{
            text-align: left;
            padding: 0.5rem 0.5rem;
        }td{
            padding: 0.5rem 0.5rem;
            border-bottom-width: 1px;
        } table{
            width: 100%;
            caption-side: bottom;
            display: table;
            border-collapse: collapse;
            text-indent: initial;
            border-spacing: 2px;
        }tr:nth-child(even) {
            background-color: #f2f2f2;
        }.container{
            width: 100%;
            padding-right: var(--bs-gutter-x,.75rem);
            padding-left: var(--bs-gutter-x,.75rem);
            margin-right: auto;
            margin-left: auto;
            max-width: 1320px;
        }.float-start{
            float:left!important;
        }.float-end{
            float:right!important;
        }.my-5{
            margin-top: 3rem!important;
            margin-bottom: 3rem!important;
        }.ms-5{
            margin-left: 3rem!important;
        }.me-5{
            margin-right: 3rem!important;
        }.ms-1{
            margin-right: 0.25rem!important;
        }.mb-5{
            margin-bottom: 3rem!important;
        }.w-100{
            width:100%!important;
        }.mb-3{
            margin-bottom: 1rem!important;
        }.mb-1{
            margin-bottom: 0.25rem!important;
        }.mt-5{
            margin-top: 9rem!important;
        }.mt-3{
            margin-top: 3rem!important;
        }.table{
            width: 100%;
            margin-bottom: 1rem;
            vertical-align: top;
        }.text-muted{
            --bs-text-opacity: 1;
            color: #6c757d!important;
        }.card{
            width: 200px;
            margin: 10px;
            padding:20px;
            min-width: 0;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 0.25rem;
        }
        .products{
            display:flex;
            justify-content: space-around;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <div class="my-5">
        <div class="float-start ms-5">
            <strong style="width:130px; font-size:25px; color:#4863A0">THE CLOTHES PALACE</strong>
        </div>
        <div class="float-end me-5 mb-5">
            The Clothes Palace <br>
            Ragati Road  <br>
            P.O Box 34670 - 00100 <br>
            Nairobi - Kenya <br>
        </div>
        <hr class="w-100 mb-5 mt-5">
        <h3>Account Details</h3>
        <ul class="mb-3" style="list-style-type: none;">
        <?php foreach($userdetails as $item): ?>
            <li class="mb-1">Name: <?=$item->first_name?></li>
            <li class="mb-1">Date of Payment: <?=$item->updated_at?></li>
            <li class="mb-1">Address: 2123 Hamillton Drive</li>
            <li class="mb-1">Total Amount: <?=$this->cart->total();?></li>
            <?php endforeach; ?>
        </ul>
        <hr class="w-100 mb-3 mt-3">
        <div class="products">
            <ul class="mb-3 product" style="list-style-type: none;">
                <?php foreach($cartitems as $items) : ?>
                <li class="card">
                    <h4><?=$items['name']?></h4>    
                    <p><?=$items['desc']?></p>
                    <small>Quantity: <?=$items['qty']?></small><br>
                    <strong>KSH <?=$items['subtotal']?></strong>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <hr class="w-100">
        <div class="float-end">
            <h5 class="text-muted">Please Note:</h5>
            <ul>
                <li class="text-muted">Delivery occurs within 3 days of payment</li>
                <li class="text-muted">Itmes can be exchanged for better size but not refundable with cash</li>
            </ul>
        </div>
    </div>
</body>
</html>