<body onload="window.print();">

  <h2 class="text-center">Faktur order</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-12"> 
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                           <tr>
                             <th class="text-center">No</th>
                               <th>Periode</th>
                               <th>Product Name</th>
                               <th>Packing</th>
                               <th>Qty</th>
                               <th>unit</th>
                               <th>Date Order</th>
                           </tr>
                    </thead>
                    <tbody>
                     <?php
                         $i=0;
                          foreach ($orders as $order ) :
                         $i++; 
                         ?>
                         <tr>
                             <td class="text-center"><?=  $i ?></td>
                             <td><?=  $order->faktur_id  ?></td>
                             <td><?=  $order->nma_product ?></td>
                             <td><?=  $order->packing ?></td>
                             <td><?=  $order->qty  ?></td>
                             <td><?=  $order->unit ?></td>
                             <td><?=  $order->periode ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                           </div>
                          </div>
                           </div>
                            </div>
                        </div>
<!-- ./wrapper -->
</body>