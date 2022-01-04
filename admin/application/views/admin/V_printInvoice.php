<html>

<head>
    <title>Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
    <!-- Custom fonts for this template-->
    <?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
    <!-- Page level plugin CSS-->
    <?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
    <!-- Custom styles for this template-->
    <?php echo link_tag('assests/css/sb-admin.css'); ?>

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        height: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #000000;
        text-align: center;
    }

    hr {
        border: 1px solid grey;
    }

    @media print {
        #print {
            display: none;
        }
    }
    </style>
</head>

<body>
    <div class="container mt-4">
        <img src="/assets/img/logo/Logo-18B-Telecom.png" height="70" width="260" alt="">
        <p>
            ផ្ទះលេខ 51Eo ផ្លូវលេខ 432 សង្កាត់ទូលទំពូង ខណ្ឌចំការមន រាជធានីភ្នំពេញ<br>
            012 / 016 / 081 26 17 18
        </p>
        <hr>
        <p></p>
        <p>
            <?php foreach ($dataInvoice as $row) : ?>
            Invoice No: <?php echo $row->invoiceid ?><br>
            Order No: <?php echo $row->orderid ?><br>
            Order Date: <?php echo $row->order_date ?><br>
            Invoice Date: <?php echo $row->date ?><br>
            Customer: <?php echo $row->customername ?>
            <?php endforeach; ?>
        </p>
        <table cellpadding="6">
            <tr>
                <th><strong>No</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Subtotal</strong></th>
            </tr>
            <?php
            $subtotal = 0;
            $total = 0;
            if (count($dataInvoceDetail) > 0) {
                foreach ($dataInvoceDetail as $rowDetail) :
                    $subtotal = ($rowDetail['price'] * $rowDetail['qty']);
                    $total += $subtotal;
            ?>
            <tr>
                <td><?php echo $rowDetail['invoice_detail_id'] ?></td>
                <td><?php echo $rowDetail['productname'] ?></td>
                <td> &#36; <?php echo number_format($rowDetail['price'], 2) ?></td>
                <td><?php echo $rowDetail['qty'] ?></td>
                <td> &#36; <?php echo number_format($subtotal, 2) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php } else { ?>
            <td>No data found</td>
            <?php } ?>
            <tr>
            </tr>
        </table>
        <h5 class="text-right mt-4"> Total: &#36; <?php echo $total ?></h5>
        <h5 class="text-danger"> ចំណាំ: </h5>
        <p class="text-danger">
            សូមពីនិត្យមើលទំនិញមុននឹងចាកចេញ ៕
        </p>
        <p class="text-danger">
            ព្រោះយើងខ្ញុំមិនទទួលខុសត្រូវលើការបាត់បង់ឡើយ ៕
        </p>
        <p class="text-danger">
            ទំនិញដែលទិញហើយ មិនអាចប្តូរយកប្រាក់បានឡើយ ៕
        </p>

        <div class="d-flex justify-content-end mt-4">
            <a href="#print" id="print" class="btn btn-primary"> <i class="fa fa-print"></i> Print</a>
        </div>
    </div>



    <?php include("includes/scripts.php"); ?>
    <script>
    $(document).ready(function() {
        $('#print').click(function(e) {
            e.preventDefault();
            window.print();
        });
    });
    </script>
</body>

</html>