<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Add a new status</h3>
          </div>
          <div class="panel-body">
            
            <form method="POST" action="{{ route('status.store') }}">
                {{ csrf_field() }}
              <div class="form-group">
                <textarea name="body" id="body" class="form-control" placeholder="Enter You Status ..."></textarea>
              </div>
              
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>

          </div>
        </div>
    </div>
</div>