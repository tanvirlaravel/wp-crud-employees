<div id="wp_employee_crud_plugin" class="employee-container">

  <!-- Add Employees layout -->
  <h3 class="section-title">Add Employees</h3>
  <form action="javascript:void(0)" id="frm_add_employee" enctype="multipart/form-data" class="employee-form">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="Employee name" id="name" class="form-input" required />
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" placeholder="Employee email" id="email" class="form-input" required />
    </div>

    <div class="form-group">
      <label for="designation">Designation</label>
      <select name="designation" id="designation" class="form-input" required>
        <option value="">-- Choose Designation --</option>
        <option value="php">PHP Developer</option>
        <option value="full">Full Stack Developer</option>
        <option value="wordpress">WordPress Developer</option>
        <option value="java">Java Developer</option>
      </select>
    </div>

    <div class="form-group">
      <label for="file">Profile Image</label>
      <input type="file" name="file" id="file" class="form-input-file" />
    </div>

    <div class="form-group">
      <button id="btn_save_data" type="submit" class="btn-primary">Save Data</button>
    </div>
  </form>

  <!-- List Employees layout -->
  <h3 class="section-title">List Employees</h3>
  <table class="employee-table">
    <thead>
      <tr>
        <th>#ID</th>
        <th>#Name</th>
        <th>#Email</th>
        <th>#Designation</th>
        <th>#Profile Image</th>
        <th>#Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Md Tanvirul Islam</td>
        <td>tanvir@gmail.com</td>
        <td>WordPress Developer</td>
        <td>---</td>
        <td>
          <button class="btn-action btn-edit">Edit</button>
          <button class="btn-action btn-delete">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

