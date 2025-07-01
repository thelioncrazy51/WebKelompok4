@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('container')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.89);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px 0 rgba(0, 0, 0, 0.35);
    }
    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 8px;
        margin-bottom: 25px;
        font-weight: 800;
        font-size: 2.5rem;
        color: #145214;
        text-shadow: 1px 1px 6px #052b05;
    }
    .section-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 5px;
        background: #145214;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 4px;
        box-shadow: 0 0 8px #145214;
    }
    .text-highlight {
        color: #145214;
        font-weight: 700;
    }
    ul.mission-list {
        list-style: none;
        padding-left: 0;
        font-weight: 500;
        color: #145214;
    }
    ul.mission-list li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }
    ul.mission-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 0;
        color: #145214;
        font-weight: 700;
        font-size: 1.3rem;
        text-shadow: 0 0 4px #093809;
    }
    p, li, h5, h6 {
        color: #145214;
    }
    .action-buttons {
        white-space: nowrap;
    }
    .btn-action {
        padding: 5px 10px;
        margin: 0 2px;
        font-size: 0.8rem;
    }
    .input-password {
        position: relative;
        display: flex;
        align-items: center;
    }
    .password {
        padding-right: 40px; /* Beri ruang untuk eye icon */
        flex: 1;
    }
    .toggle-password {
        position: absolute;
        right: 10px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        margin: 0;
        color: #6c757d;
    }
    .toggle-password:hover {
        color: #495057;
    }
    .eye-icon {
        font-size: 1rem;
        display: inline-block;
        width: 20px;
        text-align: center;
    }
</style>

<div class="glass-card p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title">Data dari Database</h2>
        <a href="{{ route('users.export') }}" class="btn btn-info me-2">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fas fa-plus"></i> Add User
        </button>
    </div>
    <div class="table-responsive">
        @if(isset($data) && is_countable($data) && count($data) > 0)
            <table class="table table-hover">
                <thead class="bg-success text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id ?? $row['id'] }}</td>
                            <td>{{ $row->name ?? $row['name'] }}</td>
                            <td>{{ $row->email ?? $row['email'] }}</td>
                            <td>{{ $row->password ?? $row['password'] }}</td>
                            <td>{{ ucfirst($row->role ?? $row['role']) }}</td>
                            <td class="action-buttons">
                                <button class="btn btn-primary btn-sm btn-action" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editUserModal"
                                        data-id="{{ $row->id ?? $row['id'] }}"
                                        data-name="{{ $row->name ?? $row['name'] }}"
                                        data-email="{{ $row->email ?? $row['email'] }}"
                                        data-role="{{ $row->role ?? $row['role'] }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('users.destroy', $row->id ?? $row['id']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-action" 
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">
                Tidak ada data yang tersedia.
            </div>
        @endif
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-password">
                            <input type="password" class="password form-control" id="password" name="password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <i class="eye-icon">👁️</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="form-label">Password (Leave blank to keep current)</label>
                        <div class="input-password">
                            <input type="password" class="password form-control" id="edit_password" name="password">
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <i class="eye-icon">👁️</i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <div class="form-control-plaintext" id="edit_role_display"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const eyeIcon = passwordField.nextElementSibling.querySelector('.eye-icon');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.textContent = "🙈";
        } else {
            passwordField.type = "password";
            eyeIcon.textContent = "👁️";
        }
    }

    // Script untuk mengisi data ke modal edit
    document.addEventListener('DOMContentLoaded', function() {
        var editUserModal = document.getElementById('editUserModal');
        editUserModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var email = button.getAttribute('data-email');
            var role = button.getAttribute('data-role');

            var modal = this;
            modal.querySelector('#edit_name').value = name;
            modal.querySelector('#edit_email').value = email;
            modal.querySelector('#edit_role_display').textContent = role.charAt(0).toUpperCase() + role.slice(1);
            
            // Set form action URL
            document.getElementById('editUserForm').action = '/users/' + id;
        });
    });
</script>
@endsection