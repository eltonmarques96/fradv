    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
  <a class="navbar-brand col-sm-4 col-md-4 mr-0" href="#">Falcão Rios Advocacia</a>
</nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-md-10">  
          <h1 class="h2">New Form</h1>
        </div>
      </div>
      <div class="col-md-12">
          <form action="<?php base_url() ?>forms/newRegister" method="post">
              <div class="form-group">
              <div class="col-md-4">
                  <label for="ProcessID">Process ID </label>
                  <input type="text" class="form-control" id="ProcessID" name="processID" placeholder="Insert the process ID" required> 
              </div>
              
              <div class="form-group">
                <div class="col-md-4">
                  <label for="CostumerName">Customer Name</label>
                  <input type="text" class="form-control" id="CostumerName" name="costumerName" placeholder="Insert the costumer's name" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label for="RequestDate">Request Date</label>
                  <input type="date" class="form-control" id="requestDate" name="requestDate" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label for="RequestProcess">Request Process</label>
                  <input type="text" class="form-control" id="requestProcess" name="requestProcess" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label for="requestSubject">Subject</label>
                  <input type="text" class="form-control" id="requestSubject" name="requestSubject" placeholder="Insert the process name" required> 
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8">
                  <label for="requestContent">Request Content</label>
                  <textarea class="form-control" id="requestContent" name="requestContent" rows="3"></textarea required>
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-md-8">
                    <label for="processAttachment">Attchments</label>
                    <input type="file" class="input-file" name="attachmentsDirectory" id="processAttachment">
                    <span class="help-block">2MB per file</span>
                  </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-md-8">
                 <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
              </div>
          </form>
        </div>
    </main>
  </div>
</div>
