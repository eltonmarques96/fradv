<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
  <a class="navbar-brand col-sm-4 col-md-4 mr-0" href="#">Falcão Rios Advocacia</a>
</nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-md-10">  
          <h1 class="h2">Watch forms</h1>
        </div>
        <div class="col-md-2">
          <a class="btn btn-primary btn-block" href="<?php base_url(); ?>forms/register">Send Form</a>
        </div>
      </div>
      <div class="col-md-12">
        <table>
          <tr>
            <th>Form ID</th>
            <th>Process ID</th>
            <th>Costumer's Name</th>
            <th>Request Date</th>
            <th>Request Process</th>
            <th>Request Content</th>
          </tr>
          <?php foreach($forms as $formularios_) {?>
          <tr>
            <th><?= $formularios_-> id_hexaformulario ?></th>
            <th><?= $formularios_-> processID;?></th>
            <th><?= $formularios_-> costumerName; ?></th>
            <th><?= $formularios_-> requestDate; ?></th>
            <th><?= $formularios_-> requestProcess; ?></th>
            <th><?= $formularios_-> requestSubject; ?></th>
            <th><?= $formularios_-> requestContent; ?></th>
            <td><a href="<?= base_url('form/excluir'.$formularios_-> processID) ?>" class="btn btn-danger"></a></td>
          </tr>
          <?php }?>
        </table>

    </main>
  </div>
</div>
