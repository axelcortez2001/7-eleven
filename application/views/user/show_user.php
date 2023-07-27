<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-4.7.0/css/font-awesome.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
    <style>
        .sidebar {
            background-color: #2c3e50;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
            padding-left: 10px;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            margin-bottom: 10px;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .menu a i {
            margin-right: 10px;
        }

        .menu a:hover {
            background-color: #34495e;
        }

        .menu .active a {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <header style="height: 60px; background: rgba(45, 38, 38, 0.5); color: white;" class="">
        <div style="padding-left: 20px; padding-top: 2px;">
            <h2 style="margin: 0">7-Eleven System</h2>
            <p style="margin: 0;">By: Winner John Udaundo</p>
        </div>
    </header>
    <div class="">
        <div class="row">
            <div class="col-sm-2" id="side-menu">
                <div class="sidebar">
                    <ul class="menu">
                        <?php
                        $location = $this->uri->segment(1);
                        ?>
                        <li class="<?php if (in_array($location, ['inventory', 'item'])) {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url('inventory') ?>">
                                <i class="fa fa-folder"></i> Inventory
                            </a>
                        </li>

                        <li class="<?php if ($location === 'new_item') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url('new_item') ?>">
                                <i class="fa fa-plus"></i> New Item
                            </a>
                        </li>

                        <li class="<?php if ($location === 'sales') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url('daily_sales_report') ?>">
                                <i class="fa fa-list-alt"></i> Sales
                            </a>
                        </li>

                        <li class="<?php if ($location === 'categories') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url('categories') ?>">
                                <i class="fa fa-tags"></i> Categories
                            </a>
                        </li>

                        <?php if ($user['role'] === 'Admin') { ?>
                            <li class="<?php if ($location === 'hr') {
                                            echo 'active';
                                        } ?>">
                                <a href="<?php echo site_url('Employee') ?>">
                                    <i class="fa fa-user"></i> HR
                                </a>
                            </li>
                        <?php } ?>


                        <?php if ($user['role'] === 'Admin') { ?>
                            <li class="<?php if ($location === 'accounts') {
                                            echo 'active';
                                        } ?>">
                                <a href="<?php echo base_url('accounts') ?>">
                                    <i class="fa fa-user"></i> Accounts
                                </a>
                            </li>
                        <?php } ?>

                        <li class="<?php if ($location === 'logout') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url('logout/out') ?>">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-sm-10">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal" style="margin-left: 10px;"><i class="fas fa-plus"></i> Add</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td><?php echo $user['role']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#editModal" data-id="<?php echo $user['id']; ?>" data-name="<?php echo $user['name']; ?>" data-username="<?php echo $user['username']; ?>" data-password="<?php echo $user['password']; ?>" data-role="<?php echo $user['role']; ?>"><i class="fas fa-edit"></i>Edit</button>
                                    <a href="<?php echo site_url('user/delete/' . $user['id']); ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('user/add'); ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="admin">Administrator</option>
                                <option value="cashier">Cashier</option>
                                <option value="accountant">Accounting</option>
                                <option value="hr">Hr</option>

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="save_user">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="<?php echo site_url('user/update'); ?>">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="Admin">Administrator</option>
                                <option value="cashier">Cashier</option>
                                <option value="accountant">Accounting</option>
                                <option value="hr">Hr</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update_user">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Modal Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.edit-button').click(function() {
                var button = $(this);
                var id = button.data('id');
                var name = button.data('name');
                var username = button.data('username');
                var password = button.data('password');
                var role = button.data('role');


                console.log(id);
                console.log(name);
                console.log(username);
                console.log(password);
                console.log(role);


                $('#editModal #id').val(id);
                $('#editModal #name').val(name);
                $('#editModal #username').val(username);
                $('#editModal #password').val(password);
                $('#editModal #role').val(role);


                $('#editModal').modal('show'); // Show the modal
            });
        });
    </script>


</body>

</html>