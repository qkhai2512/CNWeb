<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan Ly Hoa</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Phông Chữ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- thiết kế giao diện CSS -->
    <style>
        :root {
            --primary-color: #2ecc71; /* Màu chính */
            --secondary-color: #3498db; /* Màu phụ */
            --navbar-bg: linear-gradient(45deg, var(--primary-color), var(--secondary-color)); /* Nền Navbar */
            --navbar-hover-color: #1abc9c; /* Màu hover trên Navbar */
            --btn-color: #ffffff; /* Màu chữ nút */
            --btn-hover-color: #16a085; /* Màu hover nút */
            --btn-focus-color: #2980b9; /* Màu focus nút */
            --text-color: #2c3e50; /* Màu chữ chính */
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .navbar-custom {
            background: var(--navbar-bg);
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            display: flex;
            align-items: center;
            font-size: 1.7em;
            transition: all 0.3s ease;
        }

        .navbar-brand i {
            margin-right: 10px;
            font-size: 2em;
        }

        .navbar-brand:hover {
            transform: scale(1.1);
            color: #ffffff;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .nav-buttons .btn {
            margin: 0 8px;
            transition: all 0.3s ease;
            font-size: 1.1em;
            padding: 8px 20px;
            border-radius: 30px;
            color: var(--btn-color);
        }

        .nav-buttons .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            background-color: var(--btn-hover-color);
            color: #ffffff;
        }

        .nav-buttons .btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px var(--btn-focus-color);
        }

        .nav-buttons .btn i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5em;
            }
            .navbar-toggler {
                border-color: white;
            }
        }

    </style>
</head>
<body>
    <!-- Thanh Điều Hướng -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-leaf"></i> Quản Lý Hoa


        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarActions" aria-controls="navbarActions" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarActions">
            <div class="nav-buttons">
                <button type="button" class="btn btn-success" id="addButton">
                    <i class="fas fa-plus-circle"></i> Thêm
                </button>
                <button type="button" class="btn btn-warning" id="editButton">
                    <i class="fas fa-edit"></i> Sửa
                </button>
                <button type="button" class="btn btn-danger" id="deleteButton">
                    <i class="fas fa-trash-alt"></i> Xóa
                </button>
            </div>
        </div>
    </div>
</nav>



    <!-- Form Thêm Hoa -->
    <div class="modal fade" id="addFlowerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-form">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle"></i> Thêm Hoa Mới
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addFlowerForm">
                        <div class="mb-3">
                            <label for="flowerName" class="form-label">Tên Hoa</label>
                            <input type="text" class="form-control" id="flowerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="flowerDescription" class="form-label">Mô Tả</label>
                            <textarea class="form-control" id="flowerDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="flowerImage" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" id="flowerImage" accept="image/*" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Sửa Hoa -->
    <div class="modal fade" id="editFlowerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-form">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit"></i> Chỉnh Sửa Hoa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editFlowerForm">
                        <div class="mb-3">
                            <label for="editFlowerName" class="form-label">Tên Hoa</label>
                            <input type="text" class="form-control" id="editFlowerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFlowerDescription" class="form-label">Mô Tả</label>
                            <textarea class="form-control" id="editFlowerDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editFlowerImage" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" id="editFlowerImage" accept="image/*" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-warning">Cập Nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Xóa Hoa -->
    <div class="modal fade" id="deleteFlowerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-form">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-trash-alt"></i> Xóa Hoa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteFlowerForm">
                        <div class="mb-3">
                            <label for="deleteFlowerName" class="form-label">Tên Hoa</label>
                            <input type="text" class="form-control" id="deleteFlowerName" required>
                        </div>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> Bạn có chắc chắn muốn xóa hoa này không?
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        // JavaS cho các kích hoạt mô hình
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('addButton');
        const editButton = document.getElementById('editButton');
        const deleteButton = document.getElementById('deleteButton');

        const addModal = new bootstrap.Modal(document.getElementById('addFlowerModal'));
        const editModal = new bootstrap.Modal(document.getElementById('editFlowerModal'));
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteFlowerModal'));

        addButton.addEventListener('click', () => addModal.show());
        editButton.addEventListener('click', () => editModal.show());
        deleteButton.addEventListener('click', () => deleteModal.show());

    // Thêm hoa mới
    document.getElementById('addFlowerForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('flowerName').value;
        const description = document.getElementById('flowerDescription').value;
        const image = document.getElementById('flowerImage').files[0];

        const formData = new FormData();
        formData.append('name', name);
        formData.append('description', description);
        formData.append('image', image);

        fetch('addFlower.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Thêm hoa thành công!');
                addModal.hide();
            } else {
                alert('Có lỗi xảy ra!');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    });

    // Sửa hoa
    document.getElementById('editFlowerForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const flowerId = document.getElementById('editFlowerId').value;
        const name = document.getElementById('editFlowerName').value;
        const description = document.getElementById('editFlowerDescription').value;
        const image = document.getElementById('editFlowerImage').files[0];

        const formData = new FormData();
        formData.append('flowerId', flowerId);
        formData.append('name', name);
        formData.append('description', description);
        formData.append('image', image);

        fetch('editFlower.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Cập nhật hoa thành công!');
                editModal.hide();
            } else {
                alert('Có lỗi xảy ra!');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    });

    // Xóa hoa
    document.getElementById('deleteFlowerForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const flowerId = document.getElementById('deleteFlowerId').value;

        fetch('deleteFlower.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ flowerId: flowerId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Xóa hoa thành công!');
                deleteModal.hide();
            } else {
                alert('Có lỗi xảy ra!');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
    });

});

    </script>
</body>
</html>