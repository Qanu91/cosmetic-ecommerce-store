<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap');

        :root {
            --bg:           #0d0f14;
            --bg-card:      #13161e;
            --bg-card2:     #1a1e2a;
            --accent:       #c084fc;
            --accent2:      #818cf8;
            --accent-green: #34d399;
            --accent-red:   #f87171;
            --text-1:       #f1f5f9;
            --text-2:       #94a3b8;
            --text-3:       #475569;
            --border:       rgba(255,255,255,0.07);
            --radius:       14px;
            --radius-sm:    8px;
            --tr:           all 0.22s cubic-bezier(.4,0,.2,1);
            --font-h:       'Syne', sans-serif;
            --font-b:       'DM Sans', sans-serif;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: var(--font-b);
            background: var(--bg);
            color: var(--text-1);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        /* ── Wrapper ── */
        .update-wrapper {
            width: 100%;
            max-width: 520px;
        }

        /* ── Back link ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--text-2);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 18px;
            transition: var(--tr);
        }
        .back-link:hover { color: var(--accent); }
        .back-link i { font-size: 12px; }

        /* ── Card ── */
        .card-modern {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .card-header-modern {
            padding: 18px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-icon {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border-radius: 10px;
            display: grid; place-items: center;
            font-size: 15px;
            color: #fff;
            flex-shrink: 0;
            box-shadow: 0 0 14px rgba(192,132,252,0.3);
        }

        .card-title-modern {
            font-family: var(--font-h);
            font-size: 16px;
            font-weight: 700;
            color: var(--text-1);
        }

        .card-body-modern { padding: 26px 22px; }

        /* ── Form groups ── */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-2);
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            background: var(--bg-card2);
            border: 1px solid var(--border);
            color: var(--text-1);
            padding: 11px 14px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-family: var(--font-b);
            outline: none;
            transition: var(--tr);
            appearance: none;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder { color: var(--text-3); }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(192,132,252,0.12);
        }

        .form-group select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2394a3b8' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            padding-right: 38px;
            cursor: pointer;
        }
        .form-group select option { background: var(--bg-card2); }

        .form-group textarea { resize: vertical; min-height: 100px; }

        input[type="file"] { padding: 8px 10px; cursor: pointer; }

        /* ── Submit button ── */
        .btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            color: #fff;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 15px;
            font-weight: 600;
            font-family: var(--font-b);
            cursor: pointer;
            transition: var(--tr);
            box-shadow: 0 4px 16px rgba(192,132,252,0.25);
            margin-top: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 22px rgba(192,132,252,0.4);
        }
        .btn:active { transform: translateY(0); }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(192,132,252,0.2); border-radius: 10px; }

        /* ── Mobile ── */
        @media (max-width: 575px) {
            body { align-items: flex-start; padding: 16px 12px; }
            .card-body-modern { padding: 18px 14px; }
            .card-header-modern { padding: 14px 16px; }
        }
    </style>
</head>
<body>

<div class="update-wrapper">

    <a href="admin/display-order.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Back to orders
    </a>

    <div class="card-modern">
        <div class="card-header-modern">
            <div class="card-icon"><i class="fa-solid fa-pen"></i></div>
            <span class="card-title-modern">Checkout form</span>
        </div>
        <div class="card-body-modern">

            <form method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="full-name">Enter Name</label>
                    <input type="text" id="full-name" name="full-name">
                </div>

                <div class="form-group">
                    <label for="phone-number">Phone Number</label>
                    <input type="text" id="phone-number" name="phone-number">
                </div>

                <div class="form-group">
                    <label for="pay-category">Payment Category:</label>
                    <select id="pay-category" name="pay-category">
                        <option value="Cash on delivery">Cash on delivery</option>
                        <option value="Jazz cash">Jazz cash</option>
                        <option value="Easy paisa">Easy paisa</option>
                        <option value="Bank transfer">Bank transfer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone-number">Enter Address</label>
                    <input type="text" id="address" name="address">
                </div>

                <div class="form-group">
                    <label for="product-quantity">Quantity</label>
                    <input type="number" id="product-quantity" name="product-quantity" step="1">
                </div>

                <input type="submit" value="update" class="btn" name="submit">

            </form>

        </div>
    </div>

</div>

</body>
</html>


<?php
include "connection.php";
$id = $_GET['id'];
if(isset($_POST['submit'])){
    
     $name = $_POST['full-name'];
    $phone = $_POST['phone-number'];
    $address = $_POST['address'];
    $payment = $_POST['pay-category'];
    
    $quantity = $_POST['product-quantity'];
    

    

    $update = "update orders set 
     name= '$name', phone ='$phone' , address = '$address', pay_category = '$payment' where id= '$id'";
    
    


    if (mysqli_query($conn,$update)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
</body>
</html>