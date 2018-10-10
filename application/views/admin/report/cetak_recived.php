<body onload="window.print();">

    <div class="logo ">
         <h2 class="text-center">Pizza Hut Dellivery Mustika Jaya</h2>
       <p class="text-center">Ruko Villa Asri Blok A No. 21 Jl.Mustika Jaya, Bekasi Kota 17158 </p>
    </div>
     
    <!-- <small class="pull-right">Date: <?php echo $tgl=date('l, d-m-y')?></small> -->
  <br>
  <h2 class="text-center">Data Recived Product</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-12"> 
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Recived Date</th>
                            <th>Product Name</th>
                            <th>QTY</th>
                            <th>Unit</th>
                        </tr>
                        </thead>
                        <tbody>
                             <?php
                             $i=0;
                              foreach ($record as $recived ) :
                             $i++; 
                             ?>
                             <tr>
                                 <td class="text-center"><?=  $i ?></td>
                                 <td><?php echo  $recived->tgl_recived ?></td>
                                 <td><?php echo  $recived->nma_product ?></td>
                                 <td><?php echo  $recived->qty ?></td>
                                 <td><?php echo  $recived->unit ?></td>
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