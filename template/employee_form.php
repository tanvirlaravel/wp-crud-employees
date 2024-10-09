
<div id="wp_employee_crud_plugin">

<!-- Add Employees layout  -->
<h3>Add Employees</h3>


    <form action="javascript:void(0)" id="frm_add_employee" enctype="multipart/form-data" >
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Employee name" id="name" />
        </p>

        <p>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Employee email" id="email" />
        </p>

        <p>
            <label for="designation">Designation</label>
            <select name="designation" id="designation">
                <option value="">-- Choose Designation --</option>
                <option value="php">PHP Developer</option>
                <option value="full">Full Stack Developer</option>
                <option value="wordpress">WordPress Developer</option>
                <option value="java">Java Developer</option>
            </select>
        </p>

        <p>
            <label for="file">Profile Image</label>
            <input type="file" name="file" id="file" />
        </p>

        <p>
            <button id="btn_save_data" type="submit">Save Data</button>
        </p>
    </form>
</div>

<!-- List Employees layout  -->
<h3>List Employees</h3>
<table>
    <thead>
        <th>#ID</th>
        <th>#Name</th>
        <th>#Email</th>
        <th>#Designation</th>
        <th>#Profile Image</th>
        <th>#Action</th>
    </thead>

    <tbody>
        <td>1</td>
        <td>Md Tanvirul Islam</td>
        <td>tanvir@gmail.com</td>
        <td>WordPress Developer</td>
        <td>---</td>
        <td>
            <button class="btn_edit_employee">Edit</button>
            <button class="btn_delete_employee">Delete</button>
        </td>
    </tbody>
</table>