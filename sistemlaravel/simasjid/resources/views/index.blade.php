@include('layouts.header')
@include('layouts.navbar')
 <!-- Main Content -->
 <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Blank Page</h1>
      </div>

      <div class="section-body">
          <select class="form-control select2" style="width: 100%">
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>

            <div class="form-group">
                <label>Date Picker</label>
                <input type="text" class="form-control datepicker">
              </div>
              <div class="form-group">
                <label>Date Time Picker</label>
                <input type="text" class="form-control datetimepicker">
              </div>
              <div class="form-group">
                <label>Time Picker</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-clock"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control timepicker">
                </div>
              </div>
      </div>
    </section>
  </div>
  
@include('layouts.footer')
