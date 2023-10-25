<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Shop Name</th>
                            <th>Item Order</th>
                            <th>Order Price (rs)</th>
                            <th>Order Address</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 0;
                        $total = 0;
                        foreach ($Orders as $key => $product) {
                            $i++;
                            $total = $total + $product->cost;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $product->shop_name ?></td>
                                <td><?= $product->product_name ?></td>
                                <td><?= $product->cost ?></td>
                                <td><?= $product->address ?></td>
                                <td><?= $product->added_date ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr id="tfooter">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total: <?= $total ?>/-</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>